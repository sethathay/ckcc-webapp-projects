create database final;
use final;
create table tblnewsfeed(
	id int(11) primary key AUTO_INCREMENT,
	title varchar(20),
	description varchar(500),
	created datetime
	);
create table tblusers(
	id varchar(12) primary key not null,
	firstname varchar(10),
	lastname varchar(10),
	gmail varchar(50),
	password varchar(12)
	);
create table tblstudents(
	id int(8) primary key not null AUTO_INCREMENT, 
	idcard varchar(12),
	firstname varchar(10),
	lastname varchar(10),
	gender varchar(6),
	address varchar(50),
	class varchar(2),
	rank int(2)
	);