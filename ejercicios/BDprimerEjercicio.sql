-- creacion de tablasbd
CREATE DATABASE alkemydb2;
USE alkemydb2;

CREATE TABLE users(
	id INT, name VARCHAR(45), last_name VARCHAR(45), age INT, gender TINYINT, birthday DATETIME
);
CREATE TABLE tickets(
	id INT, ticket VARCHAR(45)
);
CREATE TABLE ticketsusers(
	id INT,
	tickets_id INT,
	users_id INT
);

-- valores
INSERT INTO users VALUES (1, 'GERARDO 1', 'RAMIREZ 1', 23, 1, '1998-08-02 13:39:35');
INSERT INTO users VALUES (2, 'GERARDO 2', 'RAMIREZ 2', 22, 1, '1999-08-02 13:39:35');
INSERT INTO users VALUES (3, 'GERARDO 3', 'RAMIREZ 3', 26, 1, '1995-08-02 13:39:35');

INSERT INTO tickets VALUES(1, 'Ticket 2') ;INSERT INTO tickets VALUES(2, 'Ticket 1');

INSERT INTO ticketsusers VALUES(1, 1, 1); INSERT INTO ticketsusers VALUES(2, 2, 2); INSERT INTO ticketsusers VALUES(3, 2, 1);

--	Mostrar a los usuarios que nacieron de 1998 al 2000 (usando el campo birthday)
SELECT * FROM users WHERE birthday BETWEEN '1998-01-01 00:00:00' AND '2000-01-01 00:00:00';

--	Saber cuantos tickets tiene cada usuario --	Saber cuantos tickets tiene cada usuario y ordenarlos de mayor cantidad a menor cantidad de tickets.

SELECT  u.name AS Nombre, COUNT(t.id) AS tickets
 FROM ticketsusers t  INNER JOIN users u ON t.users_id = u.id GROUP BY(u.name) ORDER BY tickets DESC;
 
 -- Saber el número total de tickets que tienen todos usuarios

 SELECT COUNT(*) AS 'Total de tickets' FROM ticketsusers;
 