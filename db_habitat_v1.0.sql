    /*
    Autor: Martín Martínez
    Modificado: Jesus Lopez
    Versión: 1.2
    Fecha: 15-07-2012
    */

    DROP TABLE IF EXISTS Material;
    CREATE TABLE  Material(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    cantidad INT NOT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Metrica;
    CREATE TABLE Metrica(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    valor_medir VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    rango_inicio INT NOT NULL,
    rango_fin INT NOT NULL,
    no_intervalo INT NOT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Pregunta;
    CREATE TABLE Pregunta(
    id INT NOT NULL AUTO_INCREMENT,
    pregunta VARCHAR(60) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Evento;
    CREATE TABLE Evento(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    ubicacion TEXT COLLATE utf8_bin DEFAULT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Carpa;
    CREATE TABLE Carpa(
    id INT NOT NULL AUTO_INCREMENT,
    id_evento INT  NOT NULL,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT carpa_evento_fk FOREIGN KEY(id_evento) REFERENCES Evento(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Programa;
    CREATE TABLE Programa(
    id INT NOT NULL  AUTO_INCREMENT,
    id_carpa INT  NOT NULL,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT programa_carpa_fk FOREIGN KEY(id_carpa) REFERENCES Carpa(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Area;
    CREATE TABLE Area(
    id INT NOT NULL AUTO_INCREMENT,
    id_programa INT NOT NULL,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT area_programa_fk FOREIGN KEY(id_programa) REFERENCES Programa(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Dinamica;
    CREATE TABLE Dinamica(
    id INT NOT NULL AUTO_INCREMENT,
    id_area INT NOT NULL,
    id_metrica INT NOT NULL,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT dinamica_area_fk FOREIGN KEY(id_area) REFERENCES Area(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT dinamica_metrica_fk FOREIGN KEY(id_metrica) REFERENCES  Metrica(id) ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Paquete;
    CREATE TABLE Paquete(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    id_dinamica INT NOT NULL,
    id_material INT NOT NULL,
    cantidad INT NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT paquete_dinamica_fk FOREIGN KEY(id_dinamica) REFERENCES Dinamica(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT paquete_material_fk FOREIGN KEY(id_material) REFERENCES Material(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Intervalo;
    CREATE TABLE Intervalo(
    id INT NOT NULL AUTO_INCREMENT,
    id_metrica INT NOT NULL,
    intervalo VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    descripcion TEXT COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT intervalo_metrica_fk FOREIGN KEY(id_metrica) REFERENCES Metrica(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Colaborador;
    CREATE TABLE Colaborador(
    id INT NOT NULL AUTO_INCREMENT,
    id_dinamica INT,
    nombre VARCHAR(30) COLLATE utf8_bin DEFAULT NULL,
    apaterno VARCHAR(25) COLLATE utf8_bin DEFAULT NULL,
    amaterno VARCHAR (25) COLLATE utf8_bin DEFAULT NULL,
    sexo ENUM('H','M') COLLATE utf8_bin DEFAULT NULL,
    edad CHAR(2) COLLATE utf8_bin DEFAULT NULL,
    direccion TEXT COLLATE utf8_bin DEFAULT NULL,
    telefono VARCHAR(12) COLLATE utf8_bin DEFAULT NULL,
    correo VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT colabodor_dinamica_fk FOREIGN KEY(id_dinamica) REFERENCES Dinamica(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Colaborador_Personales;
    CREATE TABLE Colaborador(
    id INT NOT NULL AUTO_INCREMENT,
    id_dinamica INT,
    nombre VARCHAR(30) COLLATE utf8_bin DEFAULT NULL,
    apaterno VARCHAR(25) COLLATE utf8_bin DEFAULT NULL,
    amaterno VARCHAR (25) COLLATE utf8_bin DEFAULT NULL,
    sexo ENUM('H','M') COLLATE utf8_bin DEFAULT NULL,
    edad CHAR(2) COLLATE utf8_bin DEFAULT NULL,
    direccion TEXT COLLATE utf8_bin DEFAULT NULL,
    telefono VARCHAR(12) COLLATE utf8_bin DEFAULT NULL,
    correo VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id),
    CONSTRAINT colabodor_dinamica_fk FOREIGN KEY(id_dinamica) REFERENCES Dinamica(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Responsable;
    CREATE TABLE Responsable(
    id INT NOT NULL AUTO_INCREMENT,
    id_colaborador INT NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT responsable_colaborador_fk FOREIGN KEY(id_colaborador) REFERENCES Colaborador(id) ON DELETE CASCADE ON UPDATE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Participante;
    CREATE TABLE Participante(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) COLLATE utf8_bin DEFAULT NULL,
    apaterno VARCHAR(25) COLLATE utf8_bin DEFAULT NULL,
    amaterno VARCHAR (25) COLLATE utf8_bin DEFAULT NULL,
    sexo ENUM('H','M') COLLATE utf8_bin DEFAULT NULL,
    edad CHAR(2) COLLATE utf8_bin DEFAULT NULL,
    telefono VARCHAR(12) COLLATE utf8_bin DEFAULT NULL,
    correo VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

    DROP TABLE IF EXISTS Calificacion;
    CREATE TABLE Calificacion(
    id INT NOT NULL AUTO_INCREMENT,
    id_intervalo INT NOT NULL,
    id_participante INT NOT NULL,
    calificacion INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_intervalo) REFERENCES Intervalo(id),
    FOREIGN KEY(id_participante) REFERENCES Participante(id)
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
