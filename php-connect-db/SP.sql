CREATE OR REPLACE PROCEDURE `SP_MUESTRA_GENERO`()
	SELECT * FROM TBL_GENEROS 
    
CALL SP_MUESTRA_GENERO

CREATE OR REPLACE PROCEDURE `SP_MUESTRA_ESTATUS_EMPLEADO`()
	SELECT ID_ESTATUS_EMPLEADO, STATUS FROM TBL_ESTATUS_EMPLEADO

CALL SP_MUESTRA_ESTATUS_EMPLEADO


CREATE OR REPLACE PROCEDURE `SP_MUESTRA_ESTADO_CIVIL`()
	SELECT * FROM TBL_ESTADO_CIVIL 
    
CALL SP_MUESTRA_ESTADO_CIVIL

CREATE OR REPLACE PROCEDURE `SP_MUESTRA_SUCURSALES`()
	SELECT * FROM TBL_SUCURSALES
	
CALL SP_MUESTRA_SUCURSALES


CREATE OR REPLACE PROCEDURE `SP_MUESTRA_CARGOS`()
	SELECT * FROM TBL_CARGO_EMPLEADO

CALL SP_MUESTRA_CARGOS

CREATE OR REPLACE PROCEDURE `SP_MUESTRA_TITULACIONES`()
	SELECT * FROM TBL_TITULACIONES

CALL SP_MUESTRA_TITULACIONES

--SP INSERTA PERSONA
CREATE OR REPLACE PROCEDURE `SP_INSERTA_PERSONA`(IN NOMBRE_PERSONA VARCHAR(60), IN APELLIDO_PERSONA VARCHAR(60) ,IN ID_GENERO INT , IN ID_ESTADO_CIVIL INT , IN DNI VARCHAR(25) , IN FECHA_NACIMIENTO DATE , IN DIRECCION VARCHAR(150), IN TELEFONO VARCHAR(25), IN CELULAR VARCHAR(25))
	INSERT INTO TBL_PERSONAS
    (
        DNI,
        NOMBRE_PERSONA,
        APELLIDO_PERSONA,
        ID_GENERO,
        ID_ESTADO_CIVIL,
        FECHA_NACIMIENTO,
        DIRECCION,
        TELEFONO,
        CELULAR
   )
   VALUES 
   (
        DNI,
        NOMBRE_PERSONA,
        APELLIDO_PERSONA,
        ID_GENERO,
        ID_ESTADO_CIVIL,
        FECHA_NACIMIENTO,
        DIRECCION,
        TELEFONO,
        CELULAR
   );

CALL SP_INSERTA_PERSONA('Nombre 1','Apellido 1',1,1,'0801-0000-00000','1997-02-20','Villa Olimpica Sector #3','2777-07-07','96205386');

-- SP INSERTA EMPLEADO QUE LLEVA CRUCE CON LA TABLA PERSONAS
CREATE OR REPLACE PROCEDURE `SP_INSERTA_EMPLEADO`(IN ID_SUCURSAL INT , IN ID_ESTATUS_EMPLEADO INT , IN ID_TITULACION INT , IN ID_CARGO_EMPLEADO INT , IN FECHA_CONTRATO DATE, IN CORREO_EMPLEADO VARCHAR(60),IN CLAVE_EMPLEADO VARCHAR(255) , IN OBSERVACIONES_EMPLEADO VARCHAR(150) ,IN FOTOGRAFIA_EMPLEADO VARCHAR(200))
	INSERT INTO `TBL_EMPLEADOS`(
        ID_EMPLEADO,
        ID_SUCURSAL,
        ID_ESTATUS_EMPLEADO,
        ID_TITULACION,
        ID_CARGO_EMPLEADO,
        FECHA_CONTRATO,
        CORREO_EMPLEADO,		
        CLAVE_EMPLEADO,
        OBSERVACIONES_EMPLEADO,
        FOTOGRAFIA_EMPLEADO
    ) 
	VALUES 
    (
        (SELECT (`AUTO_INCREMENT` - 1)  AS VALOR_ACTUAL FROM  INFORMATION_SCHEMA.TABLES
		WHERE TABLE_SCHEMA = 'DB-TELEFONIA' AND TABLE_NAME = 'TBL_PERSONAS'),
        ID_SUCURSAL,
        ID_ESTATUS_EMPLEADO ,
        ID_TITULACION ,
        ID_CARGO_EMPLEADO , 
        FECHA_CONTRATO ,
        CORREO_EMPLEADO , 				
        CLAVE_EMPLEADO , 
        OBSERVACIONES_EMPLEADO , 
        FOTOGRAFIA_EMPLEADO
   	);

CALL SP_INSERTA_EMPLEADO(1,1,1,3,NOW(),'test1@gmail.com','asd456','Excelente Especimen','usuario.png');

-- SP PARA LOGUEAR UN EMPLEADO
CREATE OR REPLACE PROCEDURE `SP_LOGIN_USUARIOS`(IN EMAIL VARCHAR(60))
	SELECT ID_EMPLEADO , CORREO_EMPLEADO FROM TBL_EMPLEADOS WHERE CORREO_EMPLEADO = EMAIL;

CALL SP_LOGIN_USUARIOS('test2@gmail.com');


-- SP PARA VERIFICAR LA CONTRASEÑA Y ENVIAR Y RETORNAR VISTO BUENO
CREATE OR REPLACE PROCEDURE `SP_COMPRUEBA_CLAVE`(IN ID INT,IN EMAIL VARCHAR(60))
    SELECT ID_EMPLEADO , CLAVE_EMPLEADO FROM TBL_EMPLEADOS WHERE ID_EMPLEADO = ID AND  CORREO_EMPLEADO = EMAIL

CALL SP_COMPRUEBA_CLAVE(1,'test1@gmail.com');


-- BITACORA CADA VEZ QUE USUARIO HACE LOGIN O LOGOUT O ALGO RELACIONADO CON LA VENTA O COMPRA DE ARTICULOS
CREATE OR REPLACE PROCEDURE `SP_CAPTURA_BITACORA`(IN ID_EMPLE INT , IN ID_TIPO_BITACORA INT)
	INSERT INTO TBL_BITACORAS_EMPLEADOS(ID_EMPLEADO , ID_TIPO_BITACORA , FECHA_HORA_BITACORA) VALUES 
    (ID_EMPLE , ID_TIPO_BITACORA , NOW());

CALL SP_CAPTURA_BITACORA(ID_EMPLEADO , ID_TIPO_BITACORA);

CREATE OR REPLACE PROCEDURE `SP_INSERTA_SUCURSAL`(IN NOMBRE_SUCURSAL VARCHAR(45), IN DIRECCION_SUCURSAL VARCHAR(180) ,IN TELEFONO_SUCURSAL VARCHAR(20) , IN FAX_SUCURSAL VARCHAR(45) , IN CORREO_SUCURSAL VARCHAR(60) )
	INSERT INTO TBL_SUCURSALES
    (
        NOMBRE_SUCURSAL,
        DIRECCION_SUCURSAL,
        TELEFONO_SUCURSAL,
        FAX_SUCURSAL,
        CORREO_SUCURSAL,
        FECHA_CREACION_SUCURSAL
   	)
   VALUES 
   (
       NOMBRE_SUCURSAL,
       DIRECCION_SUCURSAL,
       TELEFONO_SUCURSAL,
       FAX_SUCURSAL,
       CORREO_SUCURSAL,
       NOW()
   );

CALL SP_INSERTA_SUCURSAL ();

-- Muestra proveedores
CREATE OR REPLACE PROCEDURE `SP_TIPO_PROVEEDOR`()
	SELECT ID_TIPO_PROVEEDOR , TIPO_PROVEEDOR FROM TBL_TIPO_PROVEEDOR;

-- Inserta un nuevo proveedor
CREATE OR REPLACE PROCEDURE `SP_INSERTA_PROVEEDOR`(ID_TIPO_PROVEEDOR INT ,NOMBRE_PROVEEDOR VARCHAR(45), DIRECCION VARCHAR(255), ESTATUS_PROVEEDOR VARCHAR(10),CORREO VARCHAR(60) , TELEFONO VARCHAR(25))
	INSERT INTO TBL_PROVEEDOR(ID_TIPO_PROVEEDOR,NOMBRE_PROVEEDOR,DIRECCION,ESTATUS_PROVEEDOR,CORREO,TELEFONO) VALUES 
    (ID_TIPO_PROVEEDOR,NOMBRE_PROVEEDOR,DIRECCION,ESTATUS_PROVEEDOR,CORREO,TELEFONO)

-- prueba
CALL SP_INSERTA_PROVEEDOR(1,'Proveedor de prueba','Direccion de prueba','inactivo','proveedor@gmail.com','27727712');