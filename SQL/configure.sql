USE website;
CREATE TABLE vpn (
	name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	password VARCHAR(10),
	reason VARCHAR(10000),
	status SMALLINT,
	PRIMARY KEY(email)
);

