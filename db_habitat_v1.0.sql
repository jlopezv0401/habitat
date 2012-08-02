    /*
    Autor: Martín Martínez
    Modificado: Jesus Lopez
    Versión: 1.2
    Fecha: 15-07-2012
    */

    CREATE DATABASE IF NOT EXISTS db_habitat;

    use db_habitat;

    DROP TABLE IF EXISTS Material;
    CREATE TABLE  Material(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    cantidad INT NOT NULL,
    descripcion TEXT,
    PRIMARY KEY(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Metrica;
    CREATE TABLE Metrica(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    valor_medir VARCHAR(50),
    rango_inicio INT NOT NULL,
    rango_fin INT NOT NULL,
    no_intervalo INT NOT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Pregunta;
    CREATE TABLE Pregunta(
    id INT NOT NULL AUTO_INCREMENT,
    pregunta VARCHAR(60) NOT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Evento;
    CREATE TABLE Evento(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    ubicacion TEXT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    PRIMARY KEY(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Carpa;
    CREATE TABLE Carpa(
    id INT NOT NULL AUTO_INCREMENT,
    id_evento INT  NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_evento) REFERENCES Evento(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Programa;
    CREATE TABLE Programa(
    id INT NOT NULL  AUTO_INCREMENT,
    id_carpa INT  NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT,
    PRIMARY KEY(id),
    FOREIGN KEY(id_carpa) REFERENCES Carpa(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Area;
    CREATE TABLE Area(
    id INT NOT NULL AUTO_INCREMENT,
    id_programa INT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT,
    PRIMARY KEY(id),
    FOREIGN KEY(id_programa) REFERENCES Programa(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Dinamica;
    CREATE TABLE Dinamica(
    id INT NOT NULL AUTO_INCREMENT,
    id_area INT NOT NULL,
    id_metrica INT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    descripcion TEXT,
    PRIMARY KEY(id),
    FOREIGN KEY(id_area) REFERENCES Area(id),
    FOREIGN KEY(id_metrica) REFERENCES  Metrica(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Paquete;
    CREATE TABLE Paquete(
    id INT NOT NULL AUTO_INCREMENT,
    id_dinamica INT NOT NULL,
    id_material INT NOT NULL,
    cantidad INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_dinamica) REFERENCES Dinamica(id),
    FOREIGN KEY(id_material) REFERENCES Material(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Intervalo;
    CREATE TABLE Intervalo(
    id INT NOT NULL AUTO_INCREMENT,
    id_metrica INT NOT NULL,
    intervalo VARCHAR(50) NOT NULL,
    descripcion TEXT,
    PRIMARY KEY(id),
    FOREIGN KEY(id_metrica) REFERENCES Metrica(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Colaborador;
    CREATE TABLE Colaborador(
    id INT NOT NULL AUTO_INCREMENT,
    id_dinamica INT,
    nombre VARCHAR(30) NOT NULL,
    apaterno VARCHAR(25) NOT NULL,
    amaterno VARCHAR (25) NOT NULL,
    sexo ENUM('H','M') NOT NULL,
    estatus BIT NOT NULL,
    edad CHAR(2),
    direccion TEXT,
    telefono VARCHAR(12) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_dinamica) REFERENCES Dinamica(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Responsable;
    CREATE TABLE Responsable(
    id INT NOT NULL AUTO_INCREMENT,
    id_colaborador INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_colaborador) REFERENCES Colaborador(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Participante;
    CREATE TABLE Participante(
    id INT NOT NULL AUTO_INCREMENT,
    nombre varchar(30) NOT NULL,
    apaterno VARCHAR(25) NOT NULL,
    amaterno VARCHAR (25),
    edad CHAR(2),
    sexo ENUM('H','M') NOT NULL,
    telefono VARCHAR(12),
    correo VARCHAR(50),
    PRIMARY KEY(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Participante;
    CREATE TABLE Participante(
    id INT NOT NULL AUTO_INCREMENT,
    id_pregunta INT NOT NULL,
    id_participante INT NOT NULL,
    Respuesta VARCHAR(50),
    PRIMARY KEY(id),
    FOREIGN KEY(id_pregunta) REFERENCES Pregunta(id),
    FOREIGN KEY(id_participante) REFERENCES Participante(id)
    )ENGINE=InnoDB;

    DROP TABLE IF EXISTS Calificacion;
    CREATE TABLE Calificacion(
    id INT NOT NULL AUTO_INCREMENT,
    id_intervalo INT NOT NULL,
    id_participante INT NOT NULL,
    calificacion INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_intervalo) REFERENCES Intervalo(id),
    FOREIGN KEY(id_participante) REFERENCES Participante(id)
    )ENGINE=InnoDB;

    DELIMITER $$
    CREATE TRIGGER Insertar
        AFTER INSERT ON Metrica FOR EACH ROW
        BEGIN
            DECLARE x INT;
            SET x = 0;
            WHILE x < NEW.no_intervalo DO
                INSERT INTO Intervalo VALUES ("", NEW.id, x, "Cambiar Intervalo");
                SET x = x+1;
            END WHILE;
        END $$
    DELIMITER

    INSERT INTO `Area` VALUES (1,1,'Area 1','Area 1'),(2,2,'Area 1','Area 1'),(3,2,'Area 2','Area 2');
    INSERT INTO `Carpa` VALUES (1,1,'Carpa 1'),(2,2,'Carpa 2');
    INSERT INTO `Dinamica` VALUES (1,1,1,'Dinamica 1','11:15:00','11:15:00','Dinamica 1'),(2,2,1,'Dinamica 1','02:30:00','02:30:00','Dinamica 1'),(3,2,2,'Dinamica 2','02:30:00','02:30:00','Dinamica 2'),(4,3,1,'Dinamica 1','02:30:00','02:30:00','Dinamica 1');
    INSERT INTO `Evento` VALUES (1,'Evento 1','Evento 1','2012-05-30','2012-07-17'),(2,'Evento 2','Evento 2','2012-07-21','2012-07-21');
    INSERT INTO `Metrica` VALUES (1,'Metrica 1','Metrica 1',1,10,5),(2,'Metrica 2','Metrica 2',1,12,4);
    INSERT INTO `Programa` VALUES (1,1,'Programa 1','Programa 1'),(2,2,'Programa 1','Programa 1');
