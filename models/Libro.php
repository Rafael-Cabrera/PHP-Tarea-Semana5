<?php
// /models/Libro.php
class Libro {
    private $conn;
    private $table_name = "libros";

    public $id;
    public $titulo;
    public $autor;
    public $anio_publicacion;
    public $genero;
    public $estado;  // Nueva propiedad para el estado

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerLibros() {
        //$query = "SELECT id, titulo, autor, anio_publicacion, genero FROM " . $this->table_name . " ORDER BY titulo ASC";
        $query = "SELECT id, titulo, autor, anio_publicacion, genero, estado FROM " . $this->table_name . " ORDER BY titulo ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function obtenerLibroPorId() {
        $query = "SELECT id, titulo, autor, anio_publicacion, genero, estado FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        // Preparar la sentencia
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->titulo = $row['titulo'];
        $this->autor = $row['autor'];
        $this->anio_publicacion = $row['anio_publicacion'];
        $this->genero = $row['genero'];
        $this->estado = $row['estado'];
    
    }


    public function crearLibro() {
        $query = "INSERT INTO " . $this->table_name . " (titulo, autor, anio_publicacion, genero, estado) VALUES (:titulo, :autor, :anio_publicacion, :genero, :estado)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':anio_publicacion', $this->anio_publicacion);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':estado', $this->estado);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function actualizarLibro() {
        $query = "UPDATE " . $this->table_name . " SET titulo = :titulo, autor = :autor, anio_publicacion = :anio_publicacion, genero = :genero, estado = :esado WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':anio_publicacion', $this->anio_publicacion);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':estado', $this->estado);//Para cambiar el estado.

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function eliminarLibro() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para cambiar el estado de un libro
    public function cambiarEstado() {
        $query = "UPDATE " . $this->table_name . " SET estado = :estado WHERE id = :id";
print($query);
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
