CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;

CREATE TABLE IF NOT EXISTS weather (
  city VARCHAR(45) NOT NULL,
  temperature INT NULL,
  ID INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id)
  );

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

INSERT INTO weather (city, temperature)
SELECT * FROM (SELECT 'Moscow', 0) AS tmp
WHERE NOT EXISTS (
    SELECT city FROM weather WHERE city = 'Moscow' AND temperature = 0
) LIMIT 1;

INSERT INTO weather (city, temperature)
SELECT * FROM (SELECT 'Saint-Petersburg', 0) AS tmp
WHERE NOT EXISTS (
    SELECT city FROM weather WHERE city = 'Saint-Petersburg' AND temperature = 0
) LIMIT 1;

INSERT INTO weather (city, temperature)
SELECT * FROM (SELECT 'Omsk', 0) AS tmp
WHERE NOT EXISTS (
    SELECT city FROM weather WHERE city = 'Omsk' AND temperature = 0
) LIMIT 1;

INSERT INTO weather (city, temperature)
SELECT * FROM (SELECT 'Voronezh', 0) AS tmp
WHERE NOT EXISTS (
    SELECT city FROM weather WHERE city = 'Voronezh' AND temperature = 0
) LIMIT 1;

INSERT INTO weather (city, temperature)
SELECT * FROM (SELECT 'Saratov', 0) AS tmp
WHERE NOT EXISTS (
    SELECT city FROM weather WHERE city = 'Saratov' AND temperature = 0
) LIMIT 1;