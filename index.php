<?php


?>
<!doctype html>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- cosmo  https://bootswatch.com/5/cosmo/bootstrap.css -->
    <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Remplaza archivos</title>

</head>

<body >
<div class="container">
    <div class="row">
        <div class="col-md-12">
                    <h1>Remplaza archivos</h1>
        </div>
       
    </div>
    <br> <br>
    <div class="col-md-12">



        <div class="row">

        <form class="needs-validation" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data" novalidate>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="archivos">Archivos </label>
                        <input type="file" name="archivos[]" id="archivos" multiple="multiple" required>
                            <div class="valid-tooltip">
                                Carga archivos
                            </div>
                    </div>

                    <div class="col-md-6 mb-6">
                        <label for="Ruta">Ruta</label>
                        <input type="text" class="form-control" id="Ruta" name="Ruta" placeholder="C:\xampp\htdocs\reparch" required>
                        <div class="valid-tooltip">
                            Carga una ruta
                        </div>
                    </div>
                </div>

                <br>
                <input type="submit" value="guardar">
                <br>
                <a class="btn btn-primary" role="button" id="Reemplaza_archivos">Reemplaza archivos</a>
        </form>

        <?php 

            if (isset($_POST['Ruta'])) {
                $Ruta = $_POST['Ruta'];
            }

  

            if (isset($_FILES['archivos'])) {
                if ($Ruta != '') {
                    for ($i=0; $i < count($_FILES['archivos']['name']); $i++) { 

                        if (file_exists($Ruta) || @mkdir($Ruta)) {
                            $origenarchivo = $_FILES['archivos']['tmp_name'][$i];
                            $destino_archivo = $Ruta.$_FILES['archivos']['name'][$i];

                            if (@move_uploaded_file($origenarchivo, $destino_archivo)) {
                                echo '<br> se movio el archivo: '.$Ruta.$_FILES['archivos']['name'][$i];
                            }else{
                                echo '<br> Error: no movio el archivo: '.$Ruta.$_FILES['archivos']['name'][$i];

                            }

                        }else{
                            echo '<br> Error el archivo existe o hay un problema en la ruta';
                        }
                      
                    }
                }    

            }
        ?>

        </div>

        
    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
        <script src="./js/index.js"></script>
</html>