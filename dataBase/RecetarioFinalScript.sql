
create database RecetarioFinal;

use RecetarioFinal;

create table Usuario_Registrado (
id_usuario int not null ,
Nombre varchar(50),
Apellido_Paterno varchar(50) not null,
Apellido_Materno varchar(50) not null,
Edad int not null,
Correo_electronico varchar(50) not null,
Estado_Procedencia int not null,
Validado int not null
);

create table Receta (
id_receta int not null,
Nombre_Platillo varchar(50) not null,
Origen int not null,
Tipo_Platillo int not null,
Foto_Receta longblob not null
);

create table Ingredientes (
id_ingrediente int not null,
Nomnbre_Ingrediente varchar(50) not null
);

create table Rel_Ingrediente_Receta (
id_relacion int not null,
id_receta int not null, 
id_ingrediente int not null,
cantidad int not null
);

create table Calificacion_origenMX (
calificacion int not null,
id_receta int not null
);

create table Calificacion_gusto (
calificacion int not null,
id_receta int not null
);

create table Configuracion_Personal (
id_usuario int not null,
foto_perfil longblob not null,
descripcion_personal varchar(300) not null
);

create table Estados (
id_estado int not null,
Nombre_estado varchar(45) not null
);

create table Tipo_platillo (
id_platillo int not null,
Nombre_platillo varchar(45) not null
);

create table Instrucciones_Receta (
id_instruccion int not null,
id_receta int not null,
Instruccion varchar(300) not null,
No_paso int not null
);

alter table Usuario_Registrado add primary key(id_usuario);
alter table Receta add primary key(id_receta);
alter table Ingredientes add primary key(id_ingrediente);
alter table Rel_Ingrediente_Receta add primary key(id_relacion);
alter table Instrucciones_Receta add primary key(id_instruccion);

alter table Estados add foreign key (id_estado) references usuario_registrado (Estado_Procedencia) on delete cascade on update  cascade;
alter table Estados add foreign key (id_estado) references Receta (Origen) on delete cascade on update cascade;
alter table tipo_platillo add foreign key (id_platillo) references Receta (Tipo_platillo) on delete cascade on update cascade;
alter table Rel_Ingrediente_Receta add foreign key (id_receta) references Receta (id_receta) on delete cascade on update cascade;
alter table Rel_Ingrediente_Receta add foreign key (id_ingrediente) references Ingredientes (id_ingrediente) on delete cascade on update cascade;
alter table calificacion_gusto add foreign key (id_receta) references Receta (id_receta) on delete cascade on update cascade;
alter table calificacion_origenmx add foreign key (id_receta) references Receta (id_receta) on delete cascade on update cascade;
alter table instrucciones_receta add foreign key (id_receta) references Receta (id_receta) on delete cascade on update cascade;
alter table configuracion_personal add foreign key (id_usuario) references usuario_registrado (id_usuario) on delete cascade on update cascade;


insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (1, "Desayuno");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (2, "Almuerzo");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (3, "Cena");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (4, "Merienda");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (5, "Bebida");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (6, "Postre");
select * from estados;
insert into Estados (id_estado, Nombre_Estado) values (1,"Aguascalientes");
insert into Estados (id_estado, Nombre_Estado) values (2,"Baja California");
insert into Estados (id_estado, Nombre_Estado) values (3,"Baja California Sur");
insert into Estados (id_estado, Nombre_Estado) values (4,"Campeche");
insert into Estados (id_estado, Nombre_Estado) values (5,"Coahuila de Zaragoza");
insert into Estados (id_estado, Nombre_Estado) values (6,"Colima");
insert into Estados (id_estado, Nombre_Estado) values (7,"Chiapas");
insert into Estados (id_estado, Nombre_Estado) values (8,"Chihuahua");
insert into Estados (id_estado, Nombre_Estado) values (9,"Ciudad de Mexico");
insert into Estados (id_estado, Nombre_Estado) values (10,"Durango");
insert into Estados (id_estado, Nombre_Estado) values (11,"Guanajuato");
insert into Estados (id_estado, Nombre_Estado) values (12,"Guerrero");
insert into Estados (id_estado, Nombre_Estado) values (13,"Hidalgo");
insert into Estados (id_estado, Nombre_Estado) values (14,"Jalisco");
insert into Estados (id_estado, Nombre_Estado) values (15,"Estado de Mexico");
insert into Estados (id_estado, Nombre_Estado) values (16,"Michoacan");
insert into Estados (id_estado, Nombre_Estado) values (17,"Morelos");
insert into Estados (id_estado, Nombre_Estado) values (18,"Nayarit");
insert into Estados (id_estado, Nombre_Estado) values (19,"Nuevo Leon");
insert into Estados (id_estado, Nombre_Estado) values (20,"Oaxaca");
insert into Estados (id_estado, Nombre_Estado) values (21,"Puebla");
insert into Estados (id_estado, Nombre_Estado) values (22,"Querétaro");
insert into Estados (id_estado, Nombre_Estado) values (23,"Quintana Roo");
insert into Estados (id_estado, Nombre_Estado) values (24,"San Luis Potosi");
insert into Estados (id_estado, Nombre_Estado) values (25,"Sinaloa");
insert into Estados (id_estado, Nombre_Estado) values (26,"Sonora");
insert into Estados (id_estado, Nombre_Estado) values (27,"Tabasco");
insert into Estados (id_estado, Nombre_Estado) values (28,"Tamaulipas");
insert into Estados (id_estado, Nombre_Estado) values (29,"Tlaxcala");
insert into Estados (id_estado, Nombre_Estado) values (30,"Veracruz ");
insert into Estados (id_estado, Nombre_Estado) values (31,"Yucatán");
insert into Estados (id_estado, Nombre_Estado) values (32,"Zacatecas");

