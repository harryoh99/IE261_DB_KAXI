use kaxi;

create table personTBL(
	userid varchar(20) NOT NULL,
    username varchar(20) NOT NULL,
    pw varchar(20) NOT NULL,
    sex varchar(10) null,
    phoneNum INT UNSIGNED NOT NULL,
	check(sex='Male' or sex='Female'),
    primary key(userid)
);
create table userTBL(
	userid varchar(20) NOT NULL,
    email varchar(50) NOT NULL,
    primary key(userid),
    foreign key(userid) references personTBL(userid)
);
create table customerTBL(
	userid varchar(20) not null,
    reqNum int not null,
    ishost int default 0,
    foreign key (userid) references userTBL(userid),
    foreign key (reqNum) references requestTBL(reqNum),
    primary key(userid, reqNum)
);

create table taxiCompanyTBL(
	taxiCompanyNum int unsigned not null,
    taxiCompanyName varchar(20) not null,
    phoneNum int unsigned not null,
    primary key (taxiCompanyNum)
    );
create table driverTBL(
	userid varchar(20) NOT NULL,
    taxiCompanyNum int unsigned NULL,
    taxiNUM varchar(50) NOT NULL,
    primary key(userid),
    foreign key (taxiCompanyNum) references taxiCompanyTBL(taxiCompanyNum),
    foreign key (userid) references personTBL(userid)
	);

create table departureTBL(
	deptNum INT not null auto_increment,
    deptName varchar(20) NOT NULL,
    inkaist int not null default 0,
    primary key(deptNum)
);
create table arrivalTBL(
	arvNum INT not null auto_increment,
    arvName varchar(20) NOT NULL,
    inkaist int not null default 0, 
    primary key(arvNum)
);

create table requestTBL(
	reqNum INT not null auto_increment,
    year int not null,
    month int not null,
    day int not null,
    hour int not null,
    minute int not null,
    deptNum int not null,
    arvNum int not null,
    count int default 1,
    completed int default 0,
    foreign key(deptNum) references departureTBL(deptNum),
    foreign key(arvNum) references arrivalTBL(arvNum),
    check (count<=4),
    primary key (reqNum)
);


create table matchCandTBL(
	matchCandNum int not null auto_increment,
	reqNum int not null,
    completed int default 0, 
    foreign key(reqNum) references requestTBL(reqNum),
    primary key (matchCandNum)
);


create table matchTBL(
	matchNum int not null auto_increment,
	matchCandNum int not null,
    taxiID varchar(20) not null,
    primary key(matchNum),
    price int unsigned,
    foreign key(taxiID) references driverTBL(userid),
    foreign key(matchCandNum) references matchCandTBL(matchCandNum)
);

create table revenueTBL(
	matchNum int not null,
    revenue int unsigned not null,
    primary key(matchNum),
    foreign key(matchNum) references matchTBL(matchNum)
);

create table feedbackTBL(
	feedbackNum int not null auto_increment,
    userid varchar(20) not null,
    rating int null,
    feedback varchar(100) null,
    primary key(feedbackNum),
    foreign key (userid) references userTBL(userid)
    );

alter table requesttbl
add check (minute=30 or minute=0);

insert into taxicompanytbl(taxiCompanyNum, taxiCompanyName, phoneNum)
values (1, '광덕운수', 1234567);
insert into taxicompanytbl values(2, '오성', 0124567);
insert into taxicompanytbl values(3, '진양운수',3157851);

DELIMITER $$
CREATE PROCEDURE insert_depart(IN deptName varchar(20), IN inkaist int)
BEGIN
	INSERT INTO departureTBL(deptName,inkaist) VALUES (deptName, inkaist);
END $$
DELIMITER ;
CALL insert_depart('기계동',1);
CALL insert_depart('희망관',1);
CALL insert_depart('오리연못',1);
CALL insert_depart('N1',1);
CALL insert_depart('둔산 갤러리아',1);
CALL insert_depart('궁동 로데오거리',0);
CALL insert_depart('유성버스터미널',0);
CALL insert_depart('대전복합터미널',0);
CALL insert_depart('대전역',0);
CALL insert_depart('서대전역',0);

DELIMITER $$
CREATE PROCEDURE insert_arrival(IN arvName varchar(20), IN inkaist int)
BEGIN
	INSERT INTO arrivalTBL(arvName,inkaist) VALUES (arvName, inkaist);
END $$
DELIMITER ;

DELIMITER $$
create procedure insert_request(in year int, 
								in month int, 
                                in day int,
                                in hour int,
                                in minute int,
                                in deptNum int, 
                                in arvNum int)
begin 
	insert into requestTBL(year, month, day, hour, minute, deptNum, arvNum) 
		values(year, month, day, hour, minute, deptNum, arvNum);
end $$
DELIMITER ;

insert into personTBL(userid, username, pw,sex,phoneNum) 
values('0','TEMP','NOTHING','Male', 102312);
insert into userTBL(userid,email)
values('0','TMP@KAIST.AC.KR');
insert into driverTBL(userid, taxiCompanyNum, taxiNUM)
values ('0',1,'sdfsdf');
CALL insert_arrival('기계동',1);
CALL insert_arrival('희망관',1);
CALL insert_arrival('오리연못',1);
CALL insert_arrival('N1',1);
CALL insert_arrival('둔산 갤러리아',1);
CALL insert_arrival('궁동 로데오거리',0);
CALL insert_arrival('유성버스터미널',0);
CALL insert_arrival('대전복합터미널',0);
CALL insert_arrival('대전역',0);
CALL insert_arrival('서대전역',0);





DELIMITER $$
create trigger auto_customer
after insert on requestTBL
for each row 
begin 
	declare idTemp varchar(20);
    declare reqNumTemp int;
    declare ishostTemp int;
	
    SET idTemp = '0';
    SET reqNumTemp = NEW.reqNum;
    SET ishostTemp = 0;
    insert into customerTBL values(idTemp,reqNumTemp, ishostTemp);
END $$
DELIMITER ;


create table feedbackTaxiTBL(
	feedbackNum int not null auto_increment,
    userid varchar(20) not null,
    rating int null,
    feedback varchar(100) null,
    primary key(feedbackNum),
    foreign key (userid) references driverTBL(userid)
);



    