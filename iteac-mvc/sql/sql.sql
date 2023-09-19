-- Create a "users" table to store user information
CREATE TABLE IF NOT EXISTS users (
    rollno VARCHAR(255) PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- question table 
-- Table for Quiz Questions
CREATE TABLE quiz_questions (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    question_text TEXT NOT NULL,
    option_a TEXT NOT NULL,
    option_b TEXT NOT NULL,
    option_c TEXT NOT NULL,
    correct_option CHAR(1) NOT NULL
);

-- Table for Aptitude Questions
CREATE TABLE aptitude_questions (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    question_text TEXT NOT NULL,
    option_a TEXT NOT NULL,
    option_b TEXT NOT NULL,
    option_c TEXT NOT NULL,
    correct_option CHAR(1) NOT NULL
);

-- Table for Reasoning Questions
CREATE TABLE reasoning_questions (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    question_text TEXT NOT NULL,
    option_a TEXT NOT NULL,
    option_b TEXT NOT NULL,
    option_c TEXT NOT NULL,
    correct_option CHAR(1) NOT NULL
);

-- sample questions for test -- 
-- Insert 10 Quiz Questions related to IT department
INSERT INTO quiz_questions (question_text, option_a, option_b, option_c, correct_option)
VALUES
    ('What is SQL?', 'Structured Query Language', 'Simple Query Language', 'Sequential Query Language', 'A'),
    ('What does HTML stand for?', 'Hyper Text Markup Language', 'Highly Text Markup Language', 'Hyperlink and Text Markup Language', 'A'),
    ('What is the primary function of an operating system?', 'To manage hardware resources', 'To run applications', 'To create websites', 'A'),
    ('Which programming language is often used for web development?', 'Java', 'Python', 'JavaScript', 'C'),
    ('What is the full form of CPU?', 'Central Processing Unit', 'Computer Personal Unit', 'Central Process Unit', 'A'),
    ('Which of the following is a popular version control system?', 'Subversion (SVN)', 'Java Virtual Machine (JVM)', 'Random Access Memory (RAM)', 'A'),
    ('What is the binary equivalent of the decimal number 10?', '1010', '1101', '1110', 'A'),
    ('Which technology is used for wireless communication in most smartphones?', 'Bluetooth', 'NFC', 'Wi-Fi', 'C'),
    ('What does "IT" stand for?', 'Information Technology', 'Internet Technology', 'Innovative Technology', 'A'),
    ('What is the purpose of a firewall in network security?', 'To protect against unauthorized access', 'To boost network speed', 'To install software updates', 'A');

-- Insert 10 Aptitude Questions related to IT department
INSERT INTO aptitude_questions (question_text, option_a, option_b, option_c, correct_option)
VALUES
    ('If a computer on the network shares resources for others to use, it is called?', 'Server', 'Client', 'Mainframe', 'A'),
    ('What is 15% of 120?', '18', '15', '20', 'A'),
    ('If it takes 6 hours for 5 workers to complete a project, how many hours will it take for 8 workers to complete the same project?', '3.75', '3', '4.8', 'B'),
    ('A train travels 120 miles in 2 hours. What is its speed in miles per hour?', '60', '30', '40', 'A'),
    ('If the price of a book is $15, and you have a 10% discount coupon, how much will you pay?', '$13.50', '$14', '$16.50', 'A'),
    ('If the pattern is 5, 10, 15, 20, what is the next number in the sequence?', '25', '30', '35', 'B'),
    ('What is the least common multiple (LCM) of 6 and 8?', '12', '24', '48', 'B'),
    ('If x + 3 = 8, what is the value of x?', '5', '11', '3', 'A'),
    ('How many degrees are there in a right angle?', '90', '45', '180', 'A'),
    ('If you flip a fair coin twice, what is the probability of getting heads both times?', '0.25', '0.5', '0.75', 'A');

-- Insert 10 Reasoning Questions related to IT department
INSERT INTO reasoning_questions (question_text, option_a, option_b, option_c, correct_option)
VALUES
    ('If "APPLE" is coded as "XQQAE," how is "ORANGE" coded?', 'ZLARIM', 'TLARIM', 'TLXATL', 'B'),
    ('Arrange the following words in alphabetical order: Apple, Banana, Cherry, Grape', 'Apple, Banana, Cherry, Grape', 'Banana, Apple, Cherry, Grape', 'Cherry, Apple, Banana, Grape', 'B'),
    ('If all roses are flowers and some flowers fade quickly, can we conclude that some roses fade quickly?', 'Yes', 'No', 'Not enough information', 'B'),
    ('If every student in the class has a laptop, and Sarah is a student in the class, can we conclude that Sarah has a laptop?', 'Yes', 'No', 'Not enough information', 'A'),
    ('If A is taller than B, and B is taller than C, can we conclude that A is taller than C?', 'Yes', 'No', 'Not enough information', 'A'),
    ('Which number comes next in the sequence: 2, 4, 8, 16, ?', '32', '24', '64', 'A'),
    ('If the day after tomorrow is two days before Thursday, what day is it today?', 'Monday', 'Tuesday', 'Wednesday', 'C'),
    ('How many triangles are in the following figure?', '4', '5', '6', 'A'),
    ('If all cats have tails, and Mittens is a cat, can we conclude that Mittens has a tail?', 'Yes', 'No', 'Not enough information', 'A'),
    ('If 5 + 3 = 28, 9 + 1 = 810, and 8 + 6 = 214, what is 7 + 5?', '712', '611', '912', 'A');

--answers table 
-- Table for storing Quiz answers
CREATE TABLE quiz_answers (
    answer_id INT AUTO_INCREMENT PRIMARY KEY,
    rollno VARCHAR(20) NOT NULL,
    question_id INT NOT NULL,
    option_selected CHAR(1) NOT NULL
);

-- Table for storing Aptitude answers
CREATE TABLE aptitude_answers (
    answer_id INT AUTO_INCREMENT PRIMARY KEY,
    rollno VARCHAR(20) NOT NULL,
    question_id INT NOT NULL,
    option_selected CHAR(1) NOT NULL
);

-- Table for storing Reasoning answers
CREATE TABLE reasoning_answers (
    answer_id INT AUTO_INCREMENT PRIMARY KEY,
    rollno VARCHAR(20) NOT NULL,
    question_id INT NOT NULL,
    option_selected CHAR(1) NOT NULL
);
