<?php
include("../DAL/conecta.php");

$id = "";
$descricao = "";
$idParoquia = $_GET["id"];
$action = "../BLL/inserirPostagem.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Fazer Publicação</title>
    <style> 
    .oculto {
        display: none;
    }
    </style>
  </head>
<body>
    <div class="container-fluid">
        <header class="row">
            <div class="container">
                <div class="row">
                    <div class="col align-self-start">
                    </div>
                    <div class="col align-self-center">
                        <img src="./img/logoApp.png" alt="logoApp" display= block width= 550px height= 100px>
                    </div>
                    <div class="col align-self-end">
                    </div>
                </div>
            </div>
        </header>
    <!-- INICIO FORM -->
    <div class="container-fluid">
      <main class="row">
        <div class="col-12 col-sm-3">
        </div>
        <div class="col-12 col-sm-9">
            <form name="cadastroPostagem" action="<?php echo $action ?>?id=<?php echo $id ?>"  method="post" enctype="multipart/form-data">
            <!-- ID da paroquia -->
            <div class="form-group oculto">
              <label for=ID><b> ID Paróquia: </b></label> <br>
              <input class="form-control" type="number" placeholder="ID" name="id_paroquia" value="<?php echo $idParoquia ?>">
            </div>
                <div class="col-12 col-sm-8">
                    <textarea cols="50" rows="5" placeholder="Descrição" name="descricao" value="<?php echo $descricao ?>" required></textarea>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlFile1"><b>Insira um arquivo: </b></label>
                    <input type="file" id="arquivo1" name="arquivo">
                </div>
                <br>
                <div class="container-fluid">
                    <header class="row">
                    <div class="col-12 col-sm-1">
                    </div>
                    <div class="col-12 col-sm-9">
                        <input type="button" onclick="window.close()" style="background-color: #0844a4; color:white; width: 150px; height: 60px; font-size: 23px; font-weight:bold" value="Fechar">
                        <input type="submit" style="background-color: #0844a4; color:white; width: 150px; height: 60px; font-size: 23px; font-weight:bold" value="Públicar">
                    </div>
                </div>    
            </form>
        </div>
    <div class="col align-self-end">
    </div>
    </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>