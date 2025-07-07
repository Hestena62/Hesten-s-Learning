  // Global variables to track questions, current index, and user answers
                let currentQuestions = [];
                let currentQuestionIndex = 0;
                let userAnswers = [];

                // Add this shuffle function before loadCurrentQuestion
                function shuffleArray(array) {
                    for (let i = array.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [array[i], array[j]] = [array[j], array[i]];
                    }
                    return array;
                }

                // Initialize questions when page loads
                document.addEventListener('DOMContentLoaded', () => {
                    const savedGrade = localStorage.getItem('user-grade') || 'Seventh Grade';
                    document.getElementById('user-grade').value = savedGrade;
                    loadQuestions(savedGrade);
                });

                // Update grade and reset questions when grade changes
                function updateGrade() {
                    const grade = document.getElementById('user-grade').value;
                    localStorage.setItem('user-grade', grade);
                    loadQuestions(grade);
                    currentQuestionIndex = 0;
                    userAnswers = [];
                }

                // Load questions for the selected grade
                function loadQuestions(grade) {
                    currentQuestions = generateQuestionsForGrade(grade); // No limit to questions now
                    if (currentQuestions.length > 0) {
                        loadCurrentQuestion();
                    } else {
                        document.getElementById('question').textContent = 'No questions available for this grade level.';
                        document.getElementById('options').innerHTML = '';
                        document.getElementById('feedback').textContent = '';
                    }
                }



                // Replace the existing loadCurrentQuestion function with this one
                function loadCurrentQuestion() {
                    const questionContainer = document.getElementById("question");
                    const optionsContainer = document.getElementById("options");
                    const feedbackContainer = document.getElementById("feedback");
                    const hintText = document.getElementById("hintText");
                    const explanationText = document.getElementById("explanationText");

                    // Reset display elements
                    feedbackContainer.textContent = "";
                    optionsContainer.innerHTML = "";
                    hintText.style.display = "none";
                    explanationText.style.display = "none";

                    // Load question data
                    const questionData = currentQuestions[currentQuestionIndex];
                    questionContainer.textContent = questionData.question;

                    // Create array of options and shuffle them
                    const shuffledOptions = shuffleArray([...questionData.options]);

                    // Create option buttons with shuffled options
                    shuffledOptions.forEach(option => {
                        const optionButton = document.createElement("button");
                        optionButton.textContent = option;
                        optionButton.classList.add("btn", "btn-outline-primary", "m-2");
                        optionButton.onclick = () => checkAnswer(option);
                        optionsContainer.appendChild(optionButton);
                    });

                    // Set hint and explanation text if available
                    if (questionData.hint) {
                        document.getElementById('hintButton').style.display = 'inline-block';
                    } else {
                        document.getElementById('hintButton').style.display = 'none';
                    }

                    if (questionData.explanation) {
                        document.getElementById('explainButton').style.display = 'inline-block';
                    } else {
                        document.getElementById('explainButton').style.display = 'none';
                    }
                }

                // Show hint text
                function showHint() {
                    const hintText = document.getElementById("hintText");
                    const questionData = currentQuestions[currentQuestionIndex];
                    hintText.textContent = questionData.hint || "No hint available.";
                    hintText.style.display = "block";
                }

                // Show explanation text
                function showExplanation() {
                    const explanationText = document.getElementById("explanationText");
                    const questionData = currentQuestions[currentQuestionIndex];
                    explanationText.textContent = questionData.explanation || "No explanation available.";
                    explanationText.style.display = "block";
                }

                // Check if selected answer is correct
                function checkAnswer(selectedOption) {
                    const feedbackContainer = document.getElementById("feedback");
                    const questionData = currentQuestions[currentQuestionIndex];
                    const question = questionData.question;

                    // Convert to strings for comparison
                    const selectedStr = String(selectedOption);
                    const correctStr = String(questionData.answer);

                    const isCorrect = selectedStr === correctStr;

                    // Log the answer
                    userAnswers.push({
                        question,
                        selectedOption,
                        isCorrect,
                        correctAnswer: correctStr
                    });

                    if (isCorrect) {
                        feedbackContainer.textContent = "Correct!";
                        feedbackContainer.style.color = "green";
                    } else {
                        feedbackContainer.textContent = "Try again!";
                        feedbackContainer.style.color = "red";
                    }

                    // Move to next question after delay
                    setTimeout(() => {
                        currentQuestionIndex++;
                        // Reset index to 0 if we've reached the end
                        if (currentQuestionIndex >= currentQuestions.length) {
                            currentQuestionIndex = 0;
                            // Optionally shuffle questions again for variety
                            currentQuestions = shuffleArray([...currentQuestions]);
                        }
                        loadCurrentQuestion();
                    }, 1000);
                }


                // Download answers as PDF
                document.getElementById("downloadAnswers").onclick = function () {
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF();
                    const userName = document.getElementById('profile-name').textContent || 'User';
                    const userGrade = localStorage.getItem('user-grade') || 'Not Specified';
                    const currentTime = new Date().toLocaleString();

                    // Function to add header (only on first page)
                    function addHeader(pageNumber) {
                        if (pageNumber === 1) {
                            doc.setFont("helvetica", "normal");
                            doc.setFontSize(10);
                            doc.text(`Grade: ${userGrade}`, 20, 10);
                            doc.text(`Generated: ${currentTime}`, doc.internal.pageSize.width - 20, 10, { align: "right" });
                        }
                    }

                    // Function to add footer on every page
                    function addFooter(pageNumber) {
                        doc.setFont("helvetica", "normal");
                        doc.setFontSize(10);
                        doc.text("Hesten's Learning", 20, doc.internal.pageSize.height - 10);
                        doc.text(`Page ${pageNumber}`, doc.internal.pageSize.width - 20, doc.internal.pageSize.height - 10, { align: "right" });
                    }

                    // Title
                    doc.setFont("helvetica", "bold");
                    doc.setFontSize(18);
                    doc.text(`${userName}'s Answer Report`, 105, 20, { align: "center" });

                    // Add header and footer for first page
                    addHeader(1);
                    addFooter(1);

                    // Questions and answers
                    let yOffset = 40;
                    userAnswers.forEach((answer, index) => {
                        // Check if page overflow occurs
                        if (yOffset > 250) {
                            doc.addPage();
                            const pageNumber = doc.internal.getNumberOfPages();
                            addHeader(pageNumber);
                            addFooter(pageNumber);
                            yOffset = 20;
                        }

                        // Question number
                        doc.setFont("helvetica", "bold");
                        doc.text(`${index + 1}. ${answer.question}`, 20, yOffset);

                        // Answer
                        doc.setFont("helvetica", "normal");
                        yOffset += 10;
                        doc.text(`Your Answer: ${answer.selectedOption}`, 25, yOffset);

                        yOffset += 10;
                        doc.text(`Correct Answer: ${answer.correctAnswer}`, 25, yOffset);

                        yOffset += 10;
                        doc.text(`Result: ${answer.isCorrect ? "Correct" : "Incorrect"}`, 25, yOffset);

                        yOffset += 15;
                    });

                    // Save PDF locally
                    doc.save(`${userName}_answers_${Date.now()}.pdf`);
                    alert("PDF saved successfully!");
                };

                function getQuestionsForGrade(grade) {
                    return generateQuestionsForGrade(grade); // Use the existing function to generate questions
                }


                function generateQuestionsForGrade(grade) {
                    const questions = [];
                    const operations = ['+', '-', '*', '/'];

                    switch (grade) {

                        case 'First Grade':
                            // Alternating between math and ELA questions
                            for (let i = 0; i < 20; i++) {
                                if (i % 2 === 0) {
                                    // Math questions
                                    const num1 = Math.ceil(Math.random() * 10);
                                    const num2 = Math.ceil(Math.random() * (10 - num1)); // Ensure sum <= 10
                                    questions.push({
                                        question: `What is ${num1} + ${num2}?`,
                                        options: [num1 + num2 - 1, num1 + num2, num1 + num2 + 1, num1 + num2 + 2],
                                        answer: (num1 + num2).toString(),
                                        hint: "Try counting up from the first number",
                                        explanation: `To solve ${num1} + ${num2}, start with ${num1} and count up ${num2} more numbers.`
                                    });
                                } else {
                                    // ELA questions with different types
                                    const questionTypes = [
                                        {
                                            type: 'sight',
                                            words: ['the', 'and', 'a', 'to', 'is', 'in', 'you', 'that', 'it', 'he'],
                                            template: 'Which word is "{word}"?'
                                        },
                                        {
                                            type: 'rhyme',
                                            words: ['cat', 'dog', 'hat', 'big', 'red', 'bed', 'sun', 'run', 'fish', 'dish'],
                                            template: 'Which word rhymes with "{word}"?'
                                        },
                                        {
                                            type: 'starts',
                                            words: ['book', 'ball', 'car', 'dog', 'fish', 'game', 'hat', 'jump', 'kite', 'lamp'],
                                            template: 'Which word starts with the letter "{letter}"?'
                                        }
                                    ];

                                    const type = questionTypes[Math.floor(Math.random() * questionTypes.length)];
                                    const word = type.words[Math.floor(Math.random() * type.words.length)];
                                    let question, options;

                                    if (type.type === 'rhyme') {
                                        const rhymeWord = type.words.find(w => w !== word && w.slice(-2) === word.slice(-2));
                                        options = shuffleArray([rhymeWord, ...type.words.filter(w => w !== word && w !== rhymeWord)]).slice(0, 4);
                                        question = type.template.replace('{word}', word);
                                    } else if (type.type === 'starts') {
                                        const letter = word[0];
                                        options = shuffleArray(type.words.filter(w => w[0] === letter)).slice(0, 4);
                                        question = type.template.replace('{letter}', letter.toUpperCase());
                                    } else {
                                        options = shuffleArray([...type.words]).slice(0, 4);
                                        if (!options.includes(word)) options[0] = word;
                                        question = type.template.replace('{word}', word);
                                    }

                                    questions.push({
                                        question: question,
                                        options: options,
                                        answer: type.type === 'starts' ? word : (type.type === 'rhyme' ? options[0] : word),
                                        hint: "Sound out the letters carefully",
                                        explanation: `This helps practice ${type.type === 'rhyme' ? 'rhyming words' :
                                            type.type === 'starts' ? 'beginning sounds' : 'sight word recognition'}.`
                                    });
                                }
                            } break;

                        case 'Second Grade':
                            // Alternating between math and ELA questions for Second Grade
                            for (let i = 0; i < 20; i++) {
                                if (i % 2 === 0) {
                                    // Math: Addition and subtraction within 20
                                    const num1 = Math.ceil(Math.random() * 20);
                                    const num2 = Math.ceil(Math.random() * 10);
                                    const operation = operations[Math.floor(Math.random() * 2)];
                                    const result = operation === '+' ? num1 + num2 : num1 - num2;
                                    questions.push({
                                        question: `What is ${num1} ${operation} ${num2}?`,
                                        options: [result - 1, result, result + 1, result + 2],
                                        answer: result.toString(),
                                        hint: operation === '+' ?
                                            "Break the numbers into tens and ones" :
                                            "Think of it as counting back",
                                        explanation: operation === '+' ?
                                            `To solve ${num1} + ${num2}, break ${num1} into tens and ones, then add ${num2}` :
                                            `To solve ${num1} - ${num2}, start at ${num1} and count back ${num2} numbers`
                                    });
                                } else {
                                    // ELA: Reading comprehension and spelling
                                    const words = ['because', 'friend', 'people', 'school', 'there', 'where', 'their', 'they', 'what', 'when'];
                                    const word = words[Math.floor(Math.random() * words.length)];
                                    const options = shuffleArray([...words]).slice(0, 4);
                                    if (!options.includes(word)) options[0] = word;
                                    questions.push({
                                        question: `Which word means: "${word}"?`,
                                        options: options,
                                        answer: word,
                                        hint: "Sound out each letter carefully",
                                        explanation: `"${word}" is a common second grade sight word that helps us express our thoughts.`
                                    });
                                }
                            }
                            break;

                        case 'Third Grade':
                            // Multiplication and division up to 10
                            // Alternating between math and ELA questions for Third Grade
                            for (let i = 0; i < 20; i++) {
                                if (i % 2 === 0) {
                                    // Math: multiplication and division
                                    const num1 = Math.ceil(Math.random() * 10);
                                    const num2 = Math.ceil(Math.random() * 10);
                                    const operation = operations[Math.floor(Math.random() * 4)];
                                    let result;

                                    if (operation === '*') {
                                        result = num1 * num2;
                                        questions.push({
                                            question: `What is ${num1} × ${num2}?`,
                                            options: [result - 1, result, result + 1, result + 2],
                                            answer: result.toString(),
                                            hint: `Think of ${num1} groups of ${num2}`,
                                            explanation: `${num1} × ${num2} = ${result} can be solved by adding ${num2} to itself ${num1} times`
                                        });
                                    } else if (operation === '/') {
                                        result = num1;
                                        questions.push({
                                            question: `What is ${num1 * num2} ÷ ${num2}?`,
                                            options: [result - 1, result, result + 1, result + 2],
                                            answer: result.toString(),
                                            hint: `Think about multiplication: what number times ${num2} equals ${num1 * num2}?`,
                                            explanation: `To solve ${num1 * num2} ÷ ${num2}, ask yourself: how many groups of ${num2} make ${num1 * num2}?`
                                        });
                                    }
                                } else {
                                    // ELA: Reading comprehension, vocabulary, and grammar
                                    const elaQuestions = [
                                        {
                                            question: "Which word is a synonym for 'happy'?",
                                            options: ['joyful', 'sad', 'angry', 'tired'],
                                            answer: 'joyful',
                                            hint: "Think of a word that means the same as 'happy'",
                                            explanation: "'Joyful' means feeling or showing great happiness"
                                        },
                                        {
                                            question: "Which sentence uses correct punctuation?",
                                            options: [
                                                "The cat ran fast",
                                                "The cat ran fast.",
                                                "the cat ran fast",
                                                "The cat ran, fast"
                                            ],
                                            answer: "The cat ran fast.",
                                            hint: "Remember that sentences end with punctuation marks",
                                            explanation: "Every complete sentence needs an ending punctuation mark like a period"
                                        }
                                    ];
                                    const randomEla = elaQuestions[Math.floor(Math.random() * elaQuestions.length)];
                                    questions.push(randomEla);
                                }
                            }
                            break;

                        case 'Fourth Grade':
                            // Math: Fractions and decimals
                            for (let i = 0; i < 10; i++) {
                                const num1 = Math.ceil(Math.random() * 10);
                                const num2 = Math.ceil(Math.random() * 10);
                                const decimal = (num1 / num2).toFixed(2);
                                questions.push({
                                    question: `Convert ${num1}/${num2} to a decimal`,
                                    options: [
                                        (decimal - 0.1).toFixed(2),
                                        decimal,
                                        (Number(decimal) + 0.1).toFixed(2),
                                        (Number(decimal) + 0.2).toFixed(2)
                                    ],
                                    answer: decimal,
                                    hint: "To convert a fraction to a decimal, divide the numerator by the denominator",
                                    explanation: `To convert ${num1}/${num2} to a decimal, divide ${num1} by ${num2}. You can use a calculator or long division.`,
                                });
                            }

                            // ELA: Synonyms and antonyms
                            const words = ["happy", "sad", "fast", "slow", "big", "small", "bright", "dark", "strong", "weak"];
                            for (let i = 0; i < 10; i++) {
                                const word = words[Math.floor(Math.random() * words.length)];
                                const isSynonym = Math.random() > 0.5;
                                const synonym = word + " (synonym)"; // Replace with actual synonyms
                                const antonym = word + " (antonym)"; // Replace with actual antonyms

                                questions.push({
                                    question: `What is a ${isSynonym ? 'synonym' : 'antonym'} for the word "${word}"?`,
                                    options: [
                                        synonym,
                                        antonym,
                                        "Unrelated Word 1",
                                        "Unrelated Word 2"
                                    ],
                                    answer: isSynonym ? synonym : antonym,
                                    hint: `A ${isSynonym ? 'synonym' : 'antonym'} is a word that means ${isSynonym ? 'the same' : 'the opposite'} as another word.`,
                                    explanation: `${isSynonym ? 'Synonyms' : 'Antonyms'} of "${word}" include ${isSynonym ? synonym : antonym}.`
                                });
                            }
                            break;

                        case 'Fifth Grade':
                            // Fifth Grade comprehensive standards
                            for (let i = 0; i < 20; i++) {
                                const questionTypes = [
                                    // Decimal operations
                                    () => {
                                        const dec1 = (Math.random() * 10).toFixed(2);
                                        const dec2 = (Math.random() * 5).toFixed(2);
                                        const sum = (Number(dec1) + Number(dec2)).toFixed(2);
                                        return {
                                            question: `What is ${dec1} + ${dec2}?`,
                                            options: [(sum - 0.1).toFixed(2), sum, (Number(sum) + 0.1).toFixed(2), (Number(sum) + 0.2).toFixed(2)],
                                            answer: sum,
                                            hint: "Line up the decimal points when adding",
                                            explanation: `To add decimals, align the decimal points and add each place value: ${dec1} + ${dec2} = ${sum}`
                                        };
                                    },
                                    // Fractions
                                    () => {
                                        const num1 = Math.ceil(Math.random() * 5);
                                        const den1 = Math.ceil(Math.random() * 5) + 5;
                                        const num2 = Math.ceil(Math.random() * 5);
                                        const den2 = den1; // Using same denominator for simplicity
                                        const sum = (num1 + num2) / den1;
                                        return {
                                            question: `What is ${num1}/${den1} + ${num2}/${den1}?`,
                                            options: [`${num1 + num2 - 1}/${den1}`, `${num1 + num2}/${den1}`, `${num1 + num2 + 1}/${den1}`, `${num1}/${den1}`],
                                            answer: `${num1 + num2}/${den1}`,
                                            hint: "With same denominators, add only the numerators",
                                            explanation: `When adding fractions with the same denominator, keep the denominator and add the numerators: ${num1}/${den1} + ${num2}/${den1} = ${num1 + num2}/${den1}`
                                        };
                                    },
                                    // Geometry - Area
                                    () => {
                                        const length = Math.ceil(Math.random() * 10);
                                        const width = Math.ceil(Math.random() * 10);
                                        const area = length * width;
                                        return {
                                            question: `What is the area of a rectangle with length ${length} units and width ${width} units?`,
                                            options: [area - 1, area, area + 1, area + 2],
                                            answer: area.toString(),
                                            hint: "Area = length × width",
                                            explanation: `The area of a rectangle is length × width: ${length} × ${width} = ${area} square units`
                                        };
                                    },
                                    // Volume
                                    () => {
                                        const length = Math.ceil(Math.random() * 5);
                                        const width = Math.ceil(Math.random() * 5);
                                        const height = Math.ceil(Math.random() * 5);
                                        const volume = length * width * height;
                                        return {
                                            question: `What is the volume of a rectangular prism with length ${length}, width ${width}, and height ${height}?`,
                                            options: [volume - 1, volume, volume + 1, volume + 2],
                                            answer: volume.toString(),
                                            hint: "Volume = length × width × height",
                                            explanation: `The volume is length × width × height: ${length} × ${width} × ${height} = ${volume} cubic units`
                                        };
                                    },
                                    // Order of Operations
                                    () => {
                                        const num1 = Math.ceil(Math.random() * 10);
                                        const num2 = Math.ceil(Math.random() * 10);
                                        const num3 = Math.ceil(Math.random() * 5);
                                        const result = (num1 + num2) * num3;
                                        return {
                                            question: `What is (${num1} + ${num2}) × ${num3}?`,
                                            options: [result - 2, result - 1, result, result + 1],
                                            answer: result.toString(),
                                            hint: "Solve what's in parentheses first",
                                            explanation: `First add inside parentheses: ${num1} + ${num2} = ${num1 + num2}, then multiply: ${num1 + num2} × ${num3} = ${result}`
                                        };
                                    }
                                ];

                                // Randomly select a question type
                                questions.push(questionTypes[Math.floor(Math.random() * questionTypes.length)]());
                            }
                            break;

                        case 'Sixth Grade':
                            // Alternating between math and ELA questions
                            for (let i = 0; i < 20; i++) {
                                if (i % 2 === 0) {
                                    // Math: Ratios, percentages, and statistics
                                    const questionTypes = [
                                        // Ratio problem
                                        () => {
                                            const num1 = Math.ceil(Math.random() * 12);
                                            const num2 = Math.ceil(Math.random() * 12);
                                            const ratio = num1 / num2;
                                            return {
                                                question: `If the ratio is ${num1}:${num2}, what is the decimal form?`,
                                                options: [(ratio - 0.1).toFixed(2), ratio.toFixed(2), (ratio + 0.1).toFixed(2), (ratio + 0.2).toFixed(2)],
                                                answer: ratio.toFixed(2),
                                                hint: "Divide the first number by the second number",
                                                explanation: `To convert ${num1}:${num2} to decimal, divide ${num1} ÷ ${num2} = ${ratio.toFixed(2)}`
                                            };
                                        },
                                        // Percentage problem
                                        () => {
                                            const whole = Math.ceil(Math.random() * 100);
                                            const percent = Math.ceil(Math.random() * 50);
                                            const result = (whole * percent / 100);
                                            return {
                                                question: `What is ${percent}% of ${whole}?`,
                                                options: [result - 1, result, result + 1, result + 2],
                                                answer: result.toString(),
                                                hint: "Convert percentage to decimal and multiply",
                                                explanation: `${percent}% = ${percent / 100} × ${whole} = ${result}`
                                            };
                                        }
                                    ];
                                    questions.push(questionTypes[Math.floor(Math.random() * questionTypes.length)]());
                                } else {
                                    // ELA: Grammar and vocabulary
                                    const elaQuestions = [
                                        {
                                            question: "Which sentence uses the correct form of their/there/they're?",
                                            options: [
                                                "Their going to the store.",
                                                "There going to the store.",
                                                "They're going to the store.",
                                                "Theyre going to the store."
                                            ],
                                            answer: "They're going to the store.",
                                            hint: "They're is a contraction of 'they are'",
                                            explanation: "'They're' is the contraction of 'they are'. Use this when you can replace it with 'they are'."
                                        },
                                        {
                                            question: "Which word is a synonym for 'benevolent'?",
                                            options: ["kind", "cruel", "angry", "tired"],
                                            answer: "kind",
                                            hint: "Benevolent means showing kindness and good will",
                                            explanation: "'Benevolent' means kind or generous. It comes from Latin words meaning 'good' and 'wish'."
                                        }
                                    ];
                                    questions.push(elaQuestions[Math.floor(Math.random() * elaQuestions.length)]);
                                }
                            }
                            break;

                        case 'Seventh Grade':
                            // Simple algebra
                            for (let i = 0; i < 10; i++) {
                                const x = Math.ceil(Math.random() * 10);
                                const multiplier = Math.ceil(Math.random() * 5);
                                const constant = Math.ceil(Math.random() * 10);
                                questions.push({
                                    question: `Solve for x: ${multiplier}x + ${constant} = ${multiplier * x + constant}`,
                                    options: [x - 1, x, x + 1, x + 2],
                                    answer: x.toString(),
                                    hint: "To solve for x, first subtract " + constant + " from both sides, then divide by " + multiplier,
                                    explanation: `To solve ${multiplier}x + ${constant} = ${multiplier * x + constant}, subtract ${constant} from both sides to get ${multiplier}x = ${multiplier * x}, then divide both sides by ${multiplier} to get x = ${x}`
                                });
                            }
                            break;

                        case 'Eighth Grade':
                            // Linear equations
                            for (let i = 0; i < 10; i++) {
                                const m = Math.ceil(Math.random() * 5);
                                const b = Math.ceil(Math.random() * 10);
                                const x = Math.ceil(Math.random() * 5);
                                const y = m * x + b;
                                questions.push({
                                    question: `If y = ${m}x + ${b}, what is y when x = ${x}?`,
                                    options: [y - 2, y - 1, y, y + 1],
                                    answer: y.toString(),
                                    hint: `To find y, plug x = ${x} into the equation y = ${m}x + ${b}`,
                                    explanation: `With y = ${m}x + ${b}, substitute x = ${x}. 
                                Then y = ${m}(${x}) + ${b} = ${m * x} + ${b} = ${y}`
                                });
                            }
                            break;

                        case 'Ninth Grade':
                            // Quadratic equations
                            for (let i = 0; i < 10; i++) {
                                const a = Math.ceil(Math.random() * 3);
                                const b = Math.ceil(Math.random() * 5);
                                const x = Math.ceil(Math.random() * 3);
                                const y = a * x * x + b * x;
                                questions.push({
                                    question: `If y = ${a}x² + ${b}x, what is y when x = ${x}?`,
                                    options: [y - 2, y - 1, y, y + 1],
                                    answer: y.toString(),
                                    hint: `To solve this, substitute x = ${x} into the equation y = ${a}x² + ${b}x. 
                                First find ${a}x², then ${b}x, and add them.`,
                                    explanation: `Let's solve step by step:
                                1) First term: ${a}(${x})² = ${a}(${x * x}) = ${a * x * x}
                                2) Second term: ${b}(${x}) = ${b * x}
                                3) Sum them: ${a * x * x} + ${b * x} = ${y}`
                                });
                            }
                            break;

                        case 'Tenth Grade':
                            // Trigonometry
                            const angles = [0, 30, 45, 60, 90];
                            for (let i = 0; i < 10; i++) {
                                const angle = angles[Math.floor(Math.random() * angles.length)];
                                const sinValue = Math.sin(angle * Math.PI / 180).toFixed(2);
                                questions.push({
                                    question: `What is sin(${angle}°)? (rounded to 2 decimal places)`,
                                    options: [
                                        (Number(sinValue) - 0.1).toFixed(2),
                                        sinValue,
                                        (Number(sinValue) + 0.1).toFixed(2),
                                        (Number(sinValue) + 0.2).toFixed(2)
                                    ],
                                    answer: sinValue,
                                    hint: "For common angles, remember: sin(0°)=0, sin(30°)=0.5, sin(45°)=0.71, sin(60°)=0.87, sin(90°)=1",
                                    explanation: `For ${angle}°, the sine value is ${sinValue}. This is a fundamental angle you should memorize for trigonometry calculations.`
                                });
                            }
                            break;

                        case 'Eleventh Grade':
                            // Logarithms and exponentials
                            for (let i = 0; i < 10; i++) {
                                const base = Math.ceil(Math.random() * 3) + 1;
                                const power = Math.ceil(Math.random() * 3);
                                const result = Math.pow(base, power);
                                questions.push({
                                    question: `What is log${base}(${result})?`,
                                    options: [power - 1, power, power + 1, power + 2],
                                    answer: power.toString(),
                                    hint: "Remember: logs find the power needed to get the result. If " + base + "^x = " + result + ", what is x?",
                                    explanation: `To solve log${base}(${result}), ask: what power gives ${result} when ${base} is raised to it? ${base}^${power} = ${result}, so log${base}(${result}) = ${power}`
                                });
                            }
                            break;

                        case 'Twelfth Grade':
                            // Calculus (derivatives)
                            for (let i = 0; i < 10; i++) {
                                const coefficient = Math.ceil(Math.random() * 5);
                                const power = Math.ceil(Math.random() * 3) + 1;
                                questions.push({
                                    question: `What is the derivative of ${coefficient}x^${power}?`,
                                    options: [
                                        `${coefficient * power}x^${power - 1}`,
                                        `${coefficient}x^${power}`,
                                        `${coefficient * power}`,
                                        `${coefficient}x`,
                                    ],
                                    answer: `${coefficient * power}x^${power - 1}`,
                                    hint: "To find the derivative, bring down the power and multiply by the coefficient",
                                    explanation: `The derivative of ${coefficient}x^${power} is ${coefficient * power}x^${power - 1}. 
                                To find the derivative, bring down the power ${power} and multiply by the coefficient ${coefficient}.`
                                });
                            }
                            break;

                        default:
                            questions.push({
                                question: 'No questions available for this grade level.',
                                options: [],
                                answer: '',
                            });
                    }

                    return questions;
                }

                // Removed redundant getQuestionsForGrade function