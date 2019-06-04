# Kimo-TW-Project

Tabele BD:

sensor:
----------------------------
CREATE TABLE `project`.`sensor` ( `id` INT NOT NULL AUTO_INCREMENT , `latitude` FLOAT NOT NULL , `longitude` FLOAT NOT NULL , `normal_condition` BOOLEAN NOT NULL , `animal_close` BOOLEAN NOT NULL , `accident` BOOLEAN NOT NULL , `collision` BOOLEAN NOT NULL , `another_person` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
----------------------------
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