USE website;
CREATE TABLE vpn (
	name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	reason VARCHAR(10000),
	status VARCHAR(10),
	PRIMARY KEY(email)
);

