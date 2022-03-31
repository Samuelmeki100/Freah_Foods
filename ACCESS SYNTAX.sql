----------------ACCESS SYNTAX------------

		CREATE TABLE `location` (
		  `id` INT NOT NULL PRIMARY KEY,
		  `Name` varchar(50) NOT NULL
		);
		
		CREATE  TABLE `usertype`(
			`id` INT  NOT NULL   PRIMARY KEY,
			`name` VARCHAR(50),
			`Decsription` text(70)
		);

		CREATE TABLE `user` (
		  `id` INT NOT NULL PRIMARY KEY,
		  `user_name` varchar(50) NOT NULL,
		  `phone1` char(20) NOT NULL,
		  `phone2` char(20),
		  `user_Type` INT,
		  `Email` varchar(50) NOT NULL,
		  `PASWORD` VARCHAR(50) NOT NULL,
		  FOREIGN KEY (user_Type) REFERENCES `usertype`(id) 
		) ;


		CREATE TABLE `product_type` (
		  `id` INT NOT NULL PRIMARY KEY,
		  `name` varchar(50) NOT NULL
		) ;

		CREATE TABLE `product` (
		  `id` INT NOT NULL PRIMARY KEY,
		  `name` varchar(50) NOT NULL,
		  `Product_type` INT NOT NULL,
		  `price` INT NOT NULL,
		  FOREIGN KEY (Product_type) REFERENCES product_type(id)
		) ;

		CREATE TABLE `farm_location` (
		  `farmer_id` INT NOT NULL, 
		  `location_id` INT ,
		  FOREIGN KEY (farmer_id) REFERENCES `user`(id),
		  FOREIGN KEY (location_id) REFERENCES location(id)
		) ;

		-- --------------------------------------------------------

		--
		-- Table structure for table `farm_price`
		--

		CREATE TABLE `farmer_Product` (
		  `product_id` INT NOT NULL,
		  `farmer_id` INT ,
		  FOREIGN KEY (farmer_id) REFERENCES `user`(id),
		  FOREIGN KEY (product_id) REFERENCES product(id)
		) ;



		-- --------------------------------------------------------

		--
		-- Table structure for table `payment_options`
		--

		CREATE TABLE `payment_options` (
		  `id` INT NOT NULL PRIMARY KEY,
		  `name` varchar(50) NOT NULL
		) ;


		CREATE TABLE `cart` (
		  `Cart_Number` INT NOT NULL PRIMARY KEY,
		  `user_id` INT NOT NULL,
		  `purch_date`	DATE  NOT NULL,
		  `payment_option` INT ,
		  `Deli_comp_id` int,
		  `Deli_date` DATE NOT NUll,
		  `Deli_loca` int,
		  FOREIGN KEY (user_id) REFERENCES `user`(id),
		  FOREIGN KEY (Deli_comp_id) REFERENCES user(id),
		  FOREIGN KEY (Deli_loca) REFERENCES location(id),
		  FOREIGN KEY (payment_option) REFERENCES payment_options(id)
		  
		);

		CREATE TABLE `purchase` (
		  `product_id` INT NOT NULL,
		  `Cart_number` INT NOT NULL,
		  FOREIGN KEY (Cart_number) REFERENCES cart(Cart_Number),
		  FOREIGN KEY (product_id) REFERENCES product(id)
		  
		);



