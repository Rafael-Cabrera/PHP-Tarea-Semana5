CREATE DATABASE IF NOT EXISTS gestion_libros;
USE gestion_libros;

CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    anio_publicacion INT(4) NOT NULL,
    genero VARCHAR(100) NOT NULL
);

INSERT INTO libros (titulo, autor, anio_publicacion, genero)
VALUES
    ('El Quijote', 'Miguel de Cervantes', 1605, 'Novela'),
    ('Cien a�os de soledad', 'Gabriel Garc�a M�rquez', 1967, 'Realismo m�gico'),
    ('1984', 'George Orwell', 1949, 'Distop�a'),
    ('El Gran Gatsby', 'F. Scott Fitzgerald', 1925, 'Ficci�n');

ALTER TABLE libros
ADD COLUMN estado ENUM('activo', 'inactivo') DEFAULT 'activo';