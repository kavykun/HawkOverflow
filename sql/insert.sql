# Author: Kavy Rattana
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE user;
TRUNCATE TABLE tag;
TRUNCATE TABLE question;
TRUNCATE TABLE answer;
TRUNCATE TABLE user_bio;
TRUNCATE TABLE favorite;
TRUNCATE TABLE manage_question;
TRUNCATE TABLE question_tag;
TRUNCATE TABLE user_tag;
TRUNCATE TABLE question_comment;
TRUNCATE TABLE user_question;
TRUNCATE TABLE user_answer;
TRUNCATE TABLE user_label;

# Insert into user
INSERT INTO user (`username`,`pass`,`email`) VALUES
("kr5721","abc123","kr5721@uncw.edu"),
("jea6920","abc123","jea6920@uncw.edu");

# Insert into tag
INSERT INTO tag (`tag_name`,`tag_description`) VALUES
("java","Object Orientated Programming Language"),
("java","Object Orientated Programming Language");

# Insert into question
INSERT INTO question (`question_title`,`question_description`,`asked`,`views`,`up_vote`,`down_vote`,`time_created`,`time_edited`) VALUES
("How do you write a while loop in Java?","I am new to Java and want to know how to do this",1,10,1,3,"2014-11-14 11:01:36","2014-11-14 11:01:36"),
("What is a static variable?","I keep getting a compile error.",1,15,1,1,"2014-12-01 11:01:36","2014-12-03 11:51:36");

# Insert into answer
INSERT INTO answer (`answer`,`up_vote`,`down_vote`,`time`) VALUES
("You should do while()",1,2,"2014-11-14 11:01:36"),
("Pssht. Noob.",1,2,"2014-12-03 12:01:36");

# Insert into user_bio
INSERT INTO user_bio (`user_id`,`username`,`class`,`major`,`bio`) VALUES
("1","kr5721","Senior","Computer Science","My name is Kavy and I am a Computer Science Major"),
("2","jea6920","Senior","Computer Science","My name is Jon and I am a CSC Major");

# Insert into favorite
INSERT INTO favorite (`user_id`,`question_id`) VALUES (1,1),(2,2);

# Insert into manage_question
INSERT INTO manage_question (`question_id`,`answer_id`) VALUES (1,1),(2,2);

# Insert into question_tag
INSERT INTO question_tag (`question_id`,`tag_id`) VALUES (1,1),(2,2);

# Insert into user_tag
INSERT INTO user_tag (`user_id`,`tag_id`) VALUES (1,1),(2,2);

# Insert into question_comment
INSERT INTO question_comment (`comment_id`,`question_id`,`comments`) VALUES
(1,1,"I really like this answer"),(2,2,"Don't have to be rude, man!");

# Insert into user_question
INSERT INTO user_question (`user_id`,`question_id`) VALUES
(1,1),(2,2);

# Insert into user_answer
INSERT INTO user_answer (`user_id`,`answer_id`) VALUES
(1,1),(2,2);

# Insert into user_label
INSERT INTO user_label (`user_id`,`label_id`,`label`) VALUES (1,3,"Admin"),(1,4,"Admin");

SET FOREIGN_KEY_CHECKS = 1;

SELECT question_title from question NATURAL JOIN user_question NATURAL JOIN user where username = $_SESSION['username'];