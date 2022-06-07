PRAGMA foreign_keys = on; 

--Restaurant owner
insert into User values(1, 'rubenarruada', 'abba', 'Rua das Camélias', 932471824, 'rubenarruada@gmail.com', 43, 'I am good at what I make. Surf is my passion :)', 'O');
insert into User values(2, 'anamarota', 'abba', 'Rua das Passagens', 932471824, 'anamarota@gmail.com', 24, 'Live your best life xoxo', 'O');
insert into User values(3, 'ritaferro', 'abba', 'Rua das Graves', 924854125, 'ritaferro@outlook.com', 32, 'What is life without dogs? Just think', 'O');
insert into User values(4, 'zedopipo', 'abba', 'Rua dos Bispos', 921451218, 'zedopipo@gmail.com', 54, 'Adoro ir a tascas e comer muitas tapas! A vida é boa...', 'O');
insert into User values(5, 'andreferreira', 'abba', 'Rua das Freiras', 932458212, 'andreferreira@outlook.com', 30, 'Vendo o mar...', 'O');
insert into User values(6, 'joaodireito', 'abba', 'Avenida do Bairro', 912457821, 'joaodireito@office.com', 53, 'Adoro comer chinês e às vezes um indiano!', 'O');
insert into User values(7, 'marianacustodio', 'abba', 'Rua do Padrasto', 924785694, 'marianacustodio@yahoo.com', 47, 'Uma boa companhia é sempre apreciável!', 'O');
insert into User values(8, 'luisrebento', 'abba', 'Avenida Lisboa', 919123564, 'luisrebento@gmail.com', 22, 'Não há nada que eu aprecie mais nesta vida que futebol. Adoro os meus gatos.', 'O');

--Client
insert into User values(9, 'andresantos', 'abba', 'Rua de Camões', 963145278, 'andresantos@gmail.com', 20, 'Adoro carros, mas melhor que carros só comida!', 'C'); 
insert into User values(10, 'cellopedro', 'abba', 'Rua de Sagres', 963145278, 'cellopedro@outlook.com', 40, 'Basket deveria ser mais que um desporto! Viva à Fast Food', 'C');
insert into User values(11, 'ruiramiro', 'abba', 'Rua de Serpentes', 963145278, 'ruiramiro@gmail.com', 64, 'Gosto de um bom passeio na paraia. Nada como um bom Marisco', 'C');
insert into User values(12, 'ruisantos', 'abba', 'Rua de Portugal', 963145278, 'ruisantos@poutlook.com', 43, 'Gosto de ver TV e socializar com a minha sogra', 'C');
insert into User values(13, 'patriciavieira', 'abba', 'Rua do Porto', 963145278, 'patriciavieira@outlook.com', 37, 'Always strive for more, life is crazy', 'C');
insert into User values(14, 'rosamarques', 'abba', 'Rua de Lisboa', 963145278, 'rosamarques@gmail.com', 43, 'Life is too short not to learn about Chemistry', 'C');
insert into User values(15, 'miguelarruada', 'abba', 'Rua de Trancos', 963145278, 'miguelarruada@gmail.com', 29, 'Vivo a vida à Tom Sawyer e mais não é preciso dizer! ;)', 'C');
insert into User values(16, 'chamicosantos', 'abba', 'Rua do Camilo', 963145278, 'chamicosantos@finance.com', 34, 'Sou simples, vivo ainda mais simplesmente...', 'C');

--Courier
insert into User values(17, 'ritaroda', 'abba', 'Rua de Camões', 963145278, 'ritaroda@gmail.com', 22, 'Engenharia é a minha vida e andar de mota em part-time o meu hobbie!', 'E'); 
insert into User values(18, 'joaobezugo', 'abba', 'Rua de Sagres', 963145278, 'joaobezugo@gmail.com', 34, 'Speed, I am Speed! Melhor entregador de sempre', 'E');
insert into User values(19, 'matildecamelia', 'abba', 'Rua de Serpentes', 963145278, 'matildecamelia@yahoo.com', 56, 'Adoro fazer as pessoas felizes e comer é o meu passatempo preferido', 'E');
insert into User values(20, 'ruisantos365', 'abba', 'Rua de Portugal', 963145278, 'ruisantos365@office365.com', 32, 'Sou o maior aficionado por motas, a obcessão é real, eu juro...', 'E');
insert into User values(21, 'patricksantos', 'abba', 'Rua do Porto', 963145278, 'patricksantos@gmail.com', 70, 'Faço entregas desde que tenho 20 anos, sempre foi o meu trabalho de sonho...', 'E');
insert into User values(22, 'rosanamarques', 'abba', 'Rua de Lisboa', 963145278, 'rosanamarques@live.com', 36, 'Melhores anos da minha vida são os loucos 30s! Um brinde à vida!', 'E');
insert into User values(23, 'fernandomota', 'abba', 'Rua de Trancos', 963145278, 'fernandomota@gmail.com', 38, 'Divirto-me a fazer entregas e os meus clientes apreciam', 'E');
insert into User values(24, 'pprunner', 'abba', 'Rua do Camilo', 963145278, 'pprunner@outlook.com', 20, 'Sou estafeta para ajudar a pagar os estudos! Vida dura, mas um dia compensará...', 'E');


insert into Restaurant values (1, 'Grelha do Manuel', '932659956', 'Porto', '22:30', '23:00', 1); 
insert into Restaurant values (2, 'Hamburgueres do Carlos', '932828456', 'Porto', '8:30', '23:00', 2);
insert into Restaurant values (3, 'Grelha do Aníbal', '937468123', 'Porto', '9:00', '23:00', 3);
insert into Restaurant values (4, 'Restaurante do Pedro', '912345723', 'Porto', '8:00', '24:00', 4);
insert into Restaurant values (5, 'Roulote da Vânia', '928754321', 'Porto', '8:00', '23:00', 5);
insert into Restaurant values (6, 'Pizzaria Vasco', '910045769', 'Porto', '8:00', '23:00', 6);
insert into Restaurant values (7, 'Sushiaria', '923465782', 'Porto', '8:00', '23:00', 7);
insert into Restaurant values (8, 'Xi-Yuan', '933325648', 'Vila Nova de Gaia', '8:00', '23:00', 8);

insert into Favourite values(9, 1); 
insert into Favourite values(9, 2); 
insert into Favourite values(10, 5); 
insert into Favourite values(11, 8); 
insert into Favourite values(13, 3); 
insert into Favourite values(15, 5); 
insert into Favourite values(16, 7); 
insert into Favourite values(16, 8); 
insert into Favourite values(14, 4); 
insert into Favourite values(11, 5); 

insert into Review values(1, 10, 1, 5, 3, 'Very Good Restaurant', 'Thank your for your feedback! Hope seeing you soon');
insert into Review values(2, 11, 3, 4, 5, 'A bit expensive but very good overall', 'Thank you for your review! We promise we will build on that!'); 
insert into Review values(3, 12, 2, 3, 3, 'Was expecting a fairly better service...', 'We are sorry to hear that... Come here one more time and your wont regret it'); 
insert into Review values(4, 13, 4, 5, 5, 'Expensive but definitely worth the buck!', 'Great review! Thanks!'); 
insert into Review values(5, 14, 5, 4, 2, 'Very good and very cheap, what a finding this was!', 'Great review! Thanks!'); 
insert into Review values(6, 15, 6, 3, 5, 'A bit expensive for what it is worth but good', 'We are delighted to hear that from you!'); 
insert into Review values(7, 15, 8, 5, 2, 'I am amazed, chinese food culture at its finest! Wow', 'More than glad that you liked it! There is no such thing as chinese culture and you know it :)');  
insert into Review values(8, 9, 1, 4, 3, 'Nice and Confortable Restaurant', '');
insert into Review values(9, 11, 1, 4, 5, "It's a nice Restaurant, but it's waaay too expensive!", '');
insert into Review values(10, 12, 1, 1, 3, "The Food was cold, and the restaurant was very dirty overall.", '');


insert into Category values(1, 'Pizza'); 
insert into Category values(2, 'Hamburger');
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

insert into Orders values(1, 'RECEIVED', '02/05/2022 10:50:00', '', 9, 17); 
insert into Orders values(2, 'PREPARING', '01/05/2022 11:50:00', '', 9, NULL); 
insert into Orders values(3, 'READY', '02/05/2022 10:45:00', '', 9, NULL); 
insert into Orders values(4, 'READY', '01/05/2022 10:50:00', '', 10, 24); 
insert into Orders values(5, 'DELIVERED', '21/04/2022 12:50:00', '21/04/2022 14:00:00', 13, 19); 
insert into Orders values(6, 'DELIVERED', '12/04/2022 11:50:00', '12/04/2022 13:00:00', 13, 20); 
insert into Orders values(7, 'PREPARING', '19/04/2022 9:50:00', '', 14, NULL); 
insert into Orders values(8, 'RECEIVED', '20/04/2022 10:30:00', '', 15, 21); 

insert into Products_Orders values(5, 1, 1);
insert into Products_Orders values(6, 1, 2);
insert into Products_Orders values(8, 1, 3);
insert into Products_Orders values(14, 2, 1);  
insert into Products_Orders values(12, 2, 1);
insert into Products_Orders values(26, 3, 2);
insert into Products_Orders values(25, 3, 1);
insert into Products_Orders values(27, 3, 1);
insert into Products_Orders values(1, 4, 2);
insert into Products_Orders values(3, 4, 1);
insert into Products_Orders values(26, 5, 2);
insert into Products_Orders values(27, 5, 1);
insert into Products_Orders values(25, 6, 1);
insert into Products_Orders values(26, 6, 2);
insert into Products_Orders values(5, 7, 3);
insert into Products_Orders values(8, 7, 1);
insert into Products_Orders values(17, 8, 1);