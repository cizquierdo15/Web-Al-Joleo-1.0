drop database if exists alJoleoDb;
--
create database alJoleoDb;
use alJoleoDb;

--

drop table if exists usuarios;
drop table if exists mesa;
drop table if exists reserva;

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (


  `id_usuario` int(11) NOT NULL auto_increment,
  `login` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20),
  `email` varchar(50) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `tlf` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
primary key (id_usuario)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 


--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (

`id_reserva` int(11) NOT NULL,
`fecha_reserva` datetime NOT NULL DEFAULT current_timestamp(),
`fecha_comida` datetime NOT NULL,
`estado_reserva` varchar(20),
`mensaje_reserva` varchar(100),
`n_usuario` varchar(20),
`id_usuario` int(11) NOT NULL,



primary key (id_reserva),
foreign key(id_usuario) references usuarios (id_usuario));


CREATE TABLE `menu` (

 `id_plato` int(11) NOT NULL auto_increment,
 `tipo` varchar(20) NOT NULL,
 `nombre` varchar(100) NOT NULL,
 `precio` float(20) NOT NULL,
 `alergenos` varchar(100) NOT NULL,
 `descripcion` varchar(100),

 

primary key (id_plato)
);

insert into usuarios values(0,'Admin','Administrador','Jefe','admin@jefazo.com','2428c30c4d8fe82eb82bd3257d17ed104ed56f84fdf8b15bb7f77f4606fca71762a8657a5e3885324aa0f154ceb804103d02853cd114aae0dfb6b2848723e6e3','635906533',2);

insert into menu values(1,"entrante","Sopa/Salmorejo",4,"ninguno","(Fresquito y delicioso)");
insert into menu values(2,"entrante","Ensalada mixta",4,"nose","(rica y de la huerta)");
insert into menu values(3,"entrante","Ensalada Al-Joleo",8,"frutos secos","(queso de cabra,nueces,vinagreta,mostaza-miel)");
insert into menu values(4,"entrante","Ensalada mediterranea de aguacate",8,"nose","(tomate,aguacate,aceitunas negras)");
insert into menu values(5,"entrante","Berenjenas a la miel",8,"nose","(Bien dulzonas)");
insert into menu values(6,"entrante","Tabla de ibericos",12.5,"nose","(queso Capri,salchichón iberico,chorizo iberico y lomo iberico)");

insert into menu values(7,"carne","Pestorejos",8,"nose","(oreja de cerdo crujiente con ajo y perejil)");
insert into menu values(8,"carne","Carrilleras de cerdo",10,"nose","(Deliciosas!)");
insert into menu values(9,"carne","Solomillo de cerdo",12,"nose","(A la brasa/Al ajo tostado/En salsa de pimienta/A la naranja)");
insert into menu values(10,"carne","Secreto de cerdo iberico",14,"nose","(Iberico del bueno)");
insert into menu values(11,"carne","Churrasco de ternera",11,"nose","(De las mejores carnes de la provincia)");
insert into menu values(12,"carne","Chuleton de ternera",18,"nose","(800gr aprox)");

insert into menu values(13,"especialidades","Mazorca de maiz a la brasa",3,"nose","(riquisimaaaa!)");
insert into menu values(14,"especialidades","Bacalao a la dorada / a la nata",10,"nose","(para chuparse los dedos)");
insert into menu values(15,"especialidades","Arepas",9,"nose","(rellenas de aguacate,tomate y rulo de cabra)");
insert into menu values(16,"especialidades","Huevos de corral con fariñera",8,"nose","(De gallinas libres)");
insert into menu values(17,"especialidades","Caldereta de cabrito",14,"nose","(racion)");

insert into menu values(18,"pescado","Salmon",11,"marisco","(A la brasa / Con salsa de naranja)");
insert into menu values(19,"pescado","Bacalao",12,"marisco","(Lomo de bacalao a la brasa)");
insert into menu values(20,"pescado","Gambones",12,"marisco","(10 unidades)");
insert into menu values(21,"pescado","Pulpo",15,"marisco","(A la brasa aromatizado con aceite y cilantro)");

insert into menu values(22,"encargo","Cochinillo al horno de leña",19,"nose","(Racion)");
insert into menu values(23,"encargo","Cochinillo al horno de leña",55,"nose","(Medio cochinillo)");
insert into menu values(24,"encargo","Cochinillo al horno de leña",100,"nose","(Cochinillo entero)");
insert into menu values(25,"encargo","Buche con arroz y coles",12,"nose","(Precio por persona)");
insert into menu values(26,"encargo","Arroz de liebre",11,"nose","(Precio por persona)");
insert into menu values(27,"encargo","Arroz de mariscos",12,"marisco","(Precio por persona)");
insert into menu values(28,"encargo","Chanfaina",13,"nose","(Racion)");
insert into menu values(29,"encargo","Chuletillas de cabrito",15,"nose","(Racion)");

insert into menu values(30,"postre","Tarta de queso",3.5,"Lactosa","(Casera!)");
insert into menu values(31,"postre","Serradura casera",3.5,"Lactosa","(Tipico postre portugues)");
insert into menu values(32,"postre","Dulce de membrillo casero con nata y nueces",3.5,"Lactosa y frutos secos","(Un clasico de ayer y de hoy)");
insert into menu values(33,"postre","Copa de helado especial con nata y nueces",3.5,"Lactosa y frutos secos","(Casera!)");


insert into reserva values(0,"--","","libre","","",0);
insert into reserva values(1,"--","","libre","","",0);
insert into reserva values(2,"--","","libre","","",0);
insert into reserva values(3,"--","","libre","","",0);
insert into reserva values(4,"--","","libre","","",0);
insert into reserva values(5,"--","","libre","","",0);
insert into reserva values(6,"--","","libre","","",0);
insert into reserva values(7,"--","","libre","","",0);
insert into reserva values(8,"--","","libre","","",0);

