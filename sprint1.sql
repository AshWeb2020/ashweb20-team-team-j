create database GJ2022;
use GJ2022;

create table membership(
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
activity_id mediumint unsigned auto_increment primary key,
activityName varchar(40),
activityDate date not null,
description mediumtext,
status enum("register","not register"),
location varchar(14),
image blob
);
create table member_activity(
activity_id mediumint unsigned,
foreign key(activity_id) REFERENCES activity (activity_id),
member_id mediumint unsigned,
foreign key(member_id) references art (member_id)
);


