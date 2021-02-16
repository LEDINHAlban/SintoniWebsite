
CREATE TABLE not_member (
  email varchar(50) NOT NULL,
  first_name varchar(30) NOT NULL,
  last_name varchar(30) NOT NULL,
  mobile varchar(15) NOT NULL,
  yoga int DEFAULT 0,
  zumba int DEFAULT 0,
  fitness int DEFAULT 0,
  step int DEFAULT 0, 
  PRIMARY KEY (email)
);