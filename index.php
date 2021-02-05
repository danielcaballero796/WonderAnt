<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Project to load the migration of a table from a database with a .csv file">
    <meta name="author" content="Daniel Caballero">
    <link rel="icon" type="image/png" href="utils/hormiga.png" />

    <title>WonderAnt</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="utils/main.css">

</head>

<body>
    <!-- Modal -->
    <div class="container"><br>
        <div class="main">
            <div class="row">
                <div class="thesame col-6">
                    <h1 class="" id="exampleModalLabel">The WonderAnt</h1>
                    <img src="utils/hormiga.png" alt="" width="80px">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <form action="model.php" method="post" enctype="multipart/form-data">
                        <div id="div_file">
                            <p id="texto">¡Select File!</p>
                            <input type="file" name="archivo" id="btn_enviar">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Upload File</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal cargue masivo-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>