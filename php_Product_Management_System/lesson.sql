CREATE TABLE imagesTest(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    image varchar(255) NOT NULL,
    PRIMARY KEY (id)
);


SELECT * FROM php_final_p.r_users;
use php_final_p;
CREATE TABLE r_users (
    username varchar(40) NOT NULL,
    phone varchar(1) not null,
    birthdate date not null,
    email varchar(50) not null,
    password varchar(8)
);

use php_final_p;
CREATE TABLE product_info (
    Product_name varchar(40) NOT NULL,
    Price int not null,
    Quantity int not null,
	Description varchar(100) not null
);