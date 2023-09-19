<?php
session_start();
include '../conn.php';

$username = $_SESSION['user_name'];
// $rollno = $_SESSION['user_rollno'];


function checkDone($conn,$rollno){

    $RegisterQuery = "SELECT `accept` FROM `register` WHERE `rollno` = '$rollno' ";
    $result = mysqli_query($conn, $RegisterQuery);
  
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
  
      $_SESSION['accept'] = $row['accept'];
  
    }else {
      $_SESSION['accept'] = 'not done';
    }


    $apptituteQuery = "SELECT * FROM `apptitute` WHERE `rollno` = '$rollno' ";
    $result = mysqli_query($conn, $apptituteQuery);
  
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
  
      $_SESSION['apptitute'] = $row['finished'];

      $_SESSION['apptitute_percentage'] = $row['percentage'] .'%';
      $_SESSION['apptitute_score'] = $row['score'];
  
    }else {
      $_SESSION['apptitute'] = 'not done';

      $_SESSION['apptitute_percentage'] = 'Not Attempted';
      $_SESSION['apptitute_score'] = 'Not Attempted';
    }
  
    
    $quizQuery = "SELECT * FROM `quiz` WHERE `rollno` = '$rollno' ";
    $result = mysqli_query($conn, $quizQuery);
  
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
  
      $_SESSION['quiz'] = $row['finished'];
      $_SESSION['quiz_percentage'] = $row['percentage'].'%';
      $_SESSION['quiz_score'] = $row['score'];
  
    }else {
      $_SESSION['quiz'] = 'not done';
      $_SESSION['quiz_percentage'] = 'Not Attempted' ;
      $_SESSION['quiz_score'] =  'Not Attempted'; 
    }
  
    
    $reasoningQuery = "SELECT * FROM `reasoning` WHERE `rollno` = '$rollno' ";
    $result = mysqli_query($conn, $reasoningQuery);
  
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
  
      $_SESSION['reasoning'] = $row['finished'];
      $_SESSION['reasoning_percentage'] = $row['percentage'].'%';
      $_SESSION['reasoning_score'] = $row['score'];
  
    }else {
      $_SESSION['reasoning'] = 'not done';
      $_SESSION['reasoning_percentage'] = 'Not Attempted' ;
      $_SESSION['reasoning_score'] = 'Not Attempted' ;
    }
  
  
}

checkDone($conn,$_SESSION['user_rollno']);



if (isset($_SESSION['user_id']) && isset($_SESSION['user_rollno'])) {    

?>

<?php


if (isset($_SESSION['accept']) && $_SESSION['accept'] == 'done') {


?>

<!DOCTYPE html>
<html>
<head>
    <title>Question Tabs</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    <!-- Include Bootstrap Icons CSS (Optional) -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css"> -->

    <!-- custom css -->
    <link rel="stylesheet" href="percentage.css">
<style>
.question-number {
 width: 40px;
 height: 40px;
 text-align: center;
 line-height: 40px;
 font-weight: bold;
 margin: 5px;
 border-radius: 10px;
 display: inline-block;
 cursor: pointer;
 box-shadow: 4px 11px 9px 0px #000;
}
.red-bg {
  background-color: red;
  color: white;
}

.green-bg {
    background-color: green;
    color: white;
    box-shadow: inset 4px 8px 13px 0px rgb(51 51 51);
}

.violet-bg {
    background-color: violet;
    box-shadow: inset 4px 4px 13px 0px rgb(51 51 51);
}

        /* Adjust styles as needed */

.username {
    position: relative;
    top: 0;
    right: 0;
}

.logout {
    position: absolute;
    height: 20px;
    margin-top: -5px;
    display: none;
    padding: 10px;
}

.username:hover .logout {
    display: inline-block;
}

.btn-group, .btn-group-vertical {
    position: relative;
    display: -ms-inline-flexbox;
    display: inline-flex;
    display: flex;
    gap: 10px;
    vertical-align: middle;
}

#questionNumbersContainer {
    position: fixed;
    right: 10px;
    top: 185px;
    display: flex;
    flex-wrap: wrap;
    width: 250px;
    /* height: 100vh; */
    align-items: center;
    justify-content: center;
    gap: 10px;
}

#tableContainer {
    width: 70%;
    height: 435px;
    /* background: #eeee; */
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
}

.questionNumber {
    position: absolute;
    left: 10px;
    top: 10px;
}

.question {
    position: absolute;
    width: 90%;
    top: 60px;
    left: 5%;
    padding: 10px 30px;
    border-radius: 5px;
    background: #018;
    color: #fff;
}

.option {
    position: relative;
    width: 240px;
    height: 101px;
    background: aquamarine;
    margin-top: 110px;
    border-radius: 10px;
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 100;
    transition: all .5s;
    padding: 10px;
}

.option.active {
    /* background: #91e991; */
    color: #ffffff;
    background: linear-gradient(45deg, #3b9f4c, #003180);
    font-weight: 600;
}

input[type="radio"]{
    width: 0px;
    height: 0px;
    /* transition:.5s; */
}

input[type="radio"]:checked {
    position: absolute;
    margin-top: -100px;
    width: 30px;
    height: 30px;
    accent-color: red;
}

.nxtMkBtns{
    position: fixed;
    bottom: 20px;
    left: 20px;
}

button.tab-btn{
    margin-left: 15px;
}

.logoImg{
   width: 70px;
   height: 70px;
}

.timer{
    height: 100px;
    width: 100px;
    background-image: url("img/timer.png");
    background-size: 80%;
    background-repeat: no-repeat;
    background-position: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    /* background: #000; */
}

#timerValue{
    margin-top: 15px;
    padding: 5px;
    border-radius: 2px;
    backdrop-filter: blur(5px);
}

.navbar-expand-lg {
  width: 100vw;
}
</style>
</head>
<body>
<div class="testPage">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="../logo.jpeg" alt="iteac logo" class="logoImg"></a>
        
        <div class="timer mt-1"><span class="mins" id="timerValue"></span></div>
        <div class="right username dropdown">
            <!-- Username with a dropdown -->
            <a class="btn btn-link dropdown-toggle" style="text-decoration: none; color: #000;" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> <?php echo "$username " ;?> <!-- Use Font Awesome 'fas' class for solid icons -->
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <!-- Profile link with an icon -->
                <button class="btn btn-link" id="openProfileModal" style="text-decoration: none; color:#000;">
                    <i class="fas fa-user-circle"></i> Profile
                </button>
                <!-- Logout link with an icon -->
                <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-4 threebtns" >
        <div class="btn-group">
            <?php

            if (isset($_SESSION['apptitute']) && $_SESSION['apptitute'] == 'done') { 
               echo ' <button class="btn btn-primary tab-btn tabs apptitute" id="apptitute" disabled>Apptitute</button> ';
            } else{
                echo ' <button class="btn btn-primary tab-btn tabs apptitute" id="apptitute">Apptitute</button> ';
            }

            if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == 'done') {
                echo '<button class="btn btn-primary tab-btn tabs quiz" id="quiz" disabled>Quiz</button>';
            }else{
                echo '<button class="btn btn-primary tab-btn tabs quiz" id="quiz">Quiz</button>';
            }

            if (isset($_SESSION['reasoning']) && $_SESSION['reasoning'] == 'done') {
                echo '<button class="btn btn-primary tab-btn tabs reasoning" id="reasoning" disabled>Reasoning</button>';
            }else{
                echo '<button class="btn btn-primary tab-btn tabs reasoning" id="reasoning">Reasoning</button>';
            }
            ?>
            

            
        </div>
        
    </div>

    <div class="container mt-4">
        <div class="tab-content" id="tableContainer">
            <!-- Content for the tabs will be loaded here -->
            <?php
            
            if (isset($_SESSION['apptitute']) && $_SESSION['apptitute']== 'done') {
                if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == 'done') {
                    if (isset($_SESSION['reasoning']) && $_SESSION['reasoning'] == 'done'){
                        echo '<script>
                        window.location.href="profile/";
                              </script> ';
                    }
                }
                

            }
            
            ?>
        </div>
        <div id="questionContainer"></div>
        <div id="questionNumbersContainer" class="mt-3">
            <!-- Question numbers will be displayed here -->
        </div>
        <div class="container mt-3 nxtMkBtns" >
        <button id="nextBtn" class="btn btn-primary" style="display: none;">Next</button>
        <button id="markDoubtBtn" class="btn btn-danger" style="display: none;">Mark as Doubt</button>
    </div>
    </div>
</div>
<!-- percentage div -->

<div class="percentageContainer" style="display: none;">
    <div class="percentBox">
        <div class="innerBox">
            <div class="curcularBox">
                <div class="circle">
                    <div class="innercircle">
                        <div class="percentage">0</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="innerBox">
            <ul class="details">
                <li class="Mlist">Name : <?php echo $_SESSION['user_name']; ?> </li>
                <li class="Mlist">Roll No : <?php echo $_SESSION['user_rollno']; ?> </li>
                <li class="Mlist">Test Type : <span class="testType"></span></li>
                <li class="Mlist">Score : <span class="score"></span> </li>
                <li class="Mlist">Percentage : <span class="disPercent"></span> </li>
            </ul>
        </div>
    </div>
</div>

<!-- profile model -->
<!-- User Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add user profile information here -->
                <p><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
                <p><strong>Roll Number:</strong> <?php echo $_SESSION['user_rollno']; ?></p>
                <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
                <p><strong>Apptitute Test Percentage:</strong> <?php echo $_SESSION['apptitute_percentage']; ?></p>
                <p><strong>Apptitute Test Score:</strong> <?php echo $_SESSION['apptitute_score']; ?></p>
                <p><strong>Quiz Test Percentage:</strong> <?php echo $_SESSION['quiz_percentage']; ?></p>
                <p><strong>Quiz Test Score:</strong> <?php echo $_SESSION['quiz_score']; ?></p>
                <p><strong>Reasoning Test Percentage:</strong> <?php echo $_SESSION['reasoning_percentage']; ?></p>
                <p><strong>Reasoning Test Score:</strong> <?php echo $_SESSION['reasoning_score']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- <script src="percentage.js"></script> -->


<!-- close -->
    <!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include XLSX library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<!-- Include your custom JavaScript file -->
<script src="script.js"></script>
<script>
$(document).ready(function() {
    // Open the profile modal when the "Profile" button is clicked
    $('#openProfileModal').click(function() {
        $('#profileModal').modal('show');
    });
});
</script>

</body>
</html>


<?php
}else {
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions</title>
    <link rel="stylesheet" href="TCstyle.css">
</head>
<body>
    <div class="termsPage">
        <div class="timeLineBox">
            <div class="indicationBox">
                <div index="0" class="dot active"></div>
                <div index="1" class="line"></div>
                <div index="1" class="dot"></div>
                <div index="2" class="line"></div>
                <div index="2" class="dot"></div>
            </div>
        </div>
        <div class="termsBox">
            <div class="termsContainer">
                <div index="0" class="module" style="display: flex;">
                    <div class="modHead">
                        <h2>Welcome 
                            <span><?php echo $_SESSION['user_name']?></span>
                        </h2>
                    </div> 
                    <div class="modDiscription">
                        <p class="discp">
                           &nbsp; &nbsp; &nbsp; Welcome to the ITEAC Club's Online Quiz Competition, <strong><?php echo $_SESSION['user_name']?> </strong> <br><br>

We are delighted to have you join us for this exciting practice session. This quiz has been organized by the <strong>Information Technology Department of Panimalar Engineering College in Chennai</strong>, and it's a fantastic opportunity for you to test your knowledge and skills.
<br><br>
Get ready to challenge yourself, learn, and have fun! We hope you enjoy the experience and find this practice quiz valuable as you prepare for upcoming assessments.
<br><br>
Best of luck, and let the quiz begin! 📚🧠🚀
                        </p>
                    </div>
                </div>
                <div index="1" class="module" style="display: none;">
                    <div class="modHead">
                        <h2>Rules & Regulations</h2>
                    </div>
                    <div class="modDiscription">
                        <p class="discp">
                            <ul class="rules">
                                <li class="list">1. Register within the specified deadline, follow eligibility criteria, and provide valid identification.</li>
                                <li class="list">2. Adhere to punctuality, respect the quizmaster's decisions, and stick to time limits.</li>
                                <li class="list">3. Answer questions clearly and promptly without the use of electronic devices or reference materials.</li>
                                <li class="list">4. Earn points for correct answers, with possible deductions for incorrect ones; tie-breakers apply if needed.</li>
                                <li class="list">5. Maintain respectful behavior, avoid cheating or plagiarism, and adhere to a code of conduct.</li>
                                <li class="list">6. Disqualification may occur for rule violations; an appeals process may be available, and rule changes are at the organizing committee's discretion.</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div index="2" class="module" style="display: none;">
                    <div class="modHead">
                        <h2>Time </h2>
                    </div>
                    <div class="modDiscription">
                        <p class="discp">
                        1. <strong>Time Limit for Each Question:</strong> Participants must answer each question within a designated time limit, which will be announced or displayed for each question.
<br><br>
2. <strong>No Overtime:</strong> There will be no overtime for answering questions. If a participant doesn't provide an answer within the specified time, their response will not be considered.
<br><br>
3. <strong>Timing Accuracy:</strong> The timing for each question will be strictly enforced, and the quizmaster's decision on when time is up is final.
<br><br>
4. <strong>Countdown Warnings:</strong> Participants may receive countdown warnings (e.g., "5 seconds remaining") to help manage their time effectively.
<br><br>
5. <strong>Submission Time:</strong> Participants should ensure they submit their answers within the overall 30-minute timeframe. Late submissions may not be accepted.
<br><br>
6. <strong>Adherence to Schedule:</strong> Participants are expected to follow the quiz schedule provided, including breaks or transitions between sections, to maintain the overall timing of the event.
                        </p>
                    </div>
                </div>
            </div>
            <div class="btns">
                <button class="tcnext" type="button">next</button>
            </div>
        </div>
    </div>
    <script src="TCscript.js"></script>
</body>
</html>
<?php
}

?>

<?php

}else{
    header("location:../");
}


?>