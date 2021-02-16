
CREATE TABLE Admin (
  admin_no int NOT NULL AUTO_INCREMENT,
  first_name varchar(30) NOT NULL,
  last_name varchar(30) NOT NULL,
  password varchar(30) NOT NULL,
  date_of_birth date NOT NULL,
  gender varchar(20) NOT NULL,
  mobile varchar(15) NOT NULL,
  home_tel varchar(15) NOT NULL,
  email varchar(50),
  address varchar(100) NOT NULL,
  PRIMARY KEY (admin_no)
);