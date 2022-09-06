<?php
if(isset($_GET["id"])){
  $id = "";
  $paroquia = "";
  $paroco = "";
  $email = "";
  $senha = "";
  $cnpj = "";
  $estado = "";
  $cidade = "";
  $cep = "";
  $endereco = "";
  $numero = "";
  $telefone = "";
  $action = "";
}

else{
  $id = "";
  $paroquia = "";
  $paroco = "";
  $email = "";
  $senha = "";
  $cnpj = "";
  $estado = "";
  $cidade = "";
  $cep = "";
  $endereco = "";
  $numero = "";
  $telefone = "";
  $action = "../BLL/inserirParoquia.php";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastro Igreja</title>
    <script type="text/javascript">
      function validar() {
        var senha = cadastroIgreja.senha.value;
        var repSenha = cadastroIgreja.confirmarSenha.value;

        if (senha != repSenha) {
          alert('Senhas diferentes');
          return false;
        }
      }
    </script>
  </head>
<body>
    <div class="container-fluid">
        <header class="row">
            <div class="col-12 col-sm-2">
                <img src="./img/logoApp.png" alt="logoApp" display= block width= 200px height= 50px>
            </div>
            <div class="col-12 col-sm-8">
                <h1 class="text-center">INSIRA SEUS <br> DADOS</h1>
            </div>
            <div class="col-12 col-sm-2">
                <img src="./img/logoApp.png" alt="logoApp" display= block width= 200px height= 50px>
            </div>
        </header>

    <div class="container-fluid">
      <main class="row">
        <div class="col-12 col-sm-3">
        </div>
        <div class="col-12 col-sm-9">
            <form name="cadastroIgreja" action="<?php echo $action ?>?id=<?php echo $id ?>"  method="post" enctype="multipart/form-data">
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Nome da Paróquia </b></label>
                    <input type="text" class="form-control" placeholder="Nome da Paróquia" name="paroquia" value="<?php echo $paroquia ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Nome do Pároco </b></label>
                    <input type="text" class="form-control" placeholder="Nome do Pároco" name="paroco" value="<?php echo $paroco ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label "><b>E-mail </b></label>
                    <input type="email" class="form-control" placeholder="nome@exemplo.com" name="email" value="<?php echo $email ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Senha </b></label>
                    <input type="password" class="form-control" minlength="6" placeholder="Senha" name="senha" value="<?php echo $senha ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Confirmar Senha </b></label>
                    <input type="password" class="form-control" minlength="6" placeholder="Confirma Senha" name="confirmarSenha">
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>CNPJ </b></label>
                    <input type="text" class="form-control" placeholder="CNPJ" name="cnpj" value="<?php echo $cnpj ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Estado </b></label>
                    <input type="text" class="form-control" placeholder="Estado" name="estado" value="<?php echo $estado ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Cidade </b></label>
                    <input type="text" class="form-control" placeholder="Cidade" name="cidade" value="<?php echo $cidade ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>CEP </b></label>
                    <input type="text" class="form-control" placeholder="CEP" name="cep" value="<?php echo $cep ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Endereço </b></label>
                    <input type="text" class="form-control" placeholder="Endereço" name="endereco" value="<?php echo $endereco ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Número </b></label>
                    <input type="number" class="form-control" placeholder="Número" name="numero" value="<?php echo $numero ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlInput1" class="form-label"><b>Telefone </b></label>
                    <input type="text" class="form-control" placeholder="Telefone" name="telefone" value="<?php echo $telefone ?>" required>
                </div>
                <br>
                <div class="col-12 col-sm-8">
                    <label for="exampleFormControlFile1"><b>Insira a foto da paróquia: </b></label>
                    <input type="file" id="arquivo1" name="arquivo" required>
                </div>
                <br>
                <div class="container-fluid">
                    <header class="row">
                    <div class="col-12 col-sm-2">
                    </div>
                    <div class="col-12 col-sm-9">
                        <input type="button" onclick="window.location.href='index.php'" style="background-color: #0844a4; color:white; width: 150px; height: 60px; font-size: 23px; font-weight:bold" value="Voltar">
                        <input type="submit" style="background-color: #0844a4; color:white; width: 150px; height: 60px; font-size: 23px; font-weight:bold" value="Enviar" onclick="return validar()">
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