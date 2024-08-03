<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=productos.xls');

require_once '../config.php';
$querry = "SELECT * FROM productos";
if($result = $mysqli->query($querry))
{
    if($result->num_rows > 0)
    {
        echo '<table>';
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Id</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Descripciòn</th>";
                                echo "<th>Precio</th>";
                                echo "<th>Cantidad</th>";
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
                            echo "</tr>";
                        }
                        echo "</tbody>";                            
                    echo "</table>";
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
