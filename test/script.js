
// Add these lines at the top of your script.js file
let timerInterval;
let timerValue = 600; // 10 minutes in seconds
let reloadingEnabled = true; // Initially, reloading is enabled
const rollno = sessionStorage.getItem('rollno');

function startTimer() {
    // Disable reloading option
    reloadingEnabled = false;
    
    timerInterval = setInterval(updateTimer, 1000);
}

function updateTimer() {
    const timerElement = document.getElementById('timerValue');
    
    const minutes = Math.floor(timerValue / 60);
    const seconds = timerValue % 60;
    
    const formattedTime = `${String(minutes).padStart(2, '0')} : ${String(seconds).padStart(2, '0')}`;
    timerElement.innerHTML = formattedTime;

    if (timerValue <= 0) {
        clearInterval(timerInterval);
        var reloaded = false;

        sendDataToPHP(answers, rollno,reloaded);
        console.log('Time is up!');
        // Re-enable reloading option
        reloadingEnabled = true;
    } else {
        timerValue--;
    }
}

window.addEventListener('beforeunload', function (e) {
    
if (timerValue >= 0) {
    if (!reloadingEnabled) {

        var reloaded = true;

        sendDataToPHP(answers, rollno,reloaded);
        // Cancel the event to prevent the page from reloading
        e.preventDefault();
        // Prompt a confirmation message if you want
        e.returnValue = 'You are about to leave this page. Are you sure?';
    }
}
});
// You can add an event listener to handle page reloading

// Event listener for when the page loses focus (user switches tabs)
window.addEventListener('blur', function () {
    // Change the title when the page loses focus (optional)
    document.title = 'Exam in Progress - Your Answers May Be Lost';

    // Delay the submission and alert by 3 seconds
    setTimeout(submitAnswersAndShowAlert, 3000);
});

function submitAnswersAndShowAlert() {
    if (timerValue >= 0) {
        if (!reloadingEnabled) {
            var reloaded = true;
            sendDataToPHP(answers, rollno, reloaded);
            // Display an alert message when answers are submitted
            alert('Answers submitted. You may leave this page.');
        }
    }
}


// const percentage = 85.00;
function percentageCalculate(testscore){
    document.querySelector('.percentageContainer').style.display = 'flex';
    document.querySelector('.testPage').style.display = 'none';
    var score = testscore;
    const percentagevalue = document.querySelector('.percentage');
    const circle = document.querySelector('.circle');
    var index = 0;
    
    
    // setPercentage();
    
    let interval = setInterval(() => {
     if (index >= score){
            index = 0;
            clearInterval(interval);
     }else{
        index = index + 1;
        console.log(index * 3.6);
        var percentage = (index/20)*100;
        percentagevalue.innerHTML = percentage.toFixed(2);
        circle.style.backgroundImage = `conic-gradient(blue 0deg , #d8d8d8ee ${percentage * 4.5}deg )`;
     }
    }, 100);
}

let sheetData;
let currentRowIndex = 1;
let answers = {};

console.log(rollno);
function createQuestion(data, rowIndex) {
    const tableContainer = document.getElementById('tableContainer');
    tableContainer.innerHTML = ''; // Clear previous table

    const questionContainer = document.createElement('div');

    const questionNumber = document.createElement('p');
    questionNumber.classList.add('questionNumber');
    questionNumber.textContent = `Question ${rowIndex}:`;
    questionContainer.appendChild(questionNumber);

    const question = document.createElement('p');
    question.classList.add('question');
    question.textContent = data[rowIndex][0];
    questionContainer.appendChild(question);

    const options = ['A', 'B', 'C'];
    for (let i = 0; i < options.length; i++) {
        const label = document.createElement('label');
        label.classList.add('option')
        label.setAttribute("style","margin-left:20px;")
        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.name = 'option';
        radio.value = options[i];
        label.appendChild(radio);
        label.append(' ' + data[rowIndex][i + 1]);
        
        questionContainer.appendChild(label);
    }

    tableContainer.appendChild(questionContainer);
}

function fetchAndProcessExcelData(file) {
    fetch(file)
        .then(response => response.blob())
        .then(blob => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: 'array' });
                const sheetName = workbook.SheetNames[0];
                const worksheet = workbook.Sheets[sheetName];
                sheetData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

                createQuestion(sheetData, currentRowIndex);

                // document.getElementById('startBtn').style.display = 'none';
                const allButtons = document.querySelectorAll('.tabs');
                allButtons.forEach(button => {
                    button.disabled = true;
                });
                document.getElementById('nextBtn').style.display = 'inline-block';
                document.getElementById('markDoubtBtn').style.display = 'inline-block';
                createQuestionNumbers();
            };
            reader.readAsArrayBuffer(blob);
        })
        .catch(error => console.error('Error:', error));
}

document.getElementById('apptitute').addEventListener('click', function () {
    fetchAndProcessExcelData('excel/apptitute.xlsx');
    this.disabled = true;
    sessionStorage.setItem('quizType','apptitute');
    startTimer();
});

document.getElementById('quiz').addEventListener('click', function () {
    fetchAndProcessExcelData('excel/quiz.xlsx');
    this.disabled = true;
    sessionStorage.setItem('quizType','quiz');
    startTimer();
});

document.getElementById('reasoning').addEventListener('click', function () {
    fetchAndProcessExcelData('excel/reasoning.xlsx');
    this.disabled = true;
    sessionStorage.setItem('quizType','reasoning');
    startTimer();
});

document.getElementById('nextBtn').addEventListener('click', function () {
    document.getElementById('nextBtn').innerHTML = 'Next';
    const selectedOption = document.querySelector('input[name="option"]:checked');
    if (selectedOption) {
        const answer = selectedOption.value;
        answers[currentRowIndex] = answer;
        handleQuestionStatus(currentRowIndex, 'answered'); // Update the status to 'answered'
    } else {
        handleQuestionStatus(currentRowIndex, 'unanswered'); // Update the status to 'unanswered'
    }

    currentRowIndex++;
    if (currentRowIndex >= sheetData.length -1) {
        document.getElementById('nextBtn').innerHTML = 'Submit';
    }
    if (currentRowIndex >= sheetData.length) {


        // All questions answered
        console.log(answers);
        sendDataToPHP(answers,rollno);

        document.getElementById('markDoubtBtn').style.display = 'none';
        alert('All questions answered. Answers submitted!');
    } else {
        createQuestion(sheetData, currentRowIndex);
    }
});

document.getElementById('markDoubtBtn').addEventListener('click', function () {
    const selectedOption = document.querySelector('input[name="option"]:checked');
    if (selectedOption) {
        const answer = selectedOption.value;
        answers[currentRowIndex] = answer;
        handleQuestionStatus(currentRowIndex, 'doubt'); // Update the status to 'doubt'
    }
});

function createQuestionNumbers() {
    const questionNumbersContainer = document.getElementById('questionNumbersContainer');
    questionNumbersContainer.innerHTML = ''; // Clear previous question numbers

    for (let i = 1; i <= sheetData.length - 1; i++) {
        const questionNumber = document.createElement('div');
        questionNumber.setAttribute('qnumber', `${i}`);
        questionNumber.classList.add('question-number', 'red-bg');
        questionNumber.textContent = i;

        questionNumber.addEventListener('click', function () {
            const clickedQNumber = parseInt(this.getAttribute('qnumber'));
            currentRowIndex = clickedQNumber;
            createQuestion(sheetData, currentRowIndex);
        });

        questionNumbersContainer.appendChild(questionNumber);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    createQuestionNumbers();
});


function handleQuestionStatus(rowIndex, status, selectedAnswer) {
    const questionNumbers = document.querySelectorAll('.question-number');

    if (status === 'answered') {
        questionNumbers[rowIndex - 1].classList.remove('red-bg');
        questionNumbers[rowIndex - 1].classList.add('green-bg');
        // Store the selected answer in sessionStorage
        sessionStorage.setItem(`answer_${rowIndex}`, selectedAnswer);
    } else if (status === 'doubt') {
        questionNumbers[rowIndex - 1].classList.remove('red-bg', 'green-bg');
        questionNumbers[rowIndex - 1].classList.add('violet-bg');
    } else {
        questionNumbers[rowIndex - 1].classList.remove('green-bg', 'violet-bg');
        questionNumbers[rowIndex - 1].classList.add('red-bg');
    }
}


function sendDataToPHP(answers, rollno, reloaded) {
    reloadingEnabled = true;
    timerValue = 1800;
    // Set the value of answers.reloaded based on the condition of reloaded
    answers.reloaded = reloaded ? 'done' : 'not done';
    answers.timetaken = document.getElementById('timerValue').innerHTML;

    // Add the email and question number to the answers object
    answers.rollno = rollno;
    answers.quizType = sessionStorage.getItem('quizType');
    
    // Calculate correct answers, score, and percentage
    let correctAnswers = 0;
    for (let i = 1; i <= sheetData.length - 1; i++) {
        if (answers[i] === sheetData[i][4]) { // Assuming correct answer is in the 5th column (index 4)
            correctAnswers++;
        }
    }
    
    const totalQuestions = sheetData.length - 1; // Total questions excluding the header
    const score = correctAnswers;
    const percentage = (correctAnswers / totalQuestions) * 100;

    // Add score and percentage to the answers object
    answers.score = score;
    answers.percentage = percentage.toFixed(2); // Convert to a fixed decimal point

    // Rest of your code remains unchanged
    fetch('submit_answers.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(answers)
    })
    .then(response => response.text())
    .then(data => {
        // Handle the response from PHP
        console.log(data); // Log the response from PHP
        try {
            const responseData = JSON.parse(data); // Parse the response as JSON
            if (responseData.success) {
                // Handle success as needed
                percentageCalculate(score);
                document.querySelector('.testType').innerHTML = sessionStorage.getItem('quizType');
                document.querySelector('.score').innerHTML = score;
                document.querySelector('.disPercent').innerHTML = percentage.toFixed(2);
                let time = setTimeout(() => {
                    location.reload();
                    clearTimeout(time,0);
                }, 10000);
            } else {
                console.log('Failed to store data in the database.');
                console.log('Error message:', responseData.message);
            }
        } catch (error) {
            console.error('Error parsing response:', error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
