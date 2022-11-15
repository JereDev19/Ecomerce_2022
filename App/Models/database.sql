/*
  Crea la tabla de Usuarios.
*/
CREATE TABLE User(
  id varchar(27) primary key,
  name varchar(20) not null,
  surname1 varchar(20) not null,
  surname2 varchar(20) not null,
  email varchar(50) unique,
  password varchar(60) not null,
  city varchar(30),
  street varchar(60),
  postalCode int(5),
  phone varchar(15)
);

/*
  Crea la tabla de usuarios sin confirmar.
*/
CREATE TABLE UnconfirmedUsers(
  id varchar(27) primary key,
  name varchar(20) not null,
  surname1 varchar(20) not null,
  surname2 varchar(20) not null,
  email varchar(50) unique,
  password varchar(60) not null,
  city varchar(30),
  street varchar(60),
  postalCode int(5),
  phone varchar(15)
);

/*
  Crea la tabla de Productos
*/
CREATE TABLE Products(
  id varchar(30) primary key,
  name varchar(30) not null,
  price int(20) not null,
  description varchar(200),
  discount int(3) not null,
  stock int(20) not null,
  image varchar(50),
  module varchar(30) not null
);

/*
  Crea la tabla de Módulos
*/
CREATE TABLE Modules(
  id varchar(30) primary key,
  name varchar(30) not null,
  description varchar(100) not null
);

/*
  Crea la tabla de los Permisos.
*/
CREATE TABLE Permissions(
  userEmail varchar(50) not null,
  permission varchar(50) primary key
);

/*
  Crea la tabla de Ingredientes.
*/
CREATE TABLE Ingredients(
  id varchar(30) primary key,
  name varchar(30) not null,
  stock int(10) not null,
  price int(10) not null
);

/*
  Crea la tabla de Recetas.
*/
CREATE TABLE Recipes(
  id varchar(30) primary key,
  name varchar(30) not null,
  description varchar(100) not null,
  ingredient varchar(20) not null
);

/*
  Crea la tabla de Órdenes.
*/
CREATE TABLE Orders(
  id varchar(30) primary key,
  name varchar(30) not null,
  event varchar(30) not null,
  date datetime not null,
  price int(10) not null,
  userEmail varchar(30) not null
);

/*
  Crea la tabla de contenidos para las órdenes.
*/
CREATE TABLE OrdersContent(
  orderId varchar(30),
  productId varchar(30),
  productAmount int(10)
);

/*
  Crea la tabla de Eventos.
*/
CREATE TABLE Events(
  id varchar(30) primary key,
  date date not null,
  start_time varchar(10),
  end_time varchar(10),
  address varchar(15)
);

/*
  Crea la tabla de los Puntos de Venta.
*/
CREATE TABLE SalesLocation(
  id varchar(30) primary key,
  address1 varchar(30) not null,
  address2 varchar(30) not null,
  city varchar(20) not null,
  postal int(8) not null
);

/*
  Crea la tabla de vendedores.
*/
CREATE TABLE Sellers(
  id varchar(30) primary key,
  company varchar(30) not null
);

/*
  Crea una tabla donde se guarden los carritos creados.
*/
CREATE TABLE Carts(
  cartId varchar(30) primary key,
  ownerEmail varchar(50) unique
);

/*
  Crea una tabla donde se establecen los contenidos de cada carrito.
*/
CREATE TABLE CartsContent(
  cartId varchar(30) not null,
  productId varchar(30) not null,
  productAmount int(5) not null
);

/*
  Crea una tabla donde se guarden los productos favoritos de cada usuario.
*/
CREATE TABLE FavouriteProducts(
  userEmail varchar(50) not null,
  productId varchar(30) not null
);

/*
  Crea una tabla donde se establecen las estrellas de los productos.
*/
CREATE TABLE ProductsStars(
  productId varchar(30) not null,
  userEmail varchar(50) not null,
  stars int(1) not null
);

/*
  Inserta un usuario para luego darle poderes administrativos y ser capaz de acceder a el
  panel administrativo.

  Correo: admin@infinuslight.com
  Contraseña: 1234
*/
insert into User values(
  'usr_633712c5249913.03071859',
  'Admin',
  'InfinusLight',
  '',
  'admin@infinuslight.com',
  '$2y$04$tDm2GC/A19sUBdtZ6La4au.l7B0orZCosJE3MyXwCVlheFFyPml3.',
  'Canelones',
  'Oficinas Infinus',
  '10000',
  '099999999'
);

/*
  Inserta un permiso de administrador a la cuenta con el correo 'admin@infinuslight.com'.
  Con esto podrás acceder al panel administrativo una vez logueado a la cuenta.
*/
insert into Permissions values(
  'admin@infinuslight.com',
  'admin'
);