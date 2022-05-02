PRAGMA foreign_keys = on; 

insert into RestaurantOwner values(1, 'rubenarruada', 'abba', 'Rua das Camélias', 932471824);
insert into RestaurantOwner values(2, 'anamarota', 'abba', 'Rua das Passagens', 932471824);
insert into RestaurantOwner values(3, 'ritaferro', 'abba', 'Rua das Graves', 924854125);
insert into RestaurantOwner values(4, 'zedopipo', 'abba', 'Rua dos Bispos', 921451218);
insert into RestaurantOwner values(5, 'andreferreira', 'abba', 'Rua das Freiras', 932458212);
insert into RestaurantOwner values(6, 'joaodireito', 'abba', 'Avenida do Bairro', 912457821);
insert into RestaurantOwner values(7, 'marianacustodio', 'abba', 'Rua do Padrasto', 924785694);
insert into RestaurantOwner values(8, 'luisrebento', 'abba', 'Avenida Lisboa', 919123564);

insert into Restaurant values (1, 'Grelha do Manuel', '932659956', 'Porto', '08:00', '23:00', 1); 
insert into Restaurant values (2, 'Hamburgueres do Carlos', '932828456', 'Porto', '8:30', '23:00', 2);
insert into Restaurant values (3, 'Grelha do Aníbal', '937468123', 'Porto', '9:00', '23:00', 3);
insert into Restaurant values (4, 'Restaurante do Pedro', '912345723', 'Porto', '8:00', '24:00', 4);
insert into Restaurant values (5, 'Roulote da Vânia', '928754321', 'Porto', '8:00', '23:00', 5);
insert into Restaurant values (6, 'Pizzaria Vasco', '910045769', 'Porto', '8:00', '23:00', 6);
insert into Restaurant values (7, 'Sushiaria', '923465782', 'Porto', '8:00', '23:00', 7);
insert into Restaurant values (8, 'Xi-Yuan', '933325648', 'Vila Nova de Gaia', '8:00', '23:00', 8);

insert into Client values(1, 'andresantos', 'abba', 'Rua de Camões', 963145278); 
insert into Client values(2, 'cellopedro', 'abba', 'Rua de Sagres', 963145278);
insert into Client values(3, 'ruiramiro', 'abba', 'Rua de Serpentes', 963145278);
insert into Client values(4, 'ruisantos', 'abba', 'Rua de Portugal', 963145278);
insert into Client values(5, 'patriciavieira', 'abba', 'Rua do Porto', 963145278);
insert into Client values(6, 'rosamarques', 'abba', 'Rua de Lisboa', 963145278);
insert into Client values(7, 'miguelarruada', 'abba', 'Rua de Trancos', 963145278);
insert into Client values(8, 'chamicosantos', 'abba', 'Rua do Camilo', 963145278);

insert into Review values(1, 1, 5, 3, 'Very Good Restaurant');
insert into Review values(2, 3, 4, 5, 'A bit expensive but very good overall'); 
insert into Review values(1, 2, 3, 3, 'Was expecting a fairly better service...'); 
insert into Review values(3, 4, 5, 5, 'Expensive but definitely worth the buck!'); 
insert into Review values(4, 5, 4, 2, 'Very good and very cheap, what a finding this was!'); 
insert into Review values(5, 6, 3, 5, 'A bit expensive for what it is worth but good'); 
insert into Review values(8, 8, 5, 2, 'I am amazed, chinese food culture at its finest! Wow');  

insert into Category values(1, 'Pizza'); 
insert into Category values(2, 'Hamburguer');
insert into Category values(3, 'Sushi');
insert into Category values(4, 'Asian');
insert into Category values(5, 'Fast Food');
insert into Category values(6, 'Kebab');
insert into Category values(7, 'Vegan');
insert into Category values(8, 'Italian');
insert into Category values(9, 'Taco');
insert into Category values(10, 'Hot Dog');

insert into RestaurantCategory values(1, 8); 
insert into RestaurantCategory values(1, 7);  
insert into RestaurantCategory values(2, 2); 
insert into RestaurantCategory values(2, 5);
insert into RestaurantCategory values(3, 7); 
insert into RestaurantCategory values(3, 8);
insert into RestaurantCategory values(4, 4);
insert into RestaurantCategory values(5, 8); 
insert into RestaurantCategory values(6, 1); 
insert into RestaurantCategory values(6, 5); 
insert into RestaurantCategory values(7, 4); 
insert into RestaurantCategory values(7, 3); 
insert into RestaurantCategory values(8, 4); 

insert into Product values(1, 'Peixe Grelhado', 10.50, 10, 1); 
insert into Product values(2, 'Peixe Assado', 8.50, 0, 1); 
insert into Product values(3, 'Carne Assada', 11.50, 0, 1); 
insert into Product values(4, 'Bife da Vazia', 9, 10, 1); 
insert into Product values(5, 'Hamburguer do Caco', 10.50, 0, 2); 
insert into Product values(6, 'Hamburguer com Tomate', 7.50, 0, 2); 
insert into Product values(7, 'Hamburguer Vegan', 9.50, 25, 2); 
insert into Product values(8, 'Hamburguer de Vitela', 10.50, 0, 2); 
insert into Product values(9, 'Tripas à Moda do Porto', 10.50, 0, 3); 
insert into Product values(10, 'Fígado de Cebolada', 11.50, 0, 3); 
insert into Product values(11, 'Bacalhau à Moda de Braga', 10, 15, 3); 
insert into Product values(12, 'Gua Bao', 7.45, 0, 4); 
insert into Product values(13, 'Pho', 10.50, 0, 4); 
insert into Product values(14, 'Som Tam Thai', 10.50, 0, 4); 
insert into Product values(15, 'Liangpi', 12.50, 0, 4); 
insert into Product values(16, 'Sardinhas Assadas', 9, 10, 5); 
insert into Product values(17, 'Peixe Gato', 10.50, 0, 5); 
insert into Product values(18, 'Bife à Maneira', 20.50, 0, 5); 
insert into Product values(19, 'Pizza de Ananás', 10.50, 0, 6); 
insert into Product values(20, 'Pizza Romana', 10.50, 0, 6); 
insert into Product values(21, 'Pizza de Queijo e Fiambre', 10.50, 0, 6); 
insert into Product values(22, 'Makizushi', 11, 15, 7); 
insert into Product values(23, 'Gunkan Maki', 15.50, 0, 7); 
insert into Product values(24, 'Nigiri', 30.50, 0, 7); 
insert into Product values(25, 'Gimbap', 10.50, 0, 8); 
insert into Product values(26, 'Miso Ramen', 10.50, 10, 8); 
insert into Product values(27, 'Satay', 5.50, 10, 8); 

insert into Orders values(1, 'RECEIVED', '20220502 10:50 AM', '', 1); 
insert into Orders values(2, 'PREPARING', '20220501 11:50 PM', '', 1); 
insert into Orders values(3, 'READY', '20220502 10:45 AM', '', 2); 
insert into Orders values(4, 'READY', '20220501 10:50 AM', '', 3); 
insert into Orders values(5, 'DELIVERED', '20220421 12:50 AM', '20220421 14:00 AM', 3); 
insert into Orders values(6, 'DELIVERED', '20220412 11:50 AM', '20220412 1:00 PM', 4); 
insert into Orders values(7, 'PREPARING', '20220419 9:50 PM', '', 7); 
insert into Orders values(8, 'RECEIVED', '20220420 10:30 AM', '', 8); 

insert into Products_Orders values(8, 1);
insert into Products_Orders values(13, 1);
insert into Products_Orders values(20, 1);
insert into Products_Orders values(7, 2);  
insert into Products_Orders values(12, 2);
insert into Products_Orders values(21, 3);
insert into Products_Orders values(25, 3);
insert into Products_Orders values(27, 3);
insert into Products_Orders values(1, 4);
insert into Products_Orders values(3, 4);
insert into Products_Orders values(5, 7);
insert into Products_Orders values(8, 7);
insert into Products_Orders values(17, 8);