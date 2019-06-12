# Kimo-TW-Project

Tabele BD:

sensor:
----------------------------
CREATE TABLE `project`.`sensor` ( `id` INT NOT NULL AUTO_INCREMENT , `latitude` FLOAT NOT NULL , `longitude` FLOAT NOT NULL , `normal_condition` BOOLEAN NOT NULL , `animal_close` BOOLEAN NOT NULL , `accident` BOOLEAN NOT NULL , `collision` BOOLEAN NOT NULL , `another_person` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
----------------------------

CREATE TABLE `project`.`accounts` ( `id` INT NOT NULL AUTO_INCREMENT ,  `fname` VARCHAR(30) NOT NULL ,  `lname` VARCHAR(30) NOT NULL ,  `username` VARCHAR(30) NOT NULL ,  `password` VARCHAR(100) NOT NULL ,  `phone` VARCHAR(20) NOT NULL ,  `email` VARCHAR(50) NOT NULL ,  `genre` VARCHAR(10) NOT NULL ,    PRIMARY KEY  (`id`),    UNIQUE  `username` (`username`)) ENGINE = InnoDB;

CREATE TABLE `project`.`locations` ( `id` INT NOT NULL AUTO_INCREMENT ,  `latitude` DOUBLE NOT NULL ,  `longitude` DOUBLE NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;
alter table locations add CONSTRAINT UNIQUE(latitude, longitude)

create table user_locations (id_user int , id_location int, foreign key (id_user) references accounts(id), foreign key (id_location) references locations(id))

children:
----------------------------
CREATE TABLE `project`.`children` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(30) NOT NULL , `last_name` VARCHAR(30) NOT NULL , `genre` VARCHAR(10) NOT NULL , `picture` VARCHAR(300) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

CREATE TABLE `project`.`account_childs` ( `id_account` INT NOT NULL , `id_child` INT NOT NULL ) ENGINE = InnoDB;
alter table account_childs add FOREIGN key (id_child) references children(id)
alter table account_childs add FOREIGN key (id_account) references accounts(id)

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
tokens
----------------------------
CREATE TABLE `project`.`tokens` ( `id` INT NOT NULL AUTO_INCREMENT , `value` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
----------------------------
account_tokens
----------------------------
CREATE TABLE `project`.`account_tokens` ( `id_account` INT NOT NULL , `id_token` INT NOT NULL ) ENGINE = InnoDB;
ALTER TABLE account_tokens add CONSTRAINT FOREIGN KEY(id_account) REFERENCES accounts(id)
alter table account_tokens add CONSTRAINT FOREIGN KEY(id_token) REFERENCES tokens(id)
----------------------------
close_persons
----------------------------
CREATE TABLE `project`.`close_persons` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(50) NOT NULL , `last_name` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `project`.`child_close_persons` ( `id_child` INT NOT NULL , `id_close_person` INT NOT NULL ) ENGINE = InnoDB; 
ALTER TABLE child_close_persons ADD CONSTRAINT FOREIGN KEY(id_child) REFERENCES children(id)
ALTER TABLE child_close_persons ADD CONSTRAINT FOREIGN KEY(id_close_person) REFERENCES close_persons(id)

CREATE TABLE `project`.`close_person_location` ( `id_close_person` INT NOT NULL , `id_location` INT NOT NULL ) ENGINE = InnoDB; 
ALTER TABLE close_person_location ADD CONSTRAINT FOREIGN KEY(id_close_person) REFERENCES close_persons(id)
ALTER TABLE close_person_location ADD CONSTRAINT FOREIGN KEY(id_location) REFERENCES locations(id)
----------------------------

CREATE TABLE `project`.`messages` ( `id` INT NOT NULL AUTO_INCREMENT , `message` TEXT NOT NULL , `date` DATETIME NOT NULL , `seen` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `project`.`account_messages` ( `id_message` INT NOT NULL , `id_sendBy` INT NOT NULL , `id_sendTo` INT NOT NULL ) ENGINE = InnoDB;

ALTER TABLE account_messages add CONSTRAINT FOREIGN KEY(id_message) REFERENCES messages(id)
ALTER TABLE account_messages add CONSTRAINT FOREIGN KEY(id_sendBy) REFERENCES accounts(id)
ALTER TABLE account_messages add CONSTRAINT FOREIGN KEY(id_sendTo) REFERENCES accounts(id)
