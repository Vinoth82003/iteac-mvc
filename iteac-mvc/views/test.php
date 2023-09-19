<?php

session_start();

if (isset($_SESSION['rollno']) && isset($_SESSION['username'])) {

    $_SESSION['gender'] = 'female';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITEAC - Home </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../views/css/test.css">
    <link rel="stylesheet" href="../views/css/profile.css">
</head>
<body>
    <div class="testpage">
        <div class="main">
        <div class="containerProfile">
         <div class="profileBox">
            <div class="closeBtn">x</div>
            <div class="userDetailsBox">
                <div class="userProfile">
                    <div class="profletter">
                    <?php echo $_SESSION['username'][0]; ?>
                    </div>
                </div>
                <div class="userdetails">
                    <ul class="userlist">
                        <li class="listLi"> <div class="litag">Name</div>  <div class="op litag">- <?php echo  $_SESSION['username'] ;?></div> </li>
                        <li class="listLi"> <div class="litag">Gender</div>  <div class="op litag">- 
                            <!-- <?php echo  $_SESSION['gender'] ;?> --> 
                            <?php
                              if ($_SESSION['gender'] == 'male') {
                                   echo 'Male <i class="fas fa-mars"></i>';
                              }else{
                                echo 'Female <i class="fas fa-venus"></i>';
                              }
                            ?>

                        </div> </li>
                        <li class="listLi"> <div class="litag">Rollno</div><div class="op litag">- <?php echo  $_SESSION['rollno'] ;?></div> </li>
                        <li class="listLi"> <div class="litag">Email</div> <div class="op litag">- <?php echo   $_SESSION['email'] ;$_SESSION['username'] ;?></div> </li>
                    </ul>
                </div>
            </div>
            <div class="attemptetails">
                <div class="atmpttag">Attempts </div><div class="line"></div>
                <ul class="attemptlist">
                    <!-- 1st type -->
                    <li class="attempt">
                        <div class="type">Quiz</div>
                        <ul class="attemptType">
                            <li class="attempdetails">
                              <div class="listhead">Score : </div>
                              <div class="listans"> not attempted</div>  
                            </li>
                            <li class="attempdetails">
                                <div class="listhead">Percentage : </div>
                                <div class="listans"> not attempted</div>  
                            </li>
                            <li class="attempdetails">
                                <div class="listhead">Time Taken : </div>
                                <div class="listans"> not attempted</div>  
                            </li>
                        </ul>
                    </li>
                    <!-- 2nd type -->
                    <li class="attempt">
                        <div class="type">Aptitude</div>
                        <ul class="attemptType">
                            <li class="attempdetails">
                              <div class="listhead">Score : </div>
                              <div class="listans"> not attempted</div>  
                            </li>
                            <li class="attempdetails">
                                <div class="listhead">Percentage : </div>
                                <div class="listans"> not attempted</div>  
                            </li>
                            <li class="attempdetails">
                                <div class="listhead">Time Taken : </div>
                                <div class="listans"> not attempted</div>  
                            </li>
                        </ul>
                    </li>
                    <!-- 3rd type -->
                    <li class="attempt">
                        <div class="type">Reasonning</div>
                        <ul class="attemptType">
                            <li class="attempdetails">
                              <div class="listhead">Score : </div>
                              <div class="listans"> not attempted</div>  
                            </li>
                            <li class="attempdetails">
                                <div class="listhead">Percentage : </div>
                                <div class="listans"> not attempted</div>  
                            </li>
                            <li class="attempdetails">
                                <div class="listhead">Time Taken : </div>
                                <div class="listans"> not attempted</div>  
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
</div>
<nav class="custom-navbar">
                <div class="container">
                    <a class="navbar-logo" href="#">
                        <img src="../views/logos/iteac_logo.png" alt="iteac_logo">
                    </a>
                    <button class="navbar-toggler" type="button" id="navbar-toggler">
                        <span class="navbar-toggler-icon fas fa-bars"></span>
                    </button>
                    <ul class="navbar-menu" id="navbar-menu">
                        <li class="menu-item username">
                            <i class="menu-icon fas fa-user"></i> <!-- Profile icon -->
                            <span class="menu-text"><?php echo $_SESSION['username']; ?></span>
                            <i class="menu-icon fas fa-caret-down"></i>
                            <ul class="dropdownOptions">
                                <li class="dropdownList profilebtn">
                                    <a>
                                        <i class="fas fa-user-circle"></i>
                                        <span>profile</span>
                                    </a>
                                </li>
                                <li class="dropdownList">
                                   <a href="../index.php?action=logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>logout</span>
                                   </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
</nav>
<div class="innermain">
                <div class="sidemenu active">
                    <div class="menuopen">X</div>
                    <ul class="menulists">
                        <li class="list quiz">quiz</li>
                        <li class="list aptitude">aptitude</li>
                        <li class="list reasoning">reasoning</li>
                    </ul>
                </div>
                <div class="questionContainer">
                    <div class="questionNav">
                        <div class="questionNumber">Q1</div>
                        <div class="quiztype">Quiz</div>
                        <div class="timer">Time Left : 8:00 </div>
                    </div>
                    <div class="question">
                        what is the name of our country ?
                    </div>
                    <div class="options">
                        <label class="active"><input name = 'r' type="radio" checked = true> India</label>
                        <label><input name = 'r' type="radio"> Pakisthan</label>
                        <label><input name = 'r' type="radio"> Sri Lanka</label>
                    </div>
                    <div class="btns">
                        <button class="btn next" type="button">Next</button>
                        <button class="btn doubt" type="button">Doubt</button>
                    </div>
                </div>
                <div class="questionNumberContainer">
                    <div class="heading">
                    <div class="explain">
                        <div class="qnex done">1</div> attempted
                    </div>
                    <div class="explain">
                        <div class="qnex doubt">1</div> mark as doubt
                    </div>
                    <div class="explain">
                        <div class="qnex skip">1</div> Skipped questions
                    </div>
                    </div>
                    <div class="qn">1</div>
                    <div class="qn">2</div>
                    <div class="qn">3</div>
                    <div class="qn">4</div>
                    <div class="qn">5</div>
                    <div class="qn">6</div>
                    <div class="qn">7</div>
                    <div class="qn">8</div>
                    <div class="qn">9</div>
                    <div class="qn">10</div>
                </div>
            </div>
</div>
        <div class="topleft"></div>
        <div class="bottomright"></div>
    </div>
    <script src="../views/js/test.js"></script>
    <script src="../views/js/profile.js"></script>
    <script src="../views/js/fetch_question.js"></script>
    
</body>
</html>

<?php }else

header("location:../index.php");

?>