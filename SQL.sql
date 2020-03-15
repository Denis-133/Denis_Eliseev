CREATE DATABASE media;
USE media;
CREATE TABLE word
(
id int AUTO_INCREMENT,
text_id int null,
word text null,
count int null,
CONSTRAINT media_pk
PRIMARY KEY (id),
FOREIGN KEY (text_id) REFERENCES uploaded_text(id)
) ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;


CREATE TABLE uploaded_text
(
id int AUTO_INCREMENT,
content text null,
date date null,
words_count int null,
CONSTRAINT media_pk
PRIMARY KEY (id),
) ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;