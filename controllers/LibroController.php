<?php
// /controllers/LibroController.php
include_once './config/database.php';
include_once './models/Libro.php';

class LibroController {

    private $db;
    private $libro;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->libro = new Libro($this->db);
    }

    public function listarLibros() {
        $stmt = $this->libro->obtenerLibros();
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once './views/index.php';
    }

    public function agregarLibro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->libro->titulo = $_POST['titulo'];
            $this->libro->autor = $_POST['autor'];
            $this->libro->anio_publicacion = $_POST['anio_publicacion'];
            $this->libro->genero = $_POST['genero'];
            $this->libro->estado = $_POST['estado'];

            // Validar que los campos no estén vacíos (básica)
            if (empty($titulo) || empty($autor) || empty($anio_publicacion) || empty($genero) || empty($estado)) {
                echo "Todos los campos son obligatorios.";
                return;
            }

            if ($this->libro->crearLibro()) {
                header("Location: index.php");
            } else {
                echo "Error al agregar el libro";
            }
        } else {
            include_once './views/agregar.php';
        }
    }

    public function editarLibro($id) {
        $this->libro->id = $id;
        $this->libro->obtenerLibroPorId();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->libro->titulo = $_POST['titulo'];
            $this->libro->autor = $_POST['autor'];
            $this->libro->anio_publicacion = $_POST['anio_publicacion'];
            $this->libro->genero = $_POST['genero'];
            $this->libro->estado = $_POST['estado'];

            if ($this->libro->actualizarLibro()) {
                header("Location: index.php");
            } else {
                echo "Error al actualizar el libro";
            }
        } else {
            include_once './views/editar.php';
        }
    }

    public function eliminarLibro($id) {
        $this->libro->id = $id;
        if ($this->libro->eliminarLibro()) {
            header("Location: index.php");
        } else {
            echo "Error al eliminar el libro";
        }
    }

    // Método para cambiar el estado de un libro
    public function cambiarEstadoLibro($id, $estado) {
        $this->libro->id = $id;
        $this->libro->estado = $estado;

        if ($this->libro->cambiarEstado()) {
            header("Location: index.php");
        } else {
            echo "Error al cambiar el estado del libro";
        }
    }
}
?>
