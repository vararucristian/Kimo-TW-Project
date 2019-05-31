# Kimo-TW-Project
instructiuni -sensorAPi:
Am creat baza de date project in care am adaugat urmatoarea tabela:
----------------------------
CREATE TABLE `project`.`sensor` ( `id` INT NOT NULL AUTO_INCREMENT , `latitude` FLOAT NOT NULL , `longitude` FLOAT NOT NULL , `normal_condition` BOOLEAN NOT NULL , `animal_close` BOOLEAN NOT NULL , `accident` BOOLEAN NOT NULL , `colission` BOOLEAN NOT NULL , `another_person` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
----------------------------