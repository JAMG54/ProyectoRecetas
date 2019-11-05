drop database if exists RecetarioFinal;
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
contrasenia varchar(50) not null,
ocupacion varchar(50) not null,
Validado int not null
);

create table Receta (
id_receta int not null,
Nombre_Platillo varchar(50) not null,
Origen int not null,
Tipo_Platillo int not null,
Foto_Receta longblob not null,
Autor_receta int not null
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
id_receta int not null,
calificacion int not null
);

create table Calificacion_gusto (
id_receta int not null,
calificacion int not null
);

create table foto_usuario (
id_usuario int not null,
foto_perfil longblob not null
);

create table descripcion_usuario (
id_usuario int not null,
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

create table Administrador (
id_admi int not null,
Nombre varchar (50) not null,
Apellido_paterno varchar (45) not null,
Apellido_materno varchar (45) not null,
Correo_electronico varchar (50) not null
);

alter table Usuario_Registrado add primary key(id_usuario);
alter table Receta add primary key(id_receta);
alter table Ingredientes add primary key(id_ingrediente);
alter table Rel_Ingrediente_Receta add primary key(id_relacion);
alter table Instrucciones_Receta add primary key(id_instruccion);
alter table Estados add primary key (id_estado);
alter table tipo_platillo add primary key (id_platillo);



alter table usuario_registrado add foreign key (Estado_Procedencia) references Estados (id_estado) on delete cascade on update  cascade;
alter table receta add foreign key (Origen) references estados (id_estado) on delete cascade on update cascade;
alter table receta add foreign key (Tipo_Platillo) references tipo_platillo (id_platillo) on delete cascade on update cascade;
alter table Rel_Ingrediente_Receta add foreign key (id_receta) references Receta (id_receta) on delete cascade on update cascade;
alter table Rel_Ingrediente_Receta add foreign key (id_ingrediente) references Ingredientes (id_ingrediente) on delete cascade on update cascade;
alter table Calificacion_gusto add foreign key (id_receta) references Receta (id_receta) on delete cascade on update cascade;
alter table Calificacion_origenMX add foreign key (id_receta) references Receta (id_Receta) on delete cascade on update cascade;
alter table instrucciones_receta add foreign key (id_receta) references Receta (id_receta) on delete cascade on update cascade;
alter table receta add foreign key (Autor_receta) references usuario_registrado (id_usuario) on delete cascade on update  cascade;
alter table foto_usuario add foreign key (id_usuario) references usuario_registrado (id_usuario) on delete cascade on update cascade;
alter table descripcion_usuario add foreign key (id_usuario) references usuario_registrado (id_usuario) on delete cascade on update cascade;


insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (1, "Desayuno");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (2, "Almuerzo");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (3, "Cena");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (4, "Merienda");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (5, "Bebida");
insert into Tipo_Platillo (id_platillo,Nombre_platillo) values (6, "Postre");

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


#Procedimientos almacenados Molina******

#*************Registrar Usuario.

	drop procedure if exists registrarUsuario;
	delimiter **

	create procedure registrarUsuario(nombreUsr varchar(50),paterno varchar(50), materno varchar(50), edad int, correo  varchar(50), estado int,clave varchar(50),ocupacionUsr varchar(50))
	begin								
		declare mensaje varchar(100); # es para devolver un mensaje en función de lo que pase en el procedure
		declare identificador int;
		declare existencia int;
		
		set mensaje = "";
			#para este ejemplo verificamos que no haya usuarios con el mismo nombre en la bd
		set existencia=(select count(*) from Usuario_Registrado where Correo_electronico=correo); 
			
			#esto es un switch
			case(existencia)
				when 1 then
					set mensaje="0";
				when 0 then
					set identificador=(select ifnull(max(id_usuario),0)+1 from Usuario_Registrado);
					insert into Usuario_Registrado values(identificador,nombreUsr,paterno,materno,edad,correo,estado,md5(clave),ocupacionUsr,0);
					insert into descripcion_usuario values(identificador," ");
					set mensaje=identificador;
			end case;
			select mensaje as respuesta; #seleccionamos el mesaje (es equivalente a return mensaje)
	end;**
	delimiter ;

drop procedure if exists validarCuenta;
delimiter **

#********Validar cuenta.
	create procedure validarCuenta(idUser int)
	begin								
		update Usuario_Registrado set validado=1 where id_usuario=idUser;
	end;**
	delimiter ;

#**********Obtener Informacion del perfil
	drop procedure if exists obtenerInformacionPersonal;
	delimiter **
	create procedure obtenerInformacionPersonal(idUser int)
	begin								
		select * from usuario_registrado inner join descripcion_usuario on usuario_registrado.id_usuario=descripcion_usuario.id_usuario;
	end;**
	delimiter ;

#**********Actualizar informacion
	
	drop procedure if exists actualizarInformacion;
	delimiter **
	create procedure actualizarInformacion(idUser int,nombreUsr varchar(50),paterno varchar(50), materno varchar(50), edadUs int, correo  varchar(50), estado int,ocupacionUsr varchar(50),descripcion varchar(300))
	begin	
		declare mensaje varchar(100);
		update usuario_registrado set Nombre=nombreUsr,Apellido_Paterno=paterno,Apellido_Materno=materno,Edad=edadUs,Correo_electronico=correo,Estado_Procedencia=estado,ocupacion=ocupacionUsr where id_usuario=idUser;
		update descripcion_usuario set descripcion_personal=descripcion where id_usuario=idUser;
		set mensaje="Datos actualizados.";
        select mensaje as respuesta;
    end;**
	delimiter ;

