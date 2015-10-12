--- TABLE USERS ---
CREATE TABLE users
(
   id INT PRIMARY KEY AUTO_INCREMENT ,
   username VARCHAR(50) UNIQUE NOT NULL,
   password VARCHAR(50),
   email VARCHAR(320),
   gender VARCHAR(8),
   status TINYINT
);

--- TABLE USER_DETAILS ---
CREATE TABLE user_details
(
   id INT PRIMARY KEY AUTO_INCREMENT,
   username VARCHAR(20) UNIQUE NOT NULL,
   first_name VARCHAR(32),
   last_name VARCHAR(32),
   country_code VARCHAR(8),
   address VARCHAR(32),
   FOREIGN KEY (username) REFERENCES users ( username)
);

--- TABLE ORDERS ---
CREATE TABLE orders 
( 
   id INT PRIMARY KEY AUTO_INCREMENT,
   user_id INT,
   first_name VARCHAR(50),
   last_name VARCHAR(50),
   address VARCHAR(50),
   total FLOAT,
   order_time TIMESTAMP ,
   FOREIGN KEY (user_id) REFERENCES user_details(id)
);

--- TABLE ORDER_LINES ---
CREATE TABLE order_lines 
(
   id INT PRIMARY KEY AUTO_INCREMENT,
   order_id INT,
   product_id INT,
   product_price FLOAT,
   quantity INT,
   price_without_vat FLOAT,
   vat FLOAT,
   total FLOAT,
   FOREIGN KEY (order_id) REFERENCES orders (id),
   FOREIGN KEY (product_id) REFERENCES catalogue (id)
);
