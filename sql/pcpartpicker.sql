DROP TABLE IF EXISTS ratings;
DROP TABLE IF EXISTS build;
DROP TABLE IF EXISTS ramChip;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	email VARCHAR (128) NOT NULL ,
	about VARCHAR (255),
	savedParts VARCHAR(512),
	account VARCHAR(128),
	UNIQUE (email),
	PRIMARY KEY (profileId)
);

CREATE TABLE ramChip (
	productId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	productName VARCHAR(128) NOT NULL,
	manufacturerName VARCHAR(128),
	modelName VARCHAR (128),
	price INT UNSIGNED NOT NULL,
	UNIQUE (productId),
	PRIMARY KEY (productId)
);

CREATE TABLE build (
	buildId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	productId INT UNSIGNED NOT NULL,
	productName VARCHAR (128),
	INDEX (productId),
	FOREIGN KEY (productId) REFERENCES ramChip(productId),
	PRIMARY KEY (buildId)
);

CREATE TABLE ratings (
	profileId INT UNSIGNED NOT NULL,
	ratingInt INT UNSIGNED NOT NULL,
	productId INT UNSIGNED NOT NULL,
	productName VARCHAR (128),
	comments VARCHAR(255),
	INDEX(profileId),
	INDEX(productId),
	FOREIGN KEY (profileId) REFERENCES profile(profileId),
	FOREIGN KEY (productId) REFERENCES ramChip (productId)
);