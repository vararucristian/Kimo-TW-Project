# Kimo-TW-Project
instructiuni -sensorAPi:
Am creat baza de date project in care am adaugat urmatoarea tabela:
! am fost modificat scriptul
----------------------------
CREATE TABLE `project`.`sensor` ( `id` INT NOT NULL AUTO_INCREMENT , `latitude` FLOAT NOT NULL , `longitude` FLOAT NOT NULL , `normal_condition` BOOLEAN NOT NULL , `animal_close` BOOLEAN NOT NULL , `accident` BOOLEAN NOT NULL , `collision` BOOLEAN NOT NULL , `another_person` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
----------------------------

CREATE TABLE `project`.`accounts` ( `id` INT NOT NULL AUTO_INCREMENT ,  `fname` VARCHAR(30) NOT NULL ,  `lname` VARCHAR(30) NOT NULL ,  `username` VARCHAR(30) NOT NULL ,  `password` VARCHAR(100) NOT NULL ,  `phone` VARCHAR(20) NOT NULL ,  `email` VARCHAR(50) NOT NULL ,  `genre` VARCHAR(10) NOT NULL ,    PRIMARY KEY  (`id`),    UNIQUE  `username` (`username`)) ENGINE = InnoDB;

CREATE TABLE `project`.`locations` ( `id` INT NOT NULL AUTO_INCREMENT ,  `latitude` DOUBLE NOT NULL ,  `longitude` DOUBLE NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;
alter table locations add CONSTRAINT UNIQUE(latitude, longitude)

create table user_loactions (id_user int , id_location int, foreign key (id_user) references accounts(id), foreign key (id_location) references locations(id))