DROP TABLE IF EXISTS account;
CREATE TABLE account(
	username VARCHAR(16) PRIMARY KEY NOT NULL,
	password VARCHAR(33) NOT NULL,
	email VARCHAR(254),
	name VARCHAR(100),
	birth DATE,
	city VARCHAR(50),
	country VARCHAR(50),
	description VARCHAR(256),
	type VARCHAR(10)
);

DROP TABLE IF EXISTS reviews;
CREATE TABLE reviews(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	user VARCHAR REFERENCES reviewers(user_id),
	restaurant_id INTEGER REFERENCES restaurant,
	review_date DATETIME,
	review_text VARCHAR(5000) NOT NULL,
	score INTEGER NOT NULL,
	CHECK(score > 0),
	CHECK(score <= 10)
);

DROP TABLE IF EXISTS restaurants;
CREATE TABLE restaurants(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	owner_id VARCHAR(16) REFERENCES owners(user_id),
	name VARCHAR(50) NOT NULL,
	phone INTEGER(15),
	email VARCHAR(254),
	address VARCHAR(100) NOT NULL,
	city VARCHAR(50) NOT NULL,
	country VARCHAR(50) NOT NULL,
	description VARCHAR(1000) NOT NULL
);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR REFERENCES owners(user_id),
	review_id INTEGER REFERENCES review,
	comment_date DATETIME,
	comment_text VARCHAR(1000) NOT NULL
);

INSERT INTO account (username,password,email,name,birth,city,country,type,description) VALUES
('user1','81dc9bdb52d04dc20036dbd8313ed055','mail1@generico.com','tobias',1996-10-28,'porto','portugal','owner','ola sou o tobias'),
('user2','81dc9bdb52d04dc20036dbd8313ed055','email2@generico.com','joao',1996-10-25,'lisboa','portugal','reviewer','ola sou o joao'),
('user3','81dc9bdb52d04dc20036dbd8313ed055','email3@generico.com','carlos',1990-10-22,'porto','portugal','reviewer','ola sou o carlos'),
('admin1','81dc9bdb52d04dc20036dbd8313ed055','email4@generico.com','admin',1990-10-21,'chaves','portugal','admin','ola sou o admin');



INSERT INTO restaurants (owner_id,name,phone,email,address,city,country,description) VALUES
	('user1','restaurante um',221234567,'restemail1@generico.com','rua generica 1','porto','portugal','o melhor restaurante do distrito'),
	('user1','restaurante dois',221234566,'restemail2@generico.com','rua generica 2','porto','portugal','o 2 melhor restaurante do distrito');

INSERT INTO reviews (user,restaurant_id,review_date,review_text,score) VALUES ('user2',1,2016-08-20,'muito bom sai de la bem alimentado',8);