create database utn2;
drop database utn2;
use utn2;

create table User(

	email varchar(50),
    password varchar(50),
    
    constraint fk_email primary key(email)

);

create table UserAdmin(

email varchar(50),
    password varchar(50),
    
    constraint fk_email primary key(email)

);

create table Company(

	companyId int NOT NULL auto_increment,
    companyName varchar(60),
    phoneNumber varchar(60),
    cuit int(20),
    email varchar(60),
    
constraint pk_companyId primary key(companyId)
    
);

create table JobOffer(
	jobOfferId int NOT NULL auto_increment,
    jobPositionId int,
    companyId int,
    description varchar(200),
    
    constraint pk_jobOfferId primary key(jobOfferId),
    constraint fk_companyId foreign key (companyId) references Company(companyId)

);

create table JobApplication(

	jobApplicationId int NOT NULL auto_increment,
    studentId int,
    jobOfferId int,
    
    constraint pk_jobApplicationId primary key(jobApplicationId),
    constraint fk_jobOfferId foreign key(jobOfferid) references Joboffer(jobOfferId)

);

DROP procedure IF EXISTS JobApplication_Add;

DELIMITER $$
CREATE PROCEDURE JobApplication_Add(in jobOfferId int,in studentId int)
BEGIN
		insert into JobApplication (jobOfferId,studentId) values (jobOfferId,studentId);
END$$

DROP procedure IF EXISTS JobApplication_GetAll;

DELIMITER $$
CREATE PROCEDURE JobApplication_GetAll()
BEGIN
		select * from JobApplicaction;
END$$

DROP procedure IF EXISTS `User_GetByEmail`;

DELIMITER $$

CREATE PROCEDURE User_GetByEmail (IN email VARCHAR(100))
BEGIN
	SELECT User.email, User.password
    FROM User
    WHERE (User.email = email);
END$$

DROP procedure IF EXISTS `UserAdmin_GetByEmail`;

DELIMITER $$

CREATE PROCEDURE UserAdmin_GetByEmail (IN email VARCHAR(100))
BEGIN
	SELECT UserAdmin.email, UserAdmin.password
    FROM UserAdmin
    WHERE (UserAdmin.email = email);
END$$

DROP procedure IF EXISTS Company_Add;

DELIMITER $$

CREATE PROCEDURE Company_Add(IN companyName VARCHAR(60),IN phoneNumber VARCHAR(60),IN cuit INT(20),IN email VARCHAR(60))
BEGIN

	INSERT INTO Company(companyName,phoneNumber,cuit,email) VALUES (companyName,phoneNumber,cuit,email);
    
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
	SELECT companyId,companyName,phoneNumber,cuit,email
    FROM Company;
END$$

DROP procedure IF EXISTS Company_Update;

DELIMITER $$

CREATE PROCEDURE Company_Update(IN company_id INT,IN companyName VARCHAR(50),IN phoneNumber VARCHAR(60),in cuit int(20),in email VARCHAR(60))
BEGIN
		UPDATE Company set companyName = companyName,phoneNumber = phoneNumber,cuit = cuit,email=email WHERE companyId = company_id ;
        
END$$

DROP procedure IF EXISTS Company_GetByName;
DELIMITER $$
CREATE PROCEDURE Company_GetByName(IN companyName varchar(60))
BEGIN
		select Company.companyId,Company.companyName,Company.phoneNumber,Company.cuit,Company.email
        from Company
        where(Company.companyName = companyName);
        
        
        
END$$

DROP procedure IF exists JobOffer_Add;
DELIMITER $$
CREATE PROCEDURE JobOffer_Add(in jobPositionId INT,in companyId INT,in description varchar(200))
BEGIN
		insert into JobOffer (jobPositionId,companyId,description) values(jobPositionId,companyId,description);

END$$


DROP procedure IF exists JobOffer_Delete;
DELIMITER $$
CREATE PROCEDURE JobOffer_Delete(in id INT)
BEGIN
	DELETE
        FROM JobOffer
        WHERE (jobOfferId = id);

END$$



DROP  PROCEDURE IF EXISTS JobOffer_Update;
DELIMITER $$

CREATE PROCEDURE JobOffer_Update(IN jobOffer_Id INT,in description VARCHAR(200))
BEGIN
		UPDATE JobOffer set description = description WHERE jobOfferId = jobOffer_Id ;

END$$

insert into UserAdmin(email,password)values('admin@utn.com','admin');
