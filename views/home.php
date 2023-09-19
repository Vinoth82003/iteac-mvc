<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITEAC - Login </title>
    <!-- Alternative Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="views/css/home.css">

</head>
<body>
    <div class="homepage">
        <nav class="custom-navbar">
            <div class="container">
                <a class="navbar-logo" href="#">
                    <img src="views/logos/iteac_logo.png" alt="iteac_logo">
                </a>
                <button class="navbar-toggler" type="button" id="navbar-toggler">
                    <span class="navbar-toggler-icon fas fa-bars"></span>
                </button>
                <ul class="navbar-menu" id="navbar-menu">
                    <li class="menu-item signin-btn active">
                        <a class="menu-link" href="#"><i class="menu-icon fas fa-sign-in-alt"></i> Sign In</a>
                    </li>
                    <li class="menu-item signup-btn">
                        <a class="menu-link" href="#"><i class="menu-icon fas fa-user-plus"></i> Sign Up</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="form_containers">
        <?php
            // Check if an error message is set
            if (isset($errorMessage)) {
                echo '<div class="errorBox">';
                echo '<div class="error">';
                echo '<p class="errormsg">' . $errorMessage . '</p>';
                echo '<div class="closeBtn"><i class="fas fa-times"></i></div>';
                echo '</div>';
                echo '</div>';
            }
            if ($successMessage) {
                echo '<div class="sucessBox">';
                echo '<div class="sucess">';
                echo '<p class="sucessmsg">' . $successMessage . '</p>';
                echo '<div class="closeBtn"><i class="fas fa-times"></i></div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
            <div class="signin-form-box active">
                <form method="post" action="index.php?action=login" class="signin">
                    <div class="form-control">
                        <span class="icon username">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="rollno" id="rollno" placeholder="2021pecitxxx" class="userInput" required/>
                    </div>
                    <div class="form-control">
                        <span class="icon password">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" id="password" placeholder="*******" class="userInput" required/>
                    </div>
                    <!-- <div class="notes">
                        <p class="note">new user ? <u class="signup-btn link">sign up</u></p>
                    </div> -->
                    <button type="submit" class="submit loginbtn"><i class="fas fa-sign-in-alt"></i>
                        Sign in
                    </button>
                </form>
            </div>
            <div class="signup-form-box">
                <form method="post" action="index.php?action=register" class="signin">
                    <div class="form-control">
                        <span class="icon username">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="username" id="username" placeholder="username" class="userInput" required/>
                    </div>
                    <div class="form-control">
                        <span class="icon rollno">
                            <i class="fas fa-id-card"></i>
                        </span>
                        <input type="text" name="rollno" id="rollno" placeholder="2021pecitxxx" class="userInput" required/>
                    </div>
                    <div class="form-control">
                        <span class="icon email">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" id="email" placeholder="example@gmail.com" class="userInput" required/>
                    </div>
                    <div class="form-control">
                        <span class="icon gender">
                            <i class="fas fa-user-circle"></i>
                        </span>
                        <select name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    
                    <div class="form-control">
                        <span class="icon password">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" id="password" placeholder="*******" class="userInput" required/>
                    </div>
                    <!-- <div class="notes">
                        <p class="note">already having account? <u class="signin-btn link">sign in</u></p>
                    </div> -->
                    <button type="submit" class="submit registerbtn"><i class="fas fa-user-plus"></i>
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("navbar-toggler").addEventListener("click", function () {
            var menu = document.getElementById("navbar-menu");
            menu.style.display = menu.style.display === "none" ? "flex" : "none";
        });
    </script>

    <script src="views/js/home.js"></script>
</body>
</html>
