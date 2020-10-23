create database sprint1;
use sprint1;

create table newMembership(
first_name varchar(40),
last_name varchar(40),
gender varchar(60),
email varchar(50),
pssword varchar(60),
confirm_pssword varchar(60),
phonenumber varchar(25),
yearGroup varchar(100),
course varchar(100)
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

