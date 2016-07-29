create database Anatomia CHARACTER SET utf8 COLLATE utf8_unicode_ci;
create database prueba CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use Anatomia;

--Tabla Curso
Create table if not exists `Curso`(
   Sigla varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   NombreCurso varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   CONSTRAINT Curso_pk PRIMARY KEY (Sigla)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--Tabla Estudiante
Create table if not exists `Estudiante`(
   Carnet varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   Rol varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci  DEFAULT 'Estudiante' NOT NULL,
   Contraseña varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   NombreEstudiante varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   Correo varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   CONSTRAINT Estudiante_pk PRIMARY KEY (Carnet)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--Tabla Articulo
Create table if not exists `Articulo`(
   Id int(11) not null AUTO_INCREMENT,
   NombreArticulo varchar(50) CHARSET utf8 COLLATE utf8_spanish_ci NOT NULL,
   Lugar varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
   Categoria varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
   CONSTRAINT Articulo_pk PRIMARY KEY (Id)
	
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--Tabla Prestamo
Create table if not exists `Prestamo`(
   Id int(11) not null AUTO_INCREMENT,
   Fecha date NOT NULL,
   Hora time NOT NULL,
   Entrega Varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   EstudianteIdFK VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   CursoIdFK VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   CONSTRAINT Prestamo_pk PRIMARY KEY (Id)
   ) ENGINE=InnoDB;
	CONSTRAINT EstudianteId_prestamo_fk FOREIGN KEY (EstudianteIdFK) REFERENCES Estudiante(Carnet) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT CursoId_prestamo_fk FOREIGN KEY (CursoIdFK) REFERENCES Curso(Sigla) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE Prestamo ADD CONSTRAINT EstudianteId_prestamo_fk FOREIGN KEY (EstudianteIdFK) REFERENCES Estudiante(Carnet) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Prestamo ADD CONSTRAINT CursoId_prestamo_fk FOREIGN KEY (CursoIdFK) REFERENCES Curso(Sigla) ON UPDATE CASCADE ON DELETE CASCADE;



--Tabla Prestamo_Artículo
Create table if not exists `Prestamo_Articulo`(
   PrestamoIdFK int not null,
   ArticuloIdFK int not null,
   Recibe Varchar (50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
   Cantidad Int not null,
   CONSTRAINT Prestamo_Articulo_pk PRIMARY KEY (PrestamoIdFK, ArticuloIdFK),
   CONSTRAINT prestamoId_prestamo_fk FOREIGN KEY (PrestamoIdFK) REFERENCES Prestamo(Id) ON UPDATE CASCADE ON DELETE CASCADE,
   CONSTRAINT articuloId_prestamo_fk FOREIGN KEY (ArticuloIdFK) REFERENCES Articulo(Id) ON UPDATE CASCADE ON DELETE CASCADE
	
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--Quitando FK de entrega y recibe ya es innecesario gastar una tabla para solo 3 personas
ALTER TABLE Prestamo
DROP FOREIGN KEY EntregaIdFK

ALTER TABLE Prestamo
DROP FOREIGN KEY EntregaId_prestamo_fk
-- Para eliminar una FK Primero eliminar el constraint y luego la columna del constraint
ALTER TABLE Prestamo
DROP FOREIGN KEY RecibeId_prestamo_fk




-------------------------------------

CREATE TABLE IF NOT EXISTS `alarms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `sound` text NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;