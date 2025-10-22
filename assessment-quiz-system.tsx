import React, { useState, useEffect } from 'react';
import { BookOpen, Award, TrendingUp, Clock, CheckCircle, XCircle, RotateCcw, Download, Lightbulb, ChevronRight } from 'lucide-react';

// Question bank organized by grade and subject
const questionBank = {
  "First Grade": {
    Math: [
      {
        question: "What is 5 + 3?",
        options: ["6", "7", "8", "9"],
        correct: "8",
        hint: "Count up from 5: 6, 7, 8",
        explanation: "When we add 5 + 3, we start at 5 and count up 3 more: 6, 7, 8"
      },
      {
        question: "What is 10 - 4?",
        options: ["5", "6", "7", "8"],
        correct: "6",
        hint: "Count down from 10 four times",
        explanation: "Starting at 10, count backwards 4 times: 9, 8, 7, 6"
      },
      {
        question: "Which number comes after 7?",
        options: ["6", "8", "9", "10"],
        correct: "8",
        hint: "Think about counting: 6, 7, ?",
        explanation: "The counting sequence is 6, 7, 8, 9, 10"
      }
    ],
    ELA: [
      {
        question: "Which word rhymes with 'cat'?",
        options: ["dog", "hat", "bird", "fish"],
        correct: "hat",
        hint: "Look for words that end with -at",
        explanation: "Cat and hat both end with 'at', making them rhyme"
      },
      {
        question: "What is the first letter in 'apple'?",
        options: ["A", "B", "C", "D"],
        correct: "A",
        hint: "Say the word slowly: A-pple",
        explanation: "Apple starts with the letter A"
      }
    ]
  },
  "Third Grade": {
    Math: [
      {
        question: "What is 7 × 8?",
        options: ["54", "56", "58", "60"],
        correct: "56",
        hint: "Think of 7 groups of 8",
        explanation: "7 × 8 = 56. You can verify by adding 8 seven times"
      },
      {
        question: "What is 36 ÷ 6?",
        options: ["4", "5", "6", "7"],
        correct: "6",
        hint: "How many 6s fit into 36?",
        explanation: "36 ÷ 6 = 6 because 6 × 6 = 36"
      },
      {
        question: "What is 15 + 28?",
        options: ["41", "42", "43", "44"],
        correct: "43",
        hint: "Add the ones first: 5 + 8 = 13",
        explanation: "15 + 28: Add 5 + 8 = 13, then 10 + 20 = 30, total = 43"
      }
    ],
    ELA: [
      {
        question: "What is a synonym for 'happy'?",
        options: ["sad", "joyful", "angry", "tired"],
        correct: "joyful",
        hint: "Look for a word with the same meaning",
        explanation: "Joyful means the same thing as happy"
      },
      {
        question: "Which sentence is correct?",
        options: [
          "The dog run fast",
          "The dog runs fast",
          "The dog running fast",
          "The dog runned fast"
        ],
        correct: "The dog runs fast",
        hint: "Check if the verb agrees with 'dog'",
        explanation: "We use 'runs' with singular subjects like 'dog'"
      }
    ]
  },
  "Seventh Grade": {
    Math: [
      {
        question: "Solve for x: 3x + 5 = 20",
        options: ["3", "4", "5", "6"],
        correct: "5",
        hint: "Subtract 5 from both sides first",
        explanation: "3x + 5 = 20 → 3x = 15 → x = 5"
      },
      {
        question: "What is 25% of 80?",
        options: ["15", "20", "25", "30"],
        correct: "20",
        hint: "25% is the same as 1/4",
        explanation: "25% = 0.25, so 0.25 × 80 = 20"
      },
      {
        question: "What is the area of a rectangle with length 8 and width 5?",
        options: ["13", "26", "40", "45"],
        correct: "40",
        hint: "Area = length × width",
        explanation: "Area = 8 × 5 = 40 square units"
      }
    ],
    Science: [
      {
        question: "What is the basic unit of life?",
        options: ["Atom", "Cell", "Molecule", "Organ"],
        correct: "Cell",
        hint: "It's the smallest living structure",
        explanation: "The cell is the basic unit of all living things"
      },
      {
        question: "What process do plants use to make food?",
        options: ["Respiration", "Photosynthesis", "Digestion", "Fermentation"],
        correct: "Photosynthesis",
        hint: "It involves sunlight and chlorophyll",
        explanation: "Plants use photosynthesis to convert sunlight into food"
      }
    ]
  }
};

const AssessmentQuizSystem = () => {
  const [selectedGrade, setSelectedGrade] = useState("Third Grade");
  const [selectedSubject, setSelectedSubject] = useState("Math");
  const [currentQuestionIndex, setCurrentQuestionIndex] = useState(0);
  const [score, setScore] = useState(0);
  const [userAnswers, setUserAnswers] = useState([]);
  const [showHint, setShowHint] = useState(false);
  const [showExplanation, setShowExplanation] = useState(false);
  const [answered, setAnswered] = useState(false);
  const [selectedAnswer, setSelectedAnswer] = useState(null);
  const [quizStarted, setQuizStarted] = useState(false);
  const [quizCompleted, setQuizCompleted] = useState(false);
  const [startTime, setStartTime] = useState(null);
  const [endTime, setEndTime] = useState(null);

  const grades = Object.keys(questionBank);
  const availableSubjects = selectedGrade ? Object.keys(questionBank[selectedGrade]) : [];
  const currentQuestions = selectedGrade && selectedSubject ? questionBank[selectedGrade][selectedSubject] : [];
  const currentQuestion = currentQuestions[currentQuestionIndex];

  const startQuiz = () => {
    setQuizStarted(true);
    setQuizCompleted(false);
    setCurrentQuestionIndex(0);
    setScore(0);
    setUserAnswers([]);
    setAnswered(false);
    setSelectedAnswer(null);
    setShowHint(false);
    setShowExplanation(false);
    setStartTime(new Date());
    setEndTime(null);
  };

  const handleAnswerSelect = (answer) => {
    if (answered) return;
    
    setSelectedAnswer(answer);
    setAnswered(true);
    
    const isCorrect = answer === currentQuestion.correct;
    if (isCorrect) {
      setScore(score + 1);
    }
    
    setUserAnswers([...userAnswers, {
      question: currentQuestion.question,
      userAnswer: answer,
      correctAnswer: currentQuestion.correct,
      isCorrect,
      explanation: currentQuestion.explanation
    }]);
  };

  const nextQuestion = () => {
    if (currentQuestionIndex < currentQuestions.length - 1) {
      setCurrentQuestionIndex(currentQuestionIndex + 1);
      setAnswered(false);
      setSelectedAnswer(null);
      setShowHint(false);
      setShowExplanation(false);
    } else {
      setQuizCompleted(true);
      setEndTime(new Date());
    }
  };

  const downloadResults = () => {
    const percentage = ((score / currentQuestions.length) * 100).toFixed(1);
    const timeTaken = endTime && startTime ? Math.round((endTime - startTime) / 1000) : 0;
    
    let text = `Hesten's Learning - Quiz Results\n`;
    text += `================================\n\n`;
    text += `Grade: ${selectedGrade}\n`;
    text += `Subject: ${selectedSubject}\n`;
    text += `Date: ${new Date().toLocaleDateString()}\n`;
    text += `Time Taken: ${timeTaken} seconds\n\n`;
    text += `Score: ${score}/${currentQuestions.length} (${percentage}%)\n\n`;
    text += `Detailed Results:\n`;
    text += `=================\n\n`;
    
    userAnswers.forEach((answer, index) => {
      text += `Question ${index + 1}: ${answer.question}\n`;
      text += `Your Answer: ${answer.userAnswer}\n`;
      text += `Correct Answer: ${answer.correctAnswer}\n`;
      text += `Result: ${answer.isCorrect ? '✓ Correct' : '✗ Incorrect'}\n`;
      text += `Explanation: ${answer.explanation}\n\n`;
    });
    
    const blob = new Blob([text], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `quiz-results-${Date.now()}.txt`;
    a.click();
    URL.revokeObjectURL(url);
  };

  if (!quizStarted) {
    return (
      <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-6">
        <div className="max-w-4xl mx-auto">
          <div className="bg-white rounded-2xl shadow-xl p-8">
            <div className="text-center mb-8">
              <div className="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 rounded-full mb-4">
                <BookOpen className="w-8 h-8 text-indigo-600" />
              </div>
              <h1 className="text-4xl font-bold text-gray-800 mb-2">Assessment & Quiz System</h1>
              <p className="text-gray-600">Test your knowledge and track your progress</p>
            </div>

            <div className="space-y-6">
              <div>
                <label className="block text-sm font-semibold text-gray-700 mb-2">
                  Select Grade Level
                </label>
                <select
                  value={selectedGrade}
                  onChange={(e) => {
                    setSelectedGrade(e.target.value);
                    const newSubjects = Object.keys(questionBank[e.target.value]);
                    setSelectedSubject(newSubjects[0]);
                  }}
                  className="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:outline-none transition"
                >
                  {grades.map(grade => (
                    <option key={grade} value={grade}>{grade}</option>
                  ))}
                </select>
              </div>

              <div>
                <label className="block text-sm font-semibold text-gray-700 mb-2">
                  Select Subject
                </label>
                <select
                  value={selectedSubject}
                  onChange={(e) => setSelectedSubject(e.target.value)}
                  className="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:outline-none transition"
                >
                  {availableSubjects.map(subject => (
                    <option key={subject} value={subject}>{subject}</option>
                  ))}
                </select>
              </div>

              <div className="bg-indigo-50 rounded-lg p-6">
                <h3 className="font-semibold text-gray-800 mb-3 flex items-center">
                  <Award className="w-5 h-5 mr-2 text-indigo-600" />
                  Quiz Information
                </h3>
                <div className="grid grid-cols-2 gap-4 text-sm">
                  <div>
                    <span className="text-gray-600">Total Questions:</span>
                    <span className="font-semibold text-gray-800 ml-2">
                      {currentQuestions.length}
                    </span>
                  </div>
                  <div>
                    <span className="text-gray-600">Time Limit:</span>
                    <span className="font-semibold text-gray-800 ml-2">Unlimited</span>
                  </div>
                  <div>
                    <span className="text-gray-600">Passing Score:</span>
                    <span className="font-semibold text-gray-800 ml-2">70%</span>
                  </div>
                  <div>
                    <span className="text-gray-600">Hints Available:</span>
                    <span className="font-semibold text-gray-800 ml-2">Yes</span>
                  </div>
                </div>
              </div>

              <button
                onClick={startQuiz}
                disabled={currentQuestions.length === 0}
                className="w-full bg-indigo-600 text-white py-4 rounded-lg font-semibold text-lg hover:bg-indigo-700 transition disabled:bg-gray-300 disabled:cursor-not-allowed flex items-center justify-center"
              >
                Start Quiz
                <ChevronRight className="w-5 h-5 ml-2" />
              </button>
            </div>
          </div>
        </div>
      </div>
    );
  }

  if (quizCompleted) {
    const percentage = ((score / currentQuestions.length) * 100).toFixed(1);
    const passed = percentage >= 70;
    const timeTaken = endTime && startTime ? Math.round((endTime - startTime) / 1000) : 0;

    return (
      <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-6">
        <div className="max-w-4xl mx-auto">
          <div className="bg-white rounded-2xl shadow-xl p-8">
            <div className="text-center mb-8">
              <div className={`inline-flex items-center justify-center w-20 h-20 rounded-full mb-4 ${
                passed ? 'bg-green-100' : 'bg-yellow-100'
              }`}>
                <Award className={`w-10 h-10 ${passed ? 'text-green-600' : 'text-yellow-600'}`} />
              </div>
              <h1 className="text-4xl font-bold text-gray-800 mb-2">Quiz Complete!</h1>
              <p className="text-gray-600">Here are your results</p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
              <div className="bg-indigo-50 rounded-lg p-6 text-center">
                <div className="text-3xl font-bold text-indigo-600 mb-1">
                  {score}/{currentQuestions.length}
                </div>
                <div className="text-sm text-gray-600">Questions Correct</div>
              </div>
              
              <div className="bg-indigo-50 rounded-lg p-6 text-center">
                <div className="text-3xl font-bold text-indigo-600 mb-1">{percentage}%</div>
                <div className="text-sm text-gray-600">Final Score</div>
              </div>
              
              <div className="bg-indigo-50 rounded-lg p-6 text-center">
                <div className="text-3xl font-bold text-indigo-600 mb-1">{timeTaken}s</div>
                <div className="text-sm text-gray-600">Time Taken</div>
              </div>
            </div>

            <div className={`rounded-lg p-4 mb-6 ${
              passed ? 'bg-green-50 border-2 border-green-200' : 'bg-yellow-50 border-2 border-yellow-200'
            }`}>
              <p className={`text-center font-semibold ${
                passed ? 'text-green-800' : 'text-yellow-800'
              }`}>
                {passed ? '🎉 Congratulations! You passed!' : '📚 Keep practicing! You can do better!'}
              </p>
            </div>

            <div className="space-y-4 mb-6">
              <h3 className="text-xl font-bold text-gray-800 flex items-center">
                <TrendingUp className="w-5 h-5 mr-2" />
                Answer Review
              </h3>
              
              {userAnswers.map((answer, index) => (
                <div key={index} className={`border-2 rounded-lg p-4 ${
                  answer.isCorrect ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50'
                }`}>
                  <div className="flex items-start justify-between mb-2">
                    <h4 className="font-semibold text-gray-800 flex-1">
                      Question {index + 1}: {answer.question}
                    </h4>
                    {answer.isCorrect ? (
                      <CheckCircle className="w-6 h-6 text-green-600 flex-shrink-0" />
                    ) : (
                      <XCircle className="w-6 h-6 text-red-600 flex-shrink-0" />
                    )}
                  </div>
                  
                  <div className="space-y-1 text-sm">
                    <div>
                      <span className="text-gray-600">Your answer:</span>
                      <span className={`ml-2 font-semibold ${
                        answer.isCorrect ? 'text-green-700' : 'text-red-700'
                      }`}>
                        {answer.userAnswer}
                      </span>
                    </div>
                    
                    {!answer.isCorrect && (
                      <div>
                        <span className="text-gray-600">Correct answer:</span>
                        <span className="ml-2 font-semibold text-green-700">
                          {answer.correctAnswer}
                        </span>
                      </div>
                    )}
                    
                    <div className="mt-2 pt-2 border-t border-gray-200">
                      <span className="text-gray-600 font-semibold">Explanation:</span>
                      <p className="text-gray-700 mt-1">{answer.explanation}</p>
                    </div>
                  </div>
                </div>
              ))}
            </div>

            <div className="flex gap-4">
              <button
                onClick={downloadResults}
                className="flex-1 bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition flex items-center justify-center"
              >
                <Download className="w-5 h-5 mr-2" />
                Download Results
              </button>
              
              <button
                onClick={() => {
                  setQuizStarted(false);
                  setQuizCompleted(false);
                }}
                className="flex-1 bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition flex items-center justify-center"
              >
                <RotateCcw className="w-5 h-5 mr-2" />
                Take Another Quiz
              </button>
            </div>
          </div>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-6">
      <div className="max-w-4xl mx-auto">
        <div className="bg-white rounded-2xl shadow-xl p-8">
          {/* Progress Bar */}
          <div className="mb-8">
            <div className="flex justify-between items-center mb-2">
              <span className="text-sm font-semibold text-gray-600">
                Question {currentQuestionIndex + 1} of {currentQuestions.length}
              </span>
              <span className="text-sm font-semibold text-gray-600">
                Score: {score}/{currentQuestionIndex + (answered ? 1 : 0)}
              </span>
            </div>
            <div className="w-full bg-gray-200 rounded-full h-3">
              <div
                className="bg-indigo-600 h-3 rounded-full transition-all duration-300"
                style={{ width: `${((currentQuestionIndex + 1) / currentQuestions.length) * 100}%` }}
              />
            </div>
          </div>

          {/* Question */}
          <div className="mb-8">
            <h2 className="text-2xl font-bold text-gray-800 mb-6">
              {currentQuestion.question}
            </h2>

            {/* Answer Options */}
            <div className="space-y-3">
              {currentQuestion.options.map((option, index) => {
                const isSelected = selectedAnswer === option;
                const isCorrect = option === currentQuestion.correct;
                const showCorrect = answered && isCorrect;
                const showIncorrect = answered && isSelected && !isCorrect;

                return (
                  <button
                    key={index}
                    onClick={() => handleAnswerSelect(option)}
                    disabled={answered}
                    className={`w-full p-4 rounded-lg text-left font-medium transition-all border-2 ${
                      showCorrect
                        ? 'bg-green-100 border-green-500 text-green-800'
                        : showIncorrect
                        ? 'bg-red-100 border-red-500 text-red-800'
                        : isSelected
                        ? 'bg-indigo-100 border-indigo-500 text-indigo-800'
                        : 'bg-gray-50 border-gray-200 hover:border-indigo-300 text-gray-800'
                    } ${answered ? 'cursor-not-allowed' : 'cursor-pointer'}`}
                  >
                    <div className="flex items-center justify-between">
                      <span>{option}</span>
                      {showCorrect && <CheckCircle className="w-5 h-5" />}
                      {showIncorrect && <XCircle className="w-5 h-5" />}
                    </div>
                  </button>
                );
              })}
            </div>
          </div>

          {/* Hint and Explanation */}
          <div className="space-y-3 mb-6">
            {!answered && (
              <button
                onClick={() => setShowHint(!showHint)}
                className="flex items-center text-indigo-600 hover:text-indigo-700 font-semibold"
              >
                <Lightbulb className="w-5 h-5 mr-2" />
                {showHint ? 'Hide Hint' : 'Show Hint'}
              </button>
            )}

            {showHint && !answered && (
              <div className="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-4">
                <p className="text-yellow-800">
                  <span className="font-semibold">Hint:</span> {currentQuestion.hint}
                </p>
              </div>
            )}

            {answered && (
              <div className="bg-blue-50 border-2 border-blue-200 rounded-lg p-4">
                <p className="text-blue-800">
                  <span className="font-semibold">Explanation:</span> {currentQuestion.explanation}
                </p>
              </div>
            )}
          </div>

          {/* Navigation */}
          <div className="flex justify-between items-center">
            <button
              onClick={() => {
                setQuizStarted(false);
                setQuizCompleted(false);
              }}
              className="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition"
            >
              Exit Quiz
            </button>

            {answered && (
              <button
                onClick={nextQuestion}
                className="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition flex items-center"
              >
                {currentQuestionIndex < currentQuestions.length - 1 ? (
                  <>
                    Next Question
                    <ChevronRight className="w-5 h-5 ml-2" />
                  </>
                ) : (
                  <>
                    See Results
                    <Award className="w-5 h-5 ml-2" />
                  </>
                )}
              </button>
            )}
          </div>
        </div>
      </div>
    </div>
  );
};

export default AssessmentQuizSystem;