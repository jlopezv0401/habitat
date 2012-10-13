    /*
    Autor: Martín Martínez
    Modificado: Jesus Lopez
    Versión: 1.2
    Fecha: 15-07-2012
    */

    DROP TABLE IF EXISTS Material;
    CREATE TABLE  Material(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    existencia INT NOT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Metrica;
    CREATE TABLE Metrica(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    valor_medir VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    rango_inicio INT NOT NULL,
    rango_fin INT NOT NULL,
    no_intervalo INT NOT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Evento;
    CREATE TABLE Evento(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    ubicacion TEXT COLLATE utf8_bin DEFAULT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Carpa;
    CREATE TABLE Carpa(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    id_evento BIGINT(20) NOT NULL,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT carpa_evento_fk FOREIGN KEY(id_evento) REFERENCES Evento(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Programa;
    CREATE TABLE Programa(
    id BIGINT(20) NOT NULL  AUTO_INCREMENT,
    id_carpa BIGINT(20)  NOT NULL,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT programa_carpa_fk FOREIGN KEY(id_carpa) REFERENCES Carpa(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Area;
    CREATE TABLE Area(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    id_programa BIGINT(20) NOT NULL,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT area_programa_fk FOREIGN KEY(id_programa) REFERENCES Programa(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Dinamica;
    CREATE TABLE Dinamica(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    id_area BIGINT(20) NOT NULL,
    id_metrica BIGINT(20) NOT NULL,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    hora_inicio DATETIME NOT NULL,
    hora_fin DATETIME NOT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT dinamica_area_fk FOREIGN KEY(id_area) REFERENCES Area(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT dinamica_metrica_fk FOREIGN KEY(id_metrica) REFERENCES  Metrica(id) ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Paquete;
    CREATE TABLE Paquete(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    id_material BIGINT(20) NOT NULL,
    cantidad INT NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT paquete_material_fk FOREIGN KEY(id_material) REFERENCES Material(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Dinamica_Paquete;
    CREATE TABLE Dinamica_Paquete(
    id_dinamica BIGINT(20) NOT NULL,
    id_paquete BIGINT(20) NOT NULL,
    lista INT DEFAULT NULL,
    CONSTRAINT dinamica_paquete1_fk FOREIGN KEY(id_paquete) REFERENCES Paquete(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT dinamica_paquete2_fk FOREIGN KEY(id_dinamica) REFERENCES Dinamica(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Intervalo;
    CREATE TABLE Intervalo(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    id_metrica BIGINT(20) NOT NULL,
    intervalo VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT intervalo_metrica_fk FOREIGN KEY(id_metrica) REFERENCES Metrica(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Colaborador;
    CREATE TABLE Colaborador(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    usuario varchar(100) COLLATE utf8_bin UNIQUE DEFAULT NULL,
    password varchar(100) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY (id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Colaborador_Personal;
    CREATE TABLE Colaborador_Personal(
    id_colaborador BIGINT(20),
    nombre VARCHAR(30) COLLATE utf8_bin DEFAULT NULL,
    apaterno VARCHAR(25) COLLATE utf8_bin DEFAULT NULL,
    amaterno VARCHAR (25) COLLATE utf8_bin DEFAULT NULL,
    sexo ENUM('H','M') COLLATE utf8_bin DEFAULT NULL,
    edad INT NOT NULL,
    direccion TEXT COLLATE utf8_bin DEFAULT NULL,
    telefono VARCHAR(12) COLLATE utf8_bin DEFAULT NULL,
    correo VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id_colaborador),
    CONSTRAINT colaborador_personal_colaborador_fk FOREIGN KEY(id_colaborador) REFERENCES Colaborador(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Dinamica_Colaborador;
    CREATE TABLE Dinamica_Colaborador(
    id_dinamica BIGINT(20) NOT NULL,
    id_colaborador BIGINT(20) NOT NULL,
    responsable BOOLEAN DEFAULT NULL,
    lista INT DEFAULT NULL,
    CONSTRAINT dinamica_colaborador1_fk FOREIGN KEY(id_colaborador) REFERENCES Colaborador(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT dinamica_colaborador2_fk FOREIGN KEY(id_dinamica) REFERENCES Dinamica(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Participante;
    CREATE TABLE Participante(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) COLLATE utf8_bin DEFAULT NULL,
    apaterno VARCHAR(25) COLLATE utf8_bin DEFAULT NULL,
    amaterno VARCHAR (25) COLLATE utf8_bin DEFAULT NULL,
    sexo ENUM('H','M') COLLATE utf8_bin DEFAULT NULL,
    edad INT NOT NULL,
    telefono VARCHAR(12) COLLATE utf8_bin DEFAULT NULL,
    correo VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Calificacion;
    CREATE TABLE Calificacion(
    id BIGINT(20) NOT NULL AUTO_INCREMENT,
    id_intervalo BIGINT(20) NOT NULL,
    id_participante BIGINT(20) NOT NULL,
    calificacion INT NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT calificacion_intervalo_fk FOREIGN KEY(id_intervalo) REFERENCES Intervalo(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT calificacion_participante_fk FOREIGN KEY(id_participante) REFERENCES Participante(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DELIMITER ;
    DROP TRIGGER IF EXISTS `actualizar_datos_personal`;
    DELIMITER //
    CREATE TRIGGER Insertar
        AFTER INSERT ON Metrica FOR EACH ROW
        BEGIN
            DECLARE x INT;
            SET x = 0;
            WHILE x < NEW.no_intervalo DO
                INSERT INTO Intervalo VALUES ("", NEW.id, x, "Cambiar Intervalo");
                SET x = x+1;
            END WHILE;
        END
    //
    DELIMITER ;
