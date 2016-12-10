CREATE TABLE departamento
(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
)
;


CREATE TABLE paquete
(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  cantUnidades INT UNSIGNED NOT NULL,
  PRIMARY KEY (id)
)
;


CREATE TABLE producto
(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  codigo VARCHAR(30),
  codigobarra VARCHAR(30),
  detalle VARCHAR(100),
  precioFabricaU DECIMAL(10,2),
  precioFabricaPack DECIMAL(10,2),
  imagen VARCHAR(200),
  precioUnidadVenta DECIMAL(10,2),
  precioPackinVenta DECIMAL(10,2),
  paquete_id INT UNSIGNED,
  depto_id INT UNSIGNED,
  PRIMARY KEY (id),
  KEY (depto_id,paquete_id)
)
;

ALTER TABLE producto ADD CONSTRAINT FK_producto_departamento
	FOREIGN KEY (depto_id) REFERENCES departamento (id)
;

ALTER TABLE producto ADD CONSTRAINT FK_producto_paquete
	FOREIGN KEY (paquete_id) REFERENCES paquete (id)
;
INSERT INTO departamento VALUES (1,'FLASH');
INSERT  INTO  departamento VALUEs (2,'AUDIFONO');
INSERT INTO paquete VALUES (1,'8');
INSERT INTO paquete VALUES (2,'12');
INSERT INTO paquete VALUES (3,'25');
//INSERT INTO  producto VALUES (1,'FLH234','','8GB',10,10,'',2,20,1,1);
CREATE TABLE cliente
(
	persona_id INT UNSIGNED NOT NULL,
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nit VARCHAR(15),
	fecha_creacion DATE NOT NULL,
	tipo_id INT UNSIGNED,
	PRIMARY KEY (id),
	KEY (persona_id),
	KEY (tipo_id)
)
;


CREATE TABLE empleado
(
	persona_id INT UNSIGNED NOT NULL,
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	correo VARCHAR(50),
	username VARCHAR(50),
	password VARCHAR(50),
	cargo_id INT UNSIGNED,
	PRIMARY KEY (id),
	KEY (cargo_id),
	KEY (persona_id)
)
;


CREATE TABLE genero
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	descripcion VARCHAR(9) NOT NULL,
	PRIMARY KEY (id)
)
;


CREATE TABLE persona
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	apellido VARCHAR(50),
	nombre VARCHAR(50),
	direccion VARCHAR(50),
	nacimiento DATE,
	genero_id INT UNSIGNED,
	PRIMARY KEY (id),
	KEY (genero_id),
	KEY (telefono_id)
)
;
CREATE TABLE imagen (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  url VARCHAR(50),
  producto_id int UNSIGNED,
  PRIMARY KEY (id),
  KEY (producto_id)
)
;
ALTER TABLE imagen ADD CONSTRAINT FK_imagen_producto
	FOREIGN KEY (producto_id) REFERENCES producto (id)
;


CREATE TABLE telefono
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	numero VARCHAR(8) NOT NULL,
	PRIMARY KEY (id)
)
;


CREATE TABLE tipo_cliente
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	descripcion VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
)
;
ALTER TABLE cliente ADD CONSTRAINT FK_cliente_persona
	FOREIGN KEY (persona_id) REFERENCES persona (id)
;

ALTER TABLE cliente ADD CONSTRAINT FK_cliente_tipo_cliente
	FOREIGN KEY (tipo_id) REFERENCES tipo_cliente (id)
;

ALTER TABLE empleado ADD CONSTRAINT FK_empleado_cargo
	FOREIGN KEY (cargo_id) REFERENCES cargo (id)
;

ALTER TABLE empleado ADD CONSTRAINT FK_empleado_persona
	FOREIGN KEY (persona_id) REFERENCES persona (id)
;

ALTER TABLE persona ADD CONSTRAINT FK_persona_genero
	FOREIGN KEY (genero_id) REFERENCES genero (id)
;


