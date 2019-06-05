# Kimo-TW-Project

Tabele BD:

sensor:
----------------------------
CREATE TABLE `project`.`sensor` ( `id` INT NOT NULL AUTO_INCREMENT , `latitude` FLOAT NOT NULL , `longitude` FLOAT NOT NULL , `normal_condition` BOOLEAN NOT NULL , `animal_close` BOOLEAN NOT NULL , `accident` BOOLEAN NOT NULL , `collision` BOOLEAN NOT NULL , `another_person` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
----------------------------

CREATE TABLE `project`.`accounts` ( `id` INT NOT NULL AUTO_INCREMENT ,  `fname` VARCHAR(30) NOT NULL ,  `lname` VARCHAR(30) NOT NULL ,  `username` VARCHAR(30) NOT NULL ,  `password` VARCHAR(100) NOT NULL ,  `phone` VARCHAR(20) NOT NULL ,  `email` VARCHAR(50) NOT NULL ,  `genre` VARCHAR(10) NOT NULL ,    PRIMARY KEY  (`id`),    UNIQUE  `username` (`username`)) ENGINE = InnoDB;

CREATE TABLE `project`.`locations` ( `id` INT NOT NULL AUTO_INCREMENT ,  `latitude` DOUBLE NOT NULL ,  `longitude` DOUBLE NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;
alter table locations add CONSTRAINT UNIQUE(latitude, longitude)

create table user_loactions (id_user int , id_location int, foreign key (id_user) references accounts(id), foreign key (id_location) references locations(id))
children:
----------------------------
CREATE TABLE `project`.`children` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(30) NOT NULL , `last_name` VARCHAR(30) NOT NULL , `genre` VARCHAR(10) NOT NULL , `picture` VARCHAR(300) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 
----------------------------
friends:
----------------------------
CREATE TABLE `project`.`friends` ( `id_kid1` INT NOT NULL , `id_kid2` INT NOT NULL ) ENGINE = InnoDB;
--
ALTER TABLE friends
ADD FOREIGN KEY (id_kid1) REFERENCES children(id)
--
ALTER TABLE friends
ADD FOREIGN KEY (id_kid2) REFERENCES children(id);
----------------------------
