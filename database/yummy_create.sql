--Delete tables if they already exist
drop view if exists Client; 
drop view if exists Courier; 
drop view if exists CompleteOrders; 
drop table if exists Favourite; 
drop table if exists User; 
drop table if exists Products_Orders;
drop table if exists Orders;
drop table if exists Product;
drop table if exists Review;
drop table if exists RestaurantCategory;
drop table if exists Category;
drop table if exists Restaurant;
drop table if exists Reply; 


create view Client as 
    select id_user
    from User 
    where user_type = 'C'; 


create view Courier as 
    select id_user 
    from User
    where user_type = "E"; 

create view CompleteOrders as
    select *
    from Products_Orders, Orders, Restaurant;


CREATE TABLE User (
    id_user INTEGER PRIMARY KEY, 
    username VARCHAR, 
    password VARCHAR, 
    address VARCHAR, 
    phone_number VARCHAR, 
    email VARCHAR, 
    age INTEGER, 
    bio VARCHAR, 
    user_type CHAR, --'O' (restaurant owner) ; 'C' (client) ; 'E' (courier)
    UNIQUE(username),
    constraint user_type_matches check (user_type IN ('O', 'C', 'E'))
); 

CREATE TABLE Restaurant (
    id_restaurant INTEGER PRIMARY KEY,
    name VARCHAR, 
    phone VARCHAR, 
    location VARCHAR, 
    openingTime TIME, 
    closingTime TIME,
    owner VARCHAR REFERENCES User(id_user)
);

CREATE TABLE Category (
   id_category INTEGER PRIMARY KEY,
   name VARCHAR
   --img_file VARCHAR
);

CREATE TABLE RestaurantCategory (
    id_restaurant INTEGER REFERENCES Restaurant(id_restaurant), 
    id_category VARCHAR REFERENCES Category(id_category), 
    PRIMARY KEY(id_restaurant, id_category)
);

CREATE TABLE Product (
    id_product INTEGER PRIMARY KEY,
    name VARCHAR, 
    price DOUBLE PRECISION, 
    discount INTEGER, 
    id_restaurant INTEGER REFERENCES Restaurant(id_restaurant),
    constraint Discount_0_to_100 check (discount <= 100 AND discount >= 0)
);

CREATE TABLE Orders (
    id_order INTEGER PRIMARY KEY,
    status VARCHAR, --might try something with enum
    dateStart DATETIME, 
    dateEnd DATETIME,
    id_client INTEGER REFERENCES User(id_user),
    id_courier INTEGER REFERENCES User(id_user),
    constraint Order_Status_Matches check (status IN ('RECEIVED', 'PREPARING', 'READY', 'DELIVERED'))
);

CREATE TABLE Products_Orders (
    id_product VARCHAR REFERENCES Product(id_product), 
    id_order INTEGER REFERENCES Orders(id_order), 
    PRIMARY KEY(id_product, id_order)
);

CREATE TABLE Review (
    id_review INTEGER PRIMARY KEY,
    id_client INTEGER REFERENCES User(id_user), 
    id_restaurant INTEGER REFERENCES Restaurant(id_restaurant), 
    rating INTEGER, 
    price INTEGER, 
    comment VARCHAR
    --maybe we should tell the id_client and id_restaurant to be unique (together)
);

CREATE TABLE Reply (
    id_replier INTEGER REFERENCES User(id_user), 
    id_review INTEGER REFERENCES Review(id_review),
    reply VARCHAR, 
    PRIMARY KEY(id_replier, id_review)
); 

CREATE TABLE Favourite (
    id_user INTEGER,
    idrestaurant INTEGER 
); 

