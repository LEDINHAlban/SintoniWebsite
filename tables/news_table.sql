
CREATE TABLE news (
  news_no int NOT NULL AUTO_INCREMENT,
  Title varchar(30) NOT NULL,
  text varchar (500) NULL,
  picloc varchar (30) NULL,
  news_date DATETIME,
  PRIMARY KEY (news_no)
);