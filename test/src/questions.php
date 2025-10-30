<?php
// This file stores all questions for all tests.
// In a real application, this would likely come from a database.

$all_questions = [
    'math' => [
        [
            'question' => 'What is 5 + 7?',
            'options' => ['10', '12', '15', '8'],
            'correct' => 1 // Index of the correct answer (12)
        ],
        [
            'question' => 'What is the value of \'x\' in the equation 2x + 3 = 11?',
            'options' => ['3', '4', '5', '6'],
            'correct' => 1 // Index of the correct answer (4)
        ],
        [
            'question' => 'What is the area of a rectangle with length 6 and width 4?',
            'options' => ['20', '24', '10', '18'],
            'correct' => 1 // Index of the correct answer (24)
        ]
    ],
    'ela' => [
        [
            'question' => 'Which word is a noun?',
            'options' => ['Run', 'Happy', 'Book', 'Quickly'],
            'correct' => 2 // Index of the correct answer (Book)
        ],
        [
            'question' => 'What is the past tense of "go"?',
            'options' => ['Gone', 'Went', 'Going', 'Goed'],
            'correct' => 1 // Index of the correct answer (Went)
        ],
        [
            'question' => 'Identify the adjective in the sentence: "The red car is fast."',
            'options' => ['Car', 'Is', 'Fast', 'Red'],
            'correct' => 3 // Index of the correct answer (Red)
        ]
    ],
    'science' => [
        [
            'question' => 'What is H2O?',
            'options' => ['Oxygen', 'Hydrogen Peroxide', 'Water', 'Salt'],
            'correct' => 2 // Index of the correct answer (Water)
        ],
        [
            'question' => 'What planet is known as the Red Planet?',
            'options' => ['Earth', 'Mars', 'Jupiter', 'Venus'],
            'correct' => 1 // Index of the correct answer (Mars)
        ],
        [
            'question' => 'What is the process by which plants make their own food?',
            'options' => ['Respiration', 'Photosynthesis', 'Digestion', 'Germination'],
            'correct' => 1 // Index of the correct answer (Photosynthesis)
        ]
    ],
    'social_studies' => [
        [
            'question' => 'Who was the first President of the United States?',
            'options' => ['Thomas Jefferson', 'Abraham Lincoln', 'George Washington', 'John Adams'],
            'correct' => 2 // Index of the correct answer (George Washington)
        ],
        [
            'question' => 'What is the capital of France?',
            'options' => ['London', 'Berlin', 'Madrid', 'Paris'],
            'correct' => 3 // Index of the correct answer (Paris)
        ],
        [
            'question' => 'Which ocean is the largest?',
            'options' => ['Atlantic', 'Indian', 'Arctic', 'Pacific'],
            'correct' => 3 // Index of the correct answer (Pacific)
        ]
    ]
];

// Function to safely get questions for a subject
function get_questions_for_subject($subject, $all_questions) {
    if (isset($all_questions[$subject])) {
        return $all_questions[$subject];
    } else {
        return []; // Return empty array if subject not found
    }
}

// Function to get subject title
function get_subject_title($subject) {
    $titles = [
        'math' => 'Math Test',
        'ela' => 'ELA Test',
        'science' => 'Science Test',
        'social_studies' => 'Social Studies Test'
    ];
    return $titles[$subject] ?? 'Unknown Test';
}

?>
