# Author: Kavy Rattana
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS tag;
DROP TABLE IF EXISTS question;
DROP TABLE IF EXISTS answer;
DROP TABLE IF EXISTS user_bio;
DROP TABLE IF EXISTS favorite;
DROP TABLE IF EXISTS manage_question;
DROP TABLE IF EXISTS question_tag;
DROP TABLE IF EXISTS user_tag;
DROP TABLE IF EXISTS question_comment;
DROP TABLE IF EXISTS question_answer;
DROP TABLE IF EXISTS user_question;
DROP TABLE IF EXISTS user_answer;
DROP TABLE IF EXISTS user_label;

CREATE TABLE user (
user_id INT (10)  ZEROFILL NOT NULL AUTO_INCREMENT,
username VARCHAR (25) NOT NULL,
pass VARCHAR (40),
email VARCHAR (25),
major VARCHAR (30),
date_joined DATE,
concentration VARCHAR (40),
dob VARCHAR (30),
best_languages VARCHAR (70),
gender VARCHAR (10),
bio VARCHAR (300),
img VARCHAR (50),
PRIMARY KEY (user_id)
) ENGINE=InnoDB;

CREATE TABLE tag (
tag_id INT (10) ZEROFILL NOT NULL AUTO_INCREMENT,
tag_name INT (10),
tag_description TEXT,
PRIMARY KEY (tag_id)
) ENGINE=InnoDB;

CREATE TABLE tag (
tag_id INT (10) ZEROFILL NOT NULL AUTO_INCREMENT,
tag_name INT (10),
tag_description TEXT,
PRIMARY KEY (tag_id)
) ENGINE=InnoDB;


CREATE TABLE question (
question_id INT (10) ZEROFILL NOT NULL AUTO_INCREMENT,
question_title VARCHAR (100) NOT NULL,
question_description TEXT,
asked INT (10),
views INT (100),
up_vote INT (100),
down_vote INT (100),
time_created DATETIME,
time_edited DATETIME,
PRIMARY KEY (question_id)
) ENGINE=InnoDB;

CREATE TABLE answer (
answer_id INT (10) ZEROFILL NOT NULL AUTO_INCREMENT,
answer TEXT NOT NULL,
up_vote INT (100),
down_vote INT (100),
time DATETIME,
PRIMARY KEY (answer_id)
) ENGINE=InnoDB;

CREATE TABLE user_bio (
user_id INT (10) ZEROFILL NOT NULL,
username VARCHAR (25) NOT NULL,
class VARCHAR (25),
major VARCHAR (25),
bio TEXT,
FOREIGN KEY (user_id) REFERENCES user(user_id)
) ENGINE=InnoDB;

CREATE TABLE favorite (
user_id INT (10) ZEROFILL NOT NULL,
question_id INT (10) ZEROFILL NOT NULL,
FOREIGN KEY (user_id) REFERENCES user(user_id),
FOREIGN KEY (question_id) REFERENCES question(question_id)
) ENGINE=InnoDB;

CREATE TABLE manage_question (
question_id INT (10) ZEROFILL NOT NULL,
answer_id INT (10) ZEROFILL NOT NULL,
FOREIGN KEY (question_id) REFERENCES question(question_id)
) ENGINE=InnoDB;

CREATE TABLE question_tag(
question_id INT (10) ZEROFILL NOT NULL,
tag_id INT (10) ZEROFILL NOT NULL,
FOREIGN KEY (question_id) REFERENCES question(question_id),
FOREIGN KEY (tag_id) REFERENCES tag(tag_id)
) ENGINE=InnoDB;

CREATE TABLE question_answer(
question_id INT (10) ZEROFILL NOT NULL,
answer_id INT (10) ZEROFILL NOT NULL,
FOREIGN KEY (question_id) REFERENCES question(question_id),
FOREIGN KEY (answer_id) REFERENCES answer(answer_id)
) ENGINE=InnoDB;

CREATE TABLE user_tag (
user_id INT (10) ZEROFILL NOT NULL,
tag_id INT (10) ZEROFILL NOT NULL,
FOREIGN KEY (user_id) REFERENCES user(user_id),
FOREIGN KEY (tag_id) REFERENCES tag(tag_id)
) ENGINE=InnoDB;

CREATE TABLE question_comment (
comment_id INT (10) ZEROFILL NOT NULL,
question_id INT (10) ZEROFILL NOT NULL,
comments TEXT,
PRIMARY KEY (comment_id),
FOREIGN KEY (question_id) REFERENCES question(question_id)
) ENGINE=InnoDB;

CREATE TABLE user_question (
user_id INT (10) ZEROFILL NOT NULL,
question_id INT (10) ZEROFILL NOT NULL
) ENGINE=InnoDB;

CREATE TABLE user_question (
user_id INT (10) ZEROFILL NOT NULL,
img_id INT (10) ZEROFILL NOT NULL
) ENGINE=InnoDB;

CREATE TABLE user_answer (
user_id INT (10) ZEROFILL NOT NULL,
answer_id INT (10) ZEROFILL NOT NULL
) ENGINE=InnoDB;

CREATE TABLE user_label (
user_id INT (10) ZEROFILL NOT NULL,
label_id INT (1) NOT NULL,
label VARCHAR (10),
FOREIGN KEY (user_id) REFERENCES user(user_id)
) ENGINE=InnoDB;

SET FOREIGN_KEY_CHECKS = 1;
