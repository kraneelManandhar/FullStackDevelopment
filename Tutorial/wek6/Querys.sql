Create TABLE products(
	id int AUTO_INCREMENT PRIMARY KEY,
	name Varchar(100) NOT Null,
	price Decimal(10,2),
	category Varchar(50)
);

INSERT INTO products (name, price, category) VALUES ("mac book", 199.67, "laptop");


INSERT INTO products (name, price, category)
VALUES
  ("mac book", 199.67, "laptop"),
  ("dell inspiron", 150.50, "laptop"),
  ("hp pavilion", 175.00, "laptop"),
  ("iphone 13", 899.99, "mobile");


