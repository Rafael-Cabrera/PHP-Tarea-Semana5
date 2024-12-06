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
    ('Cien años de soledad', 'Gabriel García Márquez', 1967, 'Realismo mágico'),
    ('1984', 'George Orwell', 1949, 'Distopía'),
    ('El Gran Gatsby', 'F. Scott Fitzgerald', 1925, 'Ficción');

ALTER TABLE libros
ADD COLUMN estado ENUM('activo', 'inactivo') DEFAULT 'activo';