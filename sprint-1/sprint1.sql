create database sprint1;
use sprint1;

create table newMembership(
person_id mediumint unsigned auto_increment primary key,
first_name varchar(40),
last_name varchar(40),
email varchar(50),
phonenumber varchar(25),
gender enum('m','f'),
yearGroup enum("2021", "2022","2023","2024"),
course enum("Business Adminstration","Management Information System","Computer science","Mechanical Engineering","Electrical and Electronic Engineering","Computer Engineering")
);

create table activity(
person_id mediumint unsigned auto_increment primary key,
activityName varchar(40),
activityDate date not null,
description mediumtext,
status enum("register","not register"),
location varchar(14),
image blob
);

