create database UTN;
use UTN;

create table Career(

	careerId int NOT NULL auto_increment ,
    description varchar(100),
    active boolean,
    
    constraint pk_careerId primary key(careerId)

);

create table JobPosition(
	jobPositionId int NOT NULL auto_increment,
    careerId int,
    description varchar(100),
    
    constraint pk_jobpositionId primary key(jobPositionId),
    constraint fk_careerId foreign key(careerId) references Career (careerId)


);

create table Student(

	studentId int NOT NULL auto_increment,
    careerId int,
    firstName varchar(50),
    lastName varchar(50),
    dni varchar(20),
    fileNumber varchar(20),
    gender varchar(30),
    birthDate date,
    email varchar(100),
    phoneNumber varchar(100),
    active boolean,
    
	constraint pk_studentId primary key(studentId),
    constraint fk_careerId foreign key(careerId) references Career (careerId)


);



create table JobOffer(
	
    jobOfferId int NOT NULL auto_increment,
    jobPositionId int,
    studentId int,
    
    
    constraint pk_jobOfferId primary key(jobOfferId),
	constraint fk_jobPositionId foreign key(jobPositionId) references JobPosition(jobPositionId),
    constraint fk_studentId foreign key(studentId) references Student(studentId)


);




create table Company(

	companyId int NOT NULL auto_increment,
    jobPositionId int,
    companyName varchar(60),
    description varchar(200),
    cuit int(11),
    email varchar(60),
    
    constraint pk_companyId primary key(companyId),
    constraint fk_jobPositionId foreign key(jobPositionId) references JobPosition(jobPositionId)

);

DROP procedure IF EXISTS JobOffer_Add;

DELIMITER $$
CREATE PROCEDURE JobOffer_Add(IN jobPositionId int,IN studentId INT)
BEGIN
		INSERT INTO JobOffer(jobPositionId,studentID)
        values
        (jobPositionId,studentId);
END$$

DROP procedure IF EXISTS JobOffer_GetAll;

DELIMITER $$

CREATE PROCEDURE JobOffer_GetAll()
BEGIN
		select jobOfferId,jobPositionId,studentId
        from JobOffer;

END$$


DROP procedure IF EXISTS Student_Add;

DELIMITER $$

CREATE PROCEDURE Student_Add(IN careerId INTEGER,IN firstName VARCHAR(60),IN lastName VARCHAR(60),IN dni VARCHAR(20),IN fileNumber VARCHAR(20),IN gender VARCHAR(20),IN birthDate DATE,IN email VARCHAR(100),IN phoneNumber VARCHAR(20),IN active BOOLEAN)
BEGIN
		INSERT INTO Student
        (careerId,firstName,lastName,dni,fileNumber,gender,birthDate,email,phoneNumber,active)
        values
        (careerId,firstName,lastName,dni,fileNumber,gender,birthDate,email,phoneNumber,active);

END$$



DROP procedure IF EXISTS Company_Add;

DELIMITER $$

CREATE PROCEDURE Company_Add(IN jobPositionId INTEGER,IN companyName VARCHAR(60),IN description VARCHAR(60),IN cuit INT(11),IN email VARCHAR(60))
BEGIN

	INSERT INTO Company(jobPositionId,companyName,description,cuit,email) VALUES (jobPositionId,companyName,description,cuit,email);
    
END$$

DROP procedure IF EXISTS Company_Delete;

DELIMITER $$

CREATE PROCEDURE Company_Delete(IN Id INT)
BEGIN
		DELETE
        FROM Company
        WHERE (companyId = id);
END$$




DROP procedure IF EXISTS `Company_GetAll`;

DELIMITER $$

CREATE PROCEDURE Company_GetAll ()
BEGIN
	SELECT companyId,jobPositionId,companyName,description,cuit,email
    FROM Company;
END$$

DROP procedure IF EXISTS Company_Update;

DELIMITER $$

CREATE PROCEDURE Company_Update(IN company_id INT,jobPositionId INT,IN companyName VARCHAR(50),IN description VARCHAR(200),in cuit int(11),in email VARCHAR(60))
BEGIN
		UPDATE Company set jobPositionId = jobPositionId ,companyName = companyName,description = description,cuit = cuit,email=email WHERE companyId = company_id ;
        
END$$

DROP procedure IF EXISTS JobPosition_GetJobs;
DELIMITER $$
CREATE PROCEDURE JobPosition_GetJobs()
BEGIN
		select j.jobPositionId,j.careerId,j.description from JobPosition j
		join Student s on s.careerId = j.careerId where s.careerId = j.careerId
        group by j.jobPositionId;
        
END$$

DROP procedure IF EXISTS JobPosition_GetJobs2;
DELIMITER $$
CREATE PROCEDURE JobPosition_GetJobs2(IN jobId2 INT)
BEGIN
		select j.jobPositionId,j.careerId,j.description,c.careerId from JobPosition j
		join Career c on c.careerId = j.careerId where jobId2 = j.careerId;
        
        
        
END$$

DROP procedure IF EXISTS JobPosition_Delete;

DELIMITER $$
CREATE PROCEDURE JobPosition_Delete(IN id INT)
BEGIN

DELETE
        FROM JobPosition
        WHERE (jobPositionId = id);


END$$

DROP procedure IF EXISTS JobPosition_Update;

DELIMITER $$

CREATE PROCEDURE JobPosition_Update(IN jobPositionId2 INT,careerId2 INT,IN description2 VARCHAR(200))
BEGIN
		UPDATE JobPosition set careerId = careerId2 ,description = description2 WHERE jobPositionId = jobPositionId2 ;
        
END$$

