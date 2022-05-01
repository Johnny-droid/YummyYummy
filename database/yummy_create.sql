drop table if exists RestaurantOwner;
drop table if exists Client;
drop table if exists Restaurant;
drop table if exists Category;
drop table if exists RestaurantCategory;
drop table if exists Product;
drop table if exists Order;
drop table if exists Products_Orders;
drop table if exists Review;


CREATE TABLE RestaurantOwner (
    id_restaurant_owner INTEGER PRIMARY KEY,
    username VARCHAR, 
    password VARCHAR, 
    address VARCHAR, 
    phone VARCHAR
);

CREATE TABLE Client (
    id_client INTEGER PRIMARY KEY,
    username VARCHAR, 
    password VARCHAR, 
    address VARCHAR, 
    phone_number VARCHAR
);

CREATE TABLE Restaurant (
    id_restaurant INTEGER PRIMARY KEY,
    name VARCHAR, 
    phone VARCHAR, 
    location VARCHAR, 
    openingTime TIME, 
    closingTime TIME,
    owner VARCHAR REFERENCES RestaurantOwner(id_restaurant_owner)
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

CREATE TABLE Order (
    id_order INTEGER PRIMARY KEY, 
    status VARCHAR, --might try something with enum
    dateStart TIME, 
    dateEnd TIME,
    id_client INTEGER REFERENCES Client(id_client)
);

CREATE TABLE Products_Orders (
    id_product VARCHAR REFERENCES Product(id_product), 
    id_order INTEGER REFERENCES Order(id_order), 
    PRIMARY KEY(id_product, id_order)
);

CREATE TABLE Review (
    id_client VARCHAR REFERENCES Client(id_client), 
    id_restaurant VARCHAR REFERENCES Restaurant(id_restaurant), 
    rating INTEGER, 
    price INTEGER, 
    comment VARCHAR,
    PRIMARY KEY(id_client, id_restaurant)
);