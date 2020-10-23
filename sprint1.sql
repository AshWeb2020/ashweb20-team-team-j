create database GJ2022;
use GJ2022;

<<<<<<< HEAD:sprint1.sql
create table newMembership(
=======
create table membership(
person_id mediumint unsigned auto_increment primary key,
>>>>>>> 36d1d8781aa19f4508e004a0daee4ace89b792c7:sprint-1/sprint1.sql
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


