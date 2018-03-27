CREATE SCHEMA IF NOT EXISTS Songs;
USE Songs;
DROP TABLE IF EXISTS Artist ;
CREATE TABLE IF NOT EXISTS Artist (
	 ArtistID INT NOT NULL AUTO_INCREMENT,
	 ArtistName VARCHAR(255) NOT NULL,
	 PRIMARY KEY (ArtistID)
);
DROP TABLE IF EXISTS Album ;
CREATE TABLE IF NOT EXISTS Album (
	 AlbumID INT NOT NULL AUTO_INCREMENT,
	 AlbumName VARCHAR(255) NOT NULL,
	 ArtistID INT,
	 PRIMARY KEY (AlbumID)
);
DROP TABLE IF EXISTS Song ;
CREATE TABLE IF NOT EXISTS Song (
	 SongID INT NOT NULL AUTO_INCREMENT,
	 ArtistID INT,
	 SongTitle VARCHAR(50),
	 SongLength TIME NOT NULL,
	 PRIMARY KEY (SongID)
);
DROP TABLE IF EXISTS AlbumSong ;
CREATE TABLE IF NOT EXISTS AlbumSong (
	 AlbumID INT,
	 SongID INT
);
DROP TABLE IF EXISTS Customer ;
CREATE TABLE IF NOT EXISTS Customer (
	 CustomerID INT NOT NULL AUTO_INCREMENT,
	 FirstName VARCHAR(20),
	 LastName VARCHAR(20),
	 Email VARCHAR(255),
	 StreetAddress VARCHAR(50),
	 City VARCHAR(10),
	 State VARCHAR(2),
	 Zipcode VARCHAR(20),
	 PRIMARY KEY (CustomerID)
);
INSERT INTO Artist (ArtistID, ArtistName)
	 VALUES(NULL, 'Ben Platt & Lin Manuel Miranda');
INSERT INTO Artist (ArtistID, ArtistName)
	 VALUES(NULL, 'Bebe Rexha');
INSERT INTO Artist (ArtistID, ArtistName)
	 VALUES(NULL, 'Bad Wolves');
INSERT INTO Artist (ArtistID, ArtistName)
	 VALUES(NULL, 'Image Dragons');
INSERT INTO Artist (ArtistID, ArtistName)
	 VALUES(NULL, 'Zedd, Maren Morris & Grey');

INSERT INTO Song (SongID, ArtistID, SongTitle, SongLength)
	 VALUES(NULL,1, 'Found / Tonight','3:00');	
INSERT INTO Song (SongID, ArtistID, SongTitle, SongLength)
	 VALUES(NULL,2, 'Meant to Be','3:00');	
INSERT INTO Song (SongID, ArtistID, SongTitle, SongLength)
	 VALUES(NULL,3, 'Zombie','3:00');	
INSERT INTO Song (SongID, ArtistID, SongTitle, SongLength)
	 VALUES(NULL,4, 'Whatever It Takes','3:00');	
INSERT INTO Song (SongID, ArtistID, SongTitle, SongLength)
	 VALUES(NULL,5, 'The Middle','3:00');	
