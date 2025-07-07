<?php
// Example PHP and Bootstrap implementation of CCSS Standard Viewer
$grades = ['K', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
$subjects = ['Math', 'ELA', 'Science', 'Humanities'];
$domains = [
    'Math' => ['Operations & Algebraic Thinking', 'Number & Operations', 'Geometry'],
    'ELA' => ['Reading Literature', 'Writing', 'Speaking & Listening'],
    'Science' => ['Physical Science', 'Life Science', 'Earth & Space Science'],
    'Humanities' => ['History', 'Geography', 'Civics']
];

include 'standards.php';

$selectedGrade = $_POST['grade'] ?? '';
$selectedSubject = $_POST['subject'] ?? '';
$selectedDomain = $_POST['domain'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCSS Standard Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="text-center mb-4">CCSS Standard Viewer</h1>
    <form method="POST" class="row g-3">
        <div class="col-md-4">
            <label for="grade" class="form-label">Select Grade</label>
            <select name="grade" id="grade" class="form-select" onchange="this.form.submit()">
                <option value="">Select Grade</option>
                <?php foreach ($grades as $grade): ?>
                    <option value="<?= $grade ?>" <?= $selectedGrade == $grade ? 'selected' : '' ?>><?= $grade ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="subject" class="form-label">Select Subject</label>
            <select name="subject" id="subject" class="form-select" onchange="this.form.submit()">
                <option value="">Select Subject</option>
                <?php foreach ($subjects as $subject): ?>
                    <option value="<?= $subject ?>" <?= $selectedSubject == $subject ? 'selected' : '' ?>><?= $subject ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <?php if ($selectedSubject && isset($domains[$selectedSubject])): ?>
        <div class="col-md-4">
            <label for="domain" class="form-label">Select Domain</label>
            <select name="domain" id="domain" class="form-select" onchange="this.form.submit()">
                <option value="">Select Domain</option>
                <?php foreach ($domains[$selectedSubject] as $domain): ?>
                    <option value="<?= $domain ?>" <?= $selectedDomain == $domain ? 'selected' : '' ?>><?= $domain ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
    </form>

    <?php if ($selectedGrade && $selectedSubject && $selectedDomain): ?>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Showing standards for:</h5>
                <ul class="list-unstyled">
                    <li><strong>Grade:</strong> <?= htmlspecialchars($selectedGrade) ?></li>
                    <li><strong>Subject:</strong> <?= htmlspecialchars($selectedSubject) ?></li>
                    <li><strong>Domain:</strong> <?= htmlspecialchars($selectedDomain) ?></li>
                </ul>

                <?php
                $foundStandards = $standards[$selectedGrade][$selectedSubject][$selectedDomain] ?? [];
                if ($foundStandards):
                ?>
                    <ul class="mt-3">
                        <?php foreach ($foundStandards as $standard): ?>
                            <li><?= htmlspecialchars($standard) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-danger">No standards found for this selection.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
