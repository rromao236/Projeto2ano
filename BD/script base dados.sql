CREATE TABLE users_info (
nif int UNSIGNED,
name varchar(30) NOT NULL,
household varchar(30) NOT NULL,
phone int(9) NOT NULL,
email varchar(30) NOT NULL,
birthdate date NOT NULL,
points int DEFAULT 0,
CONSTRAINT pk_users_nif PRIMARY KEY (nif)
) engine=innoDB;

CREATE TABLE hotels (
id int UNSIGNED AUTO_INCREMENT,
name varchar(30) NOT NULL,
household varchar(30) NOT NULL,
city varchar(20) NOT NULL,
country varchar(15) NOT NULL,
description varchar(40) NOT NULL,
nightprice int(5) NOT NULL,
rating int(5) NOT NULL,
CONSTRAINT pk_hotels_id PRIMARY KEY (id)
) engine=innoDB;

CREATE TABLE activities (
id int Unsigned AUTO_INCREMENT,
name varchar(30) NOT NULL,
CONSTRAINT pk_activities_id PRIMARY KEY (id)
) engine=innoDB;

CREATE TABLE airports (
id int Unsigned AUTO_INCREMENT,
name varchar(40) NOT NULL,
country varchar(30) NOT NULL,
city varchar(30) NOT NULL,
CONSTRAINT pk_airports_id PRIMARY KEY (id)
) engine=innoDB;

CREATE TABLE packages (
id int Unsigned AUTO_INCREMENT,
description varchar(40) NOT NULL,
price int(3) NOT NULL,
rating int(5) NOT NULL,
image1 varchar(40) NOT NULL,
image2 varchar(40) NOT NULL,
image3 varchar(40) NOT NULL,
flightstart datetime NOT NULL,
flightend datetime NOT NULL,
flightbackstart datetime NOT NULL,
flightbackend datetime NOT NULL,
id_hostel int UNSIGNED NOT NULL,
id_airportstart int UNSIGNED NOT NULL,
id_airportend int UNSIGNED NOT NULL,
CONSTRAINT pk_packages_id PRIMARY KEY (id),
CONSTRAINT fk_packages_idhotel FOREIGN KEY (id_hostel) REFERENCES hotels (id),
CONSTRAINT fk_packages_idaeroportopartida FOREIGN KEY (id_airportstart) REFERENCES airports (id),
CONSTRAINT fk_packages_idaeroportochegada FOREIGN KEY (id_airportend) REFERENCES airports (id)
) engine=innoDB;

CREATE TABLE users_packages (
id_user int Unsigned,
id_package int Unsigned,
CONSTRAINT pk_users_packages_id PRIMARY KEY (id_user, id_package)
) engine=innoDB;

CREATE TABLE activities_packages (
id_activity int Unsigned,
id_package int Unsigned,
responsible varchar(20) NOT NULL,
timestart datetime NOT NULL,
duration int(3) NOT NULL,
CONSTRAINT pk_activities_packages_id PRIMARY KEY (id_activity, id_package)
) engine=innoDB;
