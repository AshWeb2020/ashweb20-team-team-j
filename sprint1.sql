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

insert into activity(activityName,activityDate,description,status,location,image) values("Labadi Beach Clean Up","2020-10-31","On the 31st October,the Ashesi Leo club partnered with the Accra Golden Lions Club for a vision screening at the Obra Spot Station. With the help of the GPRTU Obra Spot Branch and the Madina Polyclinic Eye Unit,the activity was a great success!","register","Labadi",load_file("/Users/burtinagraham/Desktop/GS/ashweb20-team-team-j/UpcomingActivities/upcoming1.jpg"));
insert into activity(activityName,activityDate,description,status,location,image) values("Berekuso Teen Mom's Project","2020-11-21","This activity aims at empowering teen mothers in Berekuso through skill acquisition sessions.","register","berekuso", load_file("/Users/burtinagraham/Desktop/GS/ashweb20-team-team-j/UpcomingActivities/upcoming2.jpg"));
insert into activity(activityName,activityDate,description,status,location,image) values("Beach Clean Up Exercise","2020-11-28","This activity will be held at the Sakumono Beach in collaboration with four other Leo Clubs.","register","sakumono",load_file("/Users/burtinagraham/Desktop/GS/ashweb20-team-team-j/UpcomingActivities/upcoming3.png"));
insert into activity(activityName,activityDate,description,status,location,image) values("Diabetes Awareness Week","2020-11-09","This month's awareness campaign will include virtual advocacy on our social media pages.","register","virtual",load_file("/Users/burtinagraham/Desktop/GS/ashweb20-team-team-j/UpcomingActivities/upcoming4.jpg"));
insert into activity(activityName,activityDate,description,status,location,image) values("Virtual Reading Clinic","2020-09-19","The aim of this activity is to help sharpen the reading and comprehension skills of all participants.","register","virtual",load_file("/Users/burtinagraham/Desktop/GS/ashweb20-team-team-j/UpcomingActivities/upcoming5.jpg"));
insert into activity(activityName,activityDate,description,status,location,image) values("Hunger Relief 2.0","2020-09-12","As part of an International Megatwinning Activity: Hunger Relief 2.0 project, we will be collaborating with four other Leo Clubs for a donation to the Motherly Love Orphanage, Kwabenya.","register","kwabenya",load_file("/Users/burtinagraham/Desktop/GS/ashweb20-team-team-j/UpcomingActivities/upcoming6.jpg"));



