<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
  </head>
  <body>
    <?php
        if(isset($_GET['id']))
        {
            require_once '../config.php';
            $id = $_GET['id'];
            $sql = "select * from productos where id = ?";
            if($stmt = $mysqli->prepare($sql))
            {
                $stmt->bind_param("i", $param_id);
                $param_id = $id;
                if($stmt->execute())
                {
                    $stmt->bind_result($id, $nombre, $descripcion, $precio, $stock);
                    $stmt->fetch();
                }
            }
        }
    ?>
    <section class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <h2 class="mt-5">Actualizar Producto</h2>
                <form action="/controlers/edit.php" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $nombre ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Descripciòn</label>
                        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="precio" class="form-control" value="<?php echo $precio ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" name="stock" class="form-control" value="<?php echo $stock ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>" required>
                    <input type="submit" class="btn btn-primary mt-2" value="Enviar">
                    <a href="/index.php" class="btn btn-secondary mt-2">Cancel</a>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>