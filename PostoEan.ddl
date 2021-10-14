-- Generado por Oracle SQL Developer Data Modeler 21.2.0.183.1957
--   en:        2021-10-12 19:19:57 COT
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE TABLE acceso (
    administrador_id      VARCHAR(4000) NOT NULL,
    administrador_clave   VARCHAR(4000) NOT NULL,
    administrador_usuario VARCHAR(4000) NOT NULL
);

CREATE TABLE administrador (
    usuario           VARCHAR(4000) NOT NULL,
    clave             VARCHAR(4000) NOT NULL,
    id                VARCHAR(4000) NOT NULL,
    rol               VARCHAR(4000) NOT NULL,
    tipo_de_documento VARCHAR(4000) NOT NULL,
    nombre            VARCHAR(4000) NOT NULL,
    email             VARCHAR(4000) NOT NULL,
    numero_contacto   VARCHAR(4000) NOT NULL
);

ALTER TABLE administrador
    ADD CHECK ( rol IN ( '1', '2' ) );

ALTER TABLE administrador
    ADD CHECK ( tipo_de_documento IN ( '1', '2', '3' ) );

ALTER TABLE administrador
    ADD CONSTRAINT administrador_pk PRIMARY KEY ( id,
                                                  clave,
                                                  usuario );

CREATE TABLE documentos (
    proveedor_codigo_proveedor VARCHAR(4000) NOT NULL,
    proveedor_usuario          VARCHAR(4000) NOT NULL,
    proveedor_clave            VARCHAR(4000) NOT NULL,
    documentos                 BLOB NOT NULL
);

CREATE TABLE plan_de_operacion (
    plan_de_operacion_id        NUMBER NOT NULL,
    id_propuesta                VARCHAR(4000) NOT NULL,
    operacion                   VARCHAR(4000) NOT NULL,
    propuesta                   VARCHAR(4000) NOT NULL,
    proveedor_codigo_proveedor  VARCHAR(4000) NOT NULL,
    proveedor_usuario           VARCHAR(4000) NOT NULL,
    proveedor_clave             VARCHAR(4000) NOT NULL,
    proveedor_codigo_proveedor2 VARCHAR(4000) NOT NULL,
    proveedor_usuario2          VARCHAR(4000) NOT NULL,
    proveedor_clave2            VARCHAR(4000) NOT NULL,
    administrador_id            VARCHAR(4000) NOT NULL,
    administrador_clave         VARCHAR(4000) NOT NULL,
    administrador_usuario       VARCHAR(4000) NOT NULL
);

CREATE UNIQUE INDEX plan_de_operacion__idx ON
    plan_de_operacion (
        proveedor_codigo_proveedor
    ASC,
        proveedor_usuario
    ASC,
        proveedor_clave
    ASC );

CREATE UNIQUE INDEX plan_de_operacion__idxv1 ON
    plan_de_operacion (
        proveedor_codigo_proveedor2
    ASC,
        proveedor_usuario2
    ASC,
        proveedor_clave2
    ASC );

ALTER TABLE plan_de_operacion ADD CONSTRAINT plan_de_operacion_pk UNIQUE ( plan_de_operacion_id );

CREATE TABLE precios (
    proveedor_codigo_proveedor VARCHAR(4000) NOT NULL,
    proveedor_clave            VARCHAR(4000) NOT NULL,
    proveedor_usuario          VARCHAR(4000) NOT NULL,
    material                   VARCHAR(4000) NOT NULL,
    precios                    NUMBER NOT NULL,
    fecha                      DATE NOT NULL
);

CREATE TABLE produccion (
    administrador_id      VARCHAR(4000) NOT NULL,
    administrador_clave   VARCHAR(4000) NOT NULL,
    administrador_usuario VARCHAR(4000) NOT NULL,
    tipo_documento        VARCHAR(4000) NOT NULL,
    nombre                VARCHAR(4000) NOT NULL,
    apellidos             VARCHAR(4000) NOT NULL,
    correo_electronico    VARCHAR(4000) NOT NULL,
    numero_contacto       INTEGER NOT NULL
);

ALTER TABLE produccion
    ADD CHECK ( tipo_documento IN ( '1', '2', '3' ) );

CREATE TABLE propuesta (
    fecha_registro             DATE NOT NULL,
    propuesta                  VARCHAR(4000),
    proveedor_codigo_proveedor VARCHAR(4000) NOT NULL,
    proveedor_usuario          VARCHAR(4000) NOT NULL,
    proveedor_clave            VARCHAR(4000) NOT NULL
);

CREATE TABLE proveedor (
    codigo_proveedor                       VARCHAR(4000) NOT NULL,
    usuario                                VARCHAR(4000) NOT NULL,
    clave                                  VARCHAR(4000) NOT NULL,
    rol                                    VARCHAR(4000) NOT NULL,
    direccion                              VARCHAR(4000) NOT NULL,
    region                                 VARCHAR(4000) NOT NULL,
    correoelectronico                      VARCHAR(4000) NOT NULL,
    numero_contacto                        INTEGER NOT NULL,
    materiales                             VARCHAR(4000) NOT NULL,
    precio                                 NUMBER NOT NULL,
    iva                                    NUMBER NOT NULL,
    porcentaje_iva                         NUMBER,
    plan_de_operacion_id_propuesta         INTEGER NOT NULL, 
--  ERROR: Column name length exceeds maximum allowed length(30) 
    plan_de_operacion_plan_de_operacion_id NUMBER NOT NULL
);

ALTER TABLE proveedor
    ADD CHECK ( rol IN ( '1', '2' ) );

-- Error - Index proveedor__IDX has no columns

-- Error - Index proveedor__IDXv1 has no columns
CREATE UNIQUE INDEX proveedor__idxv2 ON
    proveedor (
        plan_de_operacion_id_propuesta
    ASC );

CREATE UNIQUE INDEX proveedor__idx ON
    proveedor (
        plan_de_operacion_plan_de_operacion_id
    ASC );

ALTER TABLE proveedor
    ADD CONSTRAINT proveedor_pk PRIMARY KEY ( codigo_proveedor,
                                              usuario,
                                              clave );

ALTER TABLE acceso
    ADD CONSTRAINT acceso_administrador_fk FOREIGN KEY ( administrador_id,
                                                         administrador_clave,
                                                         administrador_usuario )
        REFERENCES administrador ( id,
                                   clave,
                                   usuario );

ALTER TABLE documentos
    ADD CONSTRAINT documentos_proveedor_fk FOREIGN KEY ( proveedor_codigo_proveedor,
                                                         proveedor_usuario,
                                                         proveedor_clave )
        REFERENCES proveedor ( codigo_proveedor,
                               usuario,
                               clave );

--  ERROR: FK name length exceeds maximum allowed length(30) 
ALTER TABLE plan_de_operacion
    ADD CONSTRAINT plan_de_operacion_administrador_fk FOREIGN KEY ( administrador_id,
                                                                    administrador_clave,
                                                                    administrador_usuario )
        REFERENCES administrador ( id,
                                   clave,
                                   usuario );

ALTER TABLE plan_de_operacion
    ADD CONSTRAINT plan_de_operacion_proveedor_fk FOREIGN KEY ( proveedor_codigo_proveedor2,
                                                                proveedor_usuario2,
                                                                proveedor_clave2 )
        REFERENCES proveedor ( codigo_proveedor,
                               usuario,
                               clave );

ALTER TABLE precios
    ADD CONSTRAINT precios_proveedor_fk FOREIGN KEY ( proveedor_codigo_proveedor,
                                                      proveedor_usuario,
                                                      proveedor_clave )
        REFERENCES proveedor ( codigo_proveedor,
                               usuario,
                               clave );

ALTER TABLE produccion
    ADD CONSTRAINT produccion_administrador_fk FOREIGN KEY ( administrador_id,
                                                             administrador_clave,
                                                             administrador_usuario )
        REFERENCES administrador ( id,
                                   clave,
                                   usuario );

ALTER TABLE propuesta
    ADD CONSTRAINT propuesta_proveedor_fk FOREIGN KEY ( proveedor_codigo_proveedor,
                                                        proveedor_usuario,
                                                        proveedor_clave )
        REFERENCES proveedor ( codigo_proveedor,
                               usuario,
                               clave );

-- Error - Foreign Key proveedor_Plan_De_Operacion_FK has no columns

CREATE SEQUENCE plan_de_operacion_plan_de_oper START WITH 1 NOCACHE ORDER;

CREATE OR REPLACE TRIGGER plan_de_operacion_plan_de_oper BEFORE
    INSERT ON plan_de_operacion
    FOR EACH ROW
    WHEN ( new.plan_de_operacion_id IS NULL )
BEGIN
    :new.plan_de_operacion_id := plan_de_operacion_plan_de_oper.nextval;
END;
/



-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                             8
-- CREATE INDEX                             4
-- ALTER TABLE                             14
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           1
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
-- CREATE SEQUENCE                          1
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
-- ERRORS                                   5
-- WARNINGS                                 0
