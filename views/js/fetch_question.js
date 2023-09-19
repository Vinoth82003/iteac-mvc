// Initialize the current question index
document.querySelector(".questionContainer").style.display = 'none';
let quizIndex = 0;
let aptitudeIndex = 0;
let reasoningIndex = 0;
let currentTab; // To track the current question type
let currentQuestions; // To track the questions for the current type

var quizQuestions = {};
var aptitudeQuestions = {};
var reasoningQuestions = {};

// Fetch quiz questions from PHP array
fetch('fetch_questions.php')
    .then(response => response.json())
    .then(data => {
        // Store the fetched questions in JavaScript variables
        quizQuestions = data.quizQuestions;
        aptitudeQuestions = data.aptitudeQuestions;
        reasoningQuestions = data.reasoningQuestions;

        // Example usage:
        console.log('Quiz Questions:', quizQuestions);
        console.log('Aptitude Questions:', aptitudeQuestions);
        console.log('Reasoning Questions:', reasoningQuestions);

        // Initialize the test after fetching questions
        initializeTest(quizQuestions, 'quiz'); // Initialize with quiz questions
    })
    .catch(error => {
        console.error('Error fetching questions:', error);
    });

const tabs = document.querySelectorAll(".list ");

tabs.forEach(tab => {
    tab.addEventListener('click', function () {
        if (tab.classList.contains('quiz')) {
            currentQuestions = quizQuestions;
            currentTab = 'quiz';
        } else if (tab.classList.contains('aptitude')) {
            currentQuestions = aptitudeQuestions;
            currentTab = 'aptitude';
        } else if (tab.classList.contains('reasoning')) {
            currentQuestions = reasoningQuestions;
            currentTab = 'reasoning';
        }
        initializeTest(currentQuestions, currentTab);
        document.querySelector(".questionContainer").style.display = 'flex';
    })
});

// Initialize the test function
function initializeTest(questions, questionType) {
    // Reset the currentIndex for the specific question type
    switch (questionType) {
        case 'quiz':
            quizIndex = 0;
            break;
        case 'aptitude':
            aptitudeIndex = 0;
            break;
        case 'reasoning':
            reasoningIndex = 0;
            break;
        default:
            break;
    }

    // Initialize the test
    if (questions.length > 0) {
        displayQuestion(questions[0], questionType);

        // Add event listener for the "Next" button
        const nextButton = document.querySelector('.next');
        nextButton.addEventListener('click', onNextButtonClick);
    }
}

// Function to display a question
function displayQuestion(question, questionType) {
    // Replace the following code with your HTML structure for displaying a question
    const questionContainer = document.querySelector('.questionContainer');
    // Set the question number based on the question type
    let currentIndex;
    switch (questionType) {
        case 'quiz':
            currentIndex = quizIndex;
            break;
        case 'aptitude':
            currentIndex = aptitudeIndex;
            break;
        case 'reasoning':
            currentIndex = reasoningIndex;
            break;
        default:
            break;
    }
    questionContainer.querySelector('.questionNumber').textContent = `Q${currentIndex + 1}`;
    questionContainer.querySelector('.question').textContent = question.question_text;

    // Example: Display options (modify as per your HTML structure)
    const optionsContainer = questionContainer.querySelector('.options');
    optionsContainer.innerHTML = '';
    for (const option of ['A', 'B', 'C']) {
        const label = document.createElement('label');
        const input = document.createElement('input');
        input.type = 'radio';
        input.name = `question_${question.question_id}`;
        input.value = option;
        label.appendChild(input);
        label.appendChild(document.createTextNode(question[`option_${option.toLowerCase()}`]));
        optionsContainer.appendChild(label);
    }
}

// Function to handle the "Next" button click
function onNextButtonClick() {
    // Replace with logic to collect the selected answer and question ID
    const selectedOption = document.querySelector('input[name^="question_"]:checked');
    if (selectedOption) {
        const questionId = selectedOption.name.split('_')[1];
        const selectedAnswer = selectedOption.value;

        // Store the answer in the appropriate array based on question type
        switch (currentTab) {
            case 'quiz':
                selectAnswer(questionId, selectedAnswer, 'quiz');
                break;
            case 'aptitude':
                selectAnswer(questionId, selectedAnswer, 'aptitude');
                break;
            case 'reasoning':
                selectAnswer(questionId, selectedAnswer, 'reasoning');
                break;
            default:
                break;
        }

        // Log the selected answer
        console.log(`Question ID: ${questionId}, Selected Answer: ${selectedAnswer}`);
    }

    // Increment the currentIndex for the specific question type
    switch (currentTab) {
        case 'quiz':
            quizIndex++;
            break;
        case 'aptitude':
            aptitudeIndex++;
            break;
        case 'reasoning':
            reasoningIndex++;
            break;
        default:
            break;
    }

    // Check if there are more questions for the current type
    if (currentTab === 'quiz' && quizIndex < quizQuestions.length) {
        displayQuestion(quizQuestions[quizIndex], 'quiz');
    } else if (currentTab === 'aptitude' && aptitudeIndex < aptitudeQuestions.length) {
        displayQuestion(aptitudeQuestions[aptitudeIndex], 'aptitude');
    } else if (currentTab === 'reasoning' && reasoningIndex < reasoningQuestions.length) {
        displayQuestion(reasoningQuestions[reasoningIndex], 'reasoning');
    } else {
        // You have reached the end of the test for the current type, handle accordingly
        console.log(`End of the ${currentTab} test`);
    }
}

// Create answer arrays for each set of questions
const quizAnswers = [];
const aptitudeAnswers = [];
const reasoningAnswers = [];

// Function to store selected answers in the appropriate array
function selectAnswer(questionId, selectedAnswer, questionType) {
    const answer = {
        questionId,
        selectedAnswer
    };

    switch (questionType) {
        case 'quiz':
            quizAnswers.push(answer);
            break;
        case 'aptitude':
            aptitudeAnswers.push(answer);
            break;
        case 'reasoning':
            reasoningAnswers.push(answer);
            break;
        default:
            // Handle invalid question types if needed
            break;
    }
}
