-- Tables
CREATE TABLE VRSTA_SENZORJA
(
  ID_VRSEN Int NOT NULL AUTO_INCREMENT,
  NAZIV_VRSEN Varchar(200),
  EM Varchar(20),
 PRIMARY KEY (ID_VRSEN)
)  engine=ndb;

CREATE TABLE SENZOR
(
  ID_SENZORJA Int NOT NULL AUTO_INCREMENT,
  ID_PROSTORA Int NOT NULL,
  ID_VRSEN Int NOT NULL,
  X Int,
  Y Int,
  Z Int,
 PRIMARY KEY (ID_SENZORJA)
)  engine=ndb;

CREATE TABLE PROSTOR
(
  ID_PROSTORA Int NOT NULL AUTO_INCREMENT,
  NAZIV_PROSTORA Varchar(200),
 PRIMARY KEY (ID_PROSTORA)
)  engine=ndb;

CREATE TABLE MERITEV
(
  ID_MERITVE Int NOT NULL AUTO_INCREMENT,
  ID_SENZORJA Int NOT NULL,
  TEMPERATURA Double ,
  VLAGA Double ,
  HRUP Double ,
  SVETLOBA Double ,
  ZRAK Double ,
  CAS Datetime ,
 PRIMARY KEY (ID_MERITVE)
)  engine=ndb;

CREATE TABLE VIDEO
(
  ID_VIDEO Int NOT NULL AUTO_INCREMENT,
  ID_SENZORJA Int,
  ID_PROSTORA Int,
  VIDEO LONGBLOB,
  OBDOBJE_OD DATETIME,
  OBDOBJE_DO DATETIME,
 PRIMARY KEY (ID_VIDEO)
)  engine=ndb;

-- Create relationships section ------------------------------------------------- 
ALTER TABLE SENZOR ADD CONSTRAINT Relationship1 FOREIGN KEY (ID_VRSEN) REFERENCES VRSTA_SENZORJA (ID_VRSEN) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE SENZOR ADD CONSTRAINT Relationship2 FOREIGN KEY (ID_PROSTORA) REFERENCES PROSTOR (ID_PROSTORA) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE MERITEV ADD CONSTRAINT MERITEV_SENZ_FK FOREIGN KEY (ID_SENZORJA) REFERENCES SENZOR (ID_SENZORJA) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE VIDEO ADD CONSTRAINT VIDEO_SENZ_FK FOREIGN KEY (ID_SENZORJA) REFERENCES SENZOR (ID_SENZORJA) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE VIDEO ADD CONSTRAINT VIDEO_PROST_FK FOREIGN KEY (ID_PROSTORA) REFERENCES PROSTOR (ID_PROSTORA) ON DELETE NO ACTION ON UPDATE NO ACTION;