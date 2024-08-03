<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
  </head>
  <body>
    <section class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-3">
                <h3 class="text">Productos</h3>
            </div>
            <div class="col-md-3">
                <a href="/views/agregar.php" class="btn btn-primary">Agregar Producto</a>
            </div>
            <div class="col-md-3">
                <a href="/controlers/excel.php" class="btn btn-success">Exportar a excel</a>
            </div>
        </div>
        <div class="row mt-4">
            <?php

            require_once 'config.php';
            $querry = "SELECT * FROM productos";
            if($result = $mysqli->query($querry))
            {
                if($result->num_rows > 0)
                {
                    echo '<table class="table table-bordered table-striped">';
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Id</th>";
                                echo "<th>Nombre</th>";
                                echo "<th>Descripciòn</th>";
                                echo "<th>Precio</th>";
                                echo "<th>Cantidad</th>";
                                echo "<th>Opciones</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = $result->fetch_array())
                        {
                            echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nombre'] . "</td>";
                                echo "<td>" . $row['descripcion'] . "</td>";
                                echo "<td>" . $row['precio'] . "</td>";
                                echo "<td>" . $row['stock'] . "</td>";
                                echo "<td>";
                                    echo '<a href="views/edit.php?id='. $row['id'] .'" class="btn btn-secondary me-1">Actualizar</a>';
                                    echo '<a href="controlers/delete.php?id='. $row['id'] .'" class="btn btn-danger">Eliminar</a>';
                                echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";                            
                    echo "</table>";
                    $result->free();
                }
                else
                {
                    echo "No se encontraron registros";
                }
            }
            else
            {
                echo "Error al ejecutar la consulta";
            }

            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>