create database GJ2022;
use GJ2022;

create table membership(
person_id mediumint unsigned auto_increment primary key,
first_name varchar(40),
last_name varchar(40),
gender char(20),
email varchar(50),
password varchar(200),
phonenumber varchar(25),
yearGroup varchar(20),
course char(100)
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
person_id mediumint unsigned,
foreign key(person_id) references membership (person_id)
);


