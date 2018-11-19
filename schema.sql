-- sukūrimas db "cuntries"--
CREATE DATABASE IF NOT EXISTS countries;
-- pasirinkimas db "countries" tam, kad galėtume kurti šioje db lenteles--
USE countries;

-- ištrynimas lentelės country, jei tokia egzistuoja (kad nemestų error)--
DROP TABLE IF EXISTS country;


CREATE TABLE IF NOT EXISTS country(
code char(2)  NOT NULL,
name char(255) COLLATE utf8_general_ci,
surface char(255) COLLATE utf8_general_ci,
PRIMARY KEY(code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci; 

CREATE TABLE IF NOT EXISTS city(
id int(10) unsigned NOT NULL AUTO_INCREMENT,
name char(255) COLLATE utf8_general_ci,
district char(255) COLLATE utf8_general_ci,
population int(11) COLLATE utf8_general_ci,
country_code char(2) COLLATE utf8_general_ci,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci; 

ALTER TABLE city  ADD CONSTRAINT `country_code_ibfk_1` FOREIGN KEY (`country_code`) REFERENCES `country` (`code`);

insert into country(code, name, surface) VALUES
('LT', 'Lithuania', 'Plain'),
('IT', 'Italy', 'Mountains');

use countries;
insert into city(name, district, population, country_code) VALUES
('Vilnius', 'Vilnius', 500000, 'LT'),
('Kaunas', 'Kaunas', 300000, 'LT'),
('Siauliai', 'Siauliai', 100000, 'LT'),
('Rome', 'Rome', 1000000, 'IT');
