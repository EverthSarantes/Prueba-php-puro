<?php

require_once '../config.php';

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $id = $_GET["id"];

    $sql = "DELETE FROM productos WHERE id = ?";

    if($stmt = $mysqli->prepare($sql))
    {
        $stmt->bind_param("i", $id);
        if($stmt->execute())
        {
            header("Location: ../index.php");
            exit;
        }
        else
        {
            echo "Algo salió mal, intente más tarde." . $id;
        }
        $stmt->close();
    }
    else
    {
        echo "Error en la preparación de la consulta.";
    }
}
else
{
    echo "Metodo no soportado";
}

?>