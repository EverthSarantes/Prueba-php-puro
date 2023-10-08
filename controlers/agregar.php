<?php

require_once '../config.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    if(empty($name) || empty($descripcion) || empty($precio) || empty($stock))
    {
        echo "Por favor complete todos los campos.";
    }
    else
    {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";
        
        if($stmt = $mysqli->prepare($sql))
        {
            $stmt->bind_param("ssii", $name, $descripcion, $precio, $stock);
            if($stmt->execute())
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

?>