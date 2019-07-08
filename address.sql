-- CREATE TABLE "city" -----------------------------------------
CREATE TABLE `city` ( 
	`CityID` Int( 2 ) AUTO_INCREMENT NOT NULL,
	`CityTitle` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
	`CityKey` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `CityID` ),
	CONSTRAINT `unique_CityKey` UNIQUE( `CityKey` ) )
CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 81;
-- -------------------------------------------------------------

-- CREATE TABLE "town" -----------------------------------------
CREATE TABLE `town` ( 
	`TownID` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`TownTitle` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
	`TownKey` Int( 11 ) NOT NULL,
	`FK_CityKey` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `TownID` ),
	CONSTRAINT `unique_TownKey` UNIQUE( `TownKey` ) )
CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 974;
-- -------------------------------------------------------------

-- CREATE INDEX "FK_town_city" ---------------------------------
CREATE INDEX `FK_town_city` USING BTREE ON `town`( `FK_CityKey` );
-- -------------------------------------------------------------

-- CREATE LINK "FK_town_city" ----------------------------------
ALTER TABLE `town`
	ADD CONSTRAINT `FK_town_city` FOREIGN KEY ( `FK_CityKey` )
	REFERENCES `city`( `CityKey` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------

-- CREATE TABLE "neigborhood" ----------------------------------
CREATE TABLE `neigborhood` ( 
	`NeigborhoodID` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`NeigborhoodTitle` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
	`NeigborhoodKey` Int( 11 ) NOT NULL,
	`FK_TownKey` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `NeigborhoodID` ),
	CONSTRAINT `unique_NeigborhoodKey` UNIQUE( `NeigborhoodKey` ) )
CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 49655;
-- -------------------------------------------------------------

-- CREATE INDEX "FK_neigborhood_town" --------------------------
CREATE INDEX `FK_neigborhood_town` USING BTREE ON `neigborhood`( `FK_TownKey` );
-- -------------------------------------------------------------

-- CREATE LINK "FK_neigborhood_town" ---------------------------
ALTER TABLE `neigborhood`
	ADD CONSTRAINT `FK_neigborhood_town` FOREIGN KEY ( `FK_TownKey` )
	REFERENCES `town`( `TownKey` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------

-- CREATE TABLE "road" -----------------------------------------
CREATE TABLE `road` ( 
	`RoadID` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`FK_NeigborhoodKey` Int( 11 ) NOT NULL,
	`RoadTitle` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
	PRIMARY KEY ( `RoadID` ) )
CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 50203;
-- -------------------------------------------------------------

-- CREATE INDEX "FK_neigborhood_road" --------------------------
CREATE INDEX `FK_neigborhood_road` USING BTREE ON `road`( `FK_NeigborhoodKey` );
-- -------------------------------------------------------------

-- CREATE LINK "FK_neigborhood_road" ---------------------------
ALTER TABLE `road`
	ADD CONSTRAINT `FK_neigborhood_road` FOREIGN KEY ( `FK_NeigborhoodKey` )
	REFERENCES `neigborhood`( `NeigborhoodKey` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------

-- CREATE TABLE "street" ---------------------------------------
CREATE TABLE `street` ( 
	`StreetID` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`StreetTitle` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
	`FK_NeigborhoodKey` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `StreetID` ) )
CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 571432;
-- -------------------------------------------------------------

-- CREATE INDEX "FK_neigborhood_street" ------------------------
CREATE INDEX `FK_neigborhood_street` USING BTREE ON `street`( `FK_NeigborhoodKey` );
-- -------------------------------------------------------------

-- CREATE LINK "FK_neigborhood_street" -------------------------
ALTER TABLE `street`
	ADD CONSTRAINT `FK_neigborhood_street` FOREIGN KEY ( `FK_NeigborhoodKey` )
	REFERENCES `neigborhood`( `NeigborhoodKey` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------
