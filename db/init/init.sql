CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;

CREATE TABLE IF NOT EXISTS cities (
  city_name VARCHAR(45) NULL,
  city_name_rus VARCHAR(45) NULL,
  ID INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id));

CREATE TABLE IF NOT EXISTS temperatures (
  temperature INT NULL,
  city_id INT NOT NULL,
  PRIMARY KEY (city_id),
  INDEX fk_temperatures_cities_idx (city_id ASC) VISIBLE,
  CONSTRAINT fk_temperatures_cities
    FOREIGN KEY (city_id)
    REFERENCES cities (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS users (
  login VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL,
  ID INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id)
  );

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'admin', 'password') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login = 'admin' AND password = 'password'
) LIMIT 1;