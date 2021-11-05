-- Generado por Oracle SQL Developer Data Modeler 21.2.0.183.1957
--   en:        2021-11-04 10:09:57 COT
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE TABLE administrador (
    id                INTEGER NOT NULL,
    usuario           VARCHAR(250) NOT NULL,
    clave             VARCHAR(250) NOT NULL,
    rol               VARCHAR(250) NOT NULL,
    tipo_de_documento VARCHAR(250) NOT NULL,
    nombre            VARCHAR(250) NOT NULL,
    email             VARCHAR(250) NOT NULL,
    numero_contacto   INTEGER NOT NULL
);

ALTER TABLE administrador ADD CONSTRAINT administrador_pk PRIMARY KEY ( id );

CREATE TABLE inventario (
    id_inventario              INTEGER NOT NULL,
    producto                   VARCHAR(250) NOT NULL,
    descripcion                VARCHAR(250) NOT NULL,
    precio_venta               INTEGER NOT NULL,
    cantidad_almacenadas       INTEGER NOT NULL,
    iva                        INTEGER NOT NULL,
    fecha_min_reabastecimiento DATE NOT NULL,
    fecha_max_reabastecimiento DATE NOT NULL,
    proveedor_id_proveedor     INTEGER NOT NULL
);

ALTER TABLE inventario ADD CONSTRAINT inventario_pk PRIMARY KEY ( id_inventario );

CREATE TABLE precio (
    id_precio              INTEGER NOT NULL,
    material               VARCHAR(250) NOT NULL,
    producto               VARCHAR(250) NOT NULL,
    valor                  INTEGER NOT NULL,
    iva                    INTEGER NOT NULL,
    cantidad               INTEGER NOT NULL,
    fecha                  DATE NOT NULL,
    proveedor_id_proveedor INTEGER NOT NULL
);

ALTER TABLE precio ADD CONSTRAINT precio_pk PRIMARY KEY ( proveedor_id_proveedor );

CREATE TABLE proadm (
    propuesta_id_propuesta INTEGER NOT NULL,
    propuesta_id_proveedor INTEGER NOT NULL,
    administrador_id       INTEGER NOT NULL
);

ALTER TABLE proadm
    ADD CONSTRAINT proadm_pk PRIMARY KEY ( propuesta_id_propuesta,
                                           propuesta_id_proveedor,
                                           administrador_id );

CREATE TABLE propuesta (
    id_propuesta           INTEGER NOT NULL,
    fecha_registro         DATE NOT NULL,
    propuesta              VARCHAR(250) NOT NULL,
    plan_operacion         mediumblob NOT NULL,
    estado                 VARCHAR(250) NOT NULL,
    observacion            VARCHAR(250) NOT NULL,
    fecha_estimada_entrega DATE NOT NULL,
    proveedor_id_proveedor INTEGER NOT NULL
);

ALTER TABLE propuesta ADD CONSTRAINT propuesta_pk PRIMARY KEY ( id_propuesta,
                                                                proveedor_id_proveedor );

CREATE TABLE proveedor (
    id_proveedor INTEGER NOT NULL,
    nombre       VARCHAR(250) NOT NULL,
    direccion    VARCHAR(250) NOT NULL,
    region       VARCHAR(250) NOT NULL,
    nombre_doc   VARCHAR(250) NOT NULL,
    titulo       VARCHAR(250) NOT NULL,
    contenido    mediumblob NOT NULL,
    tipo         VARCHAR(250) NOT NULL
);

ALTER TABLE proveedor ADD CONSTRAINT proveedor_pk PRIMARY KEY ( id_proveedor );

ALTER TABLE inventario
    ADD CONSTRAINT inventario_proveedor_fk FOREIGN KEY ( proveedor_id_proveedor )
        REFERENCES proveedor ( id_proveedor );

ALTER TABLE precio
    ADD CONSTRAINT precio_proveedor_fk FOREIGN KEY ( proveedor_id_proveedor )
        REFERENCES proveedor ( id_proveedor );

ALTER TABLE proadm
    ADD CONSTRAINT proadm_administrador_fk FOREIGN KEY ( administrador_id )
        REFERENCES administrador ( id );

ALTER TABLE proadm
    ADD CONSTRAINT proadm_propuesta_fk FOREIGN KEY ( propuesta_id_propuesta,
                                                     propuesta_id_proveedor )
        REFERENCES propuesta ( id_propuesta,
                               proveedor_id_proveedor );

ALTER TABLE propuesta
    ADD CONSTRAINT propuesta_proveedor_fk FOREIGN KEY ( proveedor_id_proveedor )
        REFERENCES proveedor ( id_proveedor );



-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                             6
-- CREATE INDEX                             0
-- ALTER TABLE                             11
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
