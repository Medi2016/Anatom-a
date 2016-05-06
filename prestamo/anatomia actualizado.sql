create database Anatomia;
use Anatomia;

--Tabla Curso
Create table if not exists `Curso`(
   Sigla varchar(50),
   NombreCurso varchar(50),
   CONSTRAINT Curso_pk PRIMARY KEY (Sigla)
) ENGINE=InnoDB;

--Tabla Estudiante
Create table if not exists `Estudiante`(
   Carnet varchar(50),
   Rol varchar(50),
   Contraseña varchar(50);
   NombreEstudiante varchar(50),
   Correo varchar(50),
   CONSTRAINT Estudiante_pk PRIMARY KEY (Carnet)
) ENGINE=InnoDB;

--Tabla Articulo
Create table if not exists `Articulo`(
   Id int(11) not null AUTO_INCREMENT,
   NombreArticulo varchar(50),
   Lugar varchar(50),
   Categoria varchar(50),
   CONSTRAINT Articulo_pk PRIMARY KEY (Id)
	
) ENGINE=InnoDB;

--Tabla Prestamo
Create table if not exists `Prestamo`(
   Id int(11) not null AUTO_INCREMENT,
   Fecha date NOT NULL,
   Hora time NOT NULL,
   Entrega Varchar NOT NULL,
   EstudianteIdFK VARCHAR(50) NOT NULL,
   CursoIdFK VARCHAR(50) NOT NULL,
   CONSTRAINT Prestamo_pk PRIMARY KEY (Id)
   ) ENGINE=InnoDB;
	CONSTRAINT EstudianteId_prestamo_fk FOREIGN KEY (EstudianteIdFK) REFERENCES Estudiante(Carnet) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT CursoId_prestamo_fk FOREIGN KEY (CursoIdFK) REFERENCES Curso(Sigla) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB;

ALTER TABLE Prestamo ADD CONSTRAINT EstudianteId_prestamo_fk FOREIGN KEY (EstudianteIdFK) REFERENCES Estudiante(Carnet) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Prestamo ADD CONSTRAINT CursoId_prestamo_fk FOREIGN KEY (CursoIdFK) REFERENCES Curso(Sigla) ON UPDATE CASCADE ON DELETE CASCADE;



--Tabla Prestamo_Artículo
Create table if not exists `Prestamo_Articulo`(
   PrestamoIdFK int not null,
   ArticuloIdFK int not null,
   Recibe Varchar NOT NULL,
   Cantidad Int not null,
   CONSTRAINT Prestamo_Articulo_pk PRIMARY KEY (PrestamoIdFK, ArticuloIdFK),
   CONSTRAINT prestamoId_prestamo_fk FOREIGN KEY (PrestamoIdFK) REFERENCES Prestamo(Id) ON UPDATE CASCADE ON DELETE CASCADE,
   CONSTRAINT articuloId_prestamo_fk FOREIGN KEY (ArticuloIdFK) REFERENCES Articulo(Id) ON UPDATE CASCADE ON DELETE CASCADE
	
) ENGINE=InnoDB;

--Quitando FK de entrega y recibe ya es innecesario gastar una tabla para solo 3 personas
ALTER TABLE Prestamo
DROP FOREIGN KEY EntregaIdFK

ALTER TABLE Prestamo
DROP FOREIGN KEY EntregaId_prestamo_fk
-- Para eliminar una FK Primero eliminar el constraint y luego la columna del constraint
ALTER TABLE Prestamo
DROP FOREIGN KEY RecibeId_prestamo_fk

ALTER TABLE prestamo
ADD Entrega Varchar(50) NOT NULL AFTER Hora;

ALTER TABLE estudiante
ADD Correo Varchar(50) NOT NULL AFTER NombreEstudiante;
-------------------------------------

CREATE TABLE IF NOT EXISTS `alarms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `sound` text NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;