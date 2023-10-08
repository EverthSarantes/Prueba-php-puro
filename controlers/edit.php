<?php
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $id = $_POST["id"];

    if (empty($name) || empty($descripcion) || empty($precio) || empty($stock) || empty($id))
    {
        echo "Por favor complete todos los campos.";
    }
    else
    {
        $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ? WHERE id = ?";
        
        if ($stmt = $mysqli->prepare($sql))
        {
            $stmt->bind_param("ssiii", $name, $descripcion, $precio, $stock, $id);
            if ($stmt->execute())
            {
                header("Location: ../index.php");
                exit;
            }
            else
            {
                echo "Algo salió mal, intente más tarde.";
            }
            $stmt->close();
        }
        else
        {
            echo "Error en la preparación de la consulta.";
        }
    }
    $mysqli->close();
}
else
{
    echo "Algo salió mal, intente más tarde.";
}
?>