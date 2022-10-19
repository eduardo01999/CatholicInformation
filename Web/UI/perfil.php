<?php
session_start();
include("../DAL/conecta.php");

$idParoquia = $_GET["id"];

if(isset($_GET["id_horario"])){
    $id = "";
    $horario = "";
    $dia = "";
    $local = "";
    $action = "";
  }
  
  else{
    $id = "";
    $horario = "";
    $dia = "";
    $local = "";
    $action = "../BLL/inserirHorario.php";
  }
  ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/61f3f3e294.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CatholicInformation!</title>

    <style> 
    .oculto {
        display: none;
    }
    </style>
    <!-- ABRIR PopUp no centro -->
    <script language="javascript" type="text/javascript">
        function OpenPopupCenter(pagina, titulo, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4; 
            var targetWin = window.open(pagina, titulo, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        } 
    </script>

  </head>
  <body>
    <header class="container">
    <div class="row">
        <div class="col align-self-start">
        </div>
        <div class="col align-self-center">
        </div>
        <div class="col align-self-end">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-2">
                    </div>
                    <div class="col-12 col-sm-8">
                    </div>
                    <!-- Icone para acessar menu usuario-->
                    <div class="col-12 col-sm-2">
                        <a href='home.php?id=<?php echo $idParoquia; ?>'><i class="fa-solid fa-circle-user"></i><br>Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>

  <!-- Logo -->
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
    <div class="container">
        <main class="row align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-2">
                </div>
                <div class="col-12 col-sm-8">
                    <!-- inicio dar informações -->
                    <?php
                        include("../DAL/conecta.php");

                        try {
                        $stmt = $conn->prepare("SELECT *
                                                FROM paroquia where $idParoquia = id"); 
//                       $stmt = $conn->prepare("SELECT *
//                       FROM paroquia, horario_missa WHERE $idParoquia = paroquia.id AND $idParoquia = horario_missa.id_paroquia"); 
                        $stmt->execute();

                        // set the resulting array to associative
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                        foreach($stmt->fetchAll() as $k=>$v) { 
                                ?>
                                <br>
                                <!-- Foto Perfil -->
                                <div class="container">
                                    <main class="row align-items-center">
                                        <div class="container">
                                                <div class="row">
                                                    <div class="col align-self-start">
                                                    </div>
                                                    <div class="col align-self-center">
                                                    <br>
                                                    <img src="<?php echo $v["path"] ?>" alt="Imagem de perfil"  width= 600px height= 300px>
                                                    </div>
                                                    <div class="col align-self-end">
                                                    </div>
                                                </div>
                                        </div>
                                    </main>
                                </div>
                                <br>
                                <div class="container-fluid">
                                    <header class="row">
                                    <div class="col-12 col-sm-1">
                                    </div>
                                    <div class="col-12 col-sm-9">
                                        <br>
                                        <label for="exampleFormControlInput1" class="form-label"><b>Nome da Paróquia </b></label>
                                        <input type="text" class="form-control" placeholder="Nome da Paróquia" name="paroquia" disabled="" value="<?php echo $v["paroquia"] ?>">
                                        <br>
                                        <label for="exampleFormControlInput1" class="form-label"><b>Telefone </b></label>
                                        <input type="text" class="form-control" placeholder="Nome da Paróquia" name="telefone" disabled="" value="<?php echo $v["telefone"] ?>">
                                        <br>
                                        <label for="exampleFormControlInput1" class="form-label"><b>Pároco </b></label>
                                        <input type="text" class="form-control" placeholder="Nome da Paróquia" name="paroco" disabled="" value="<?php echo $v["paroco"] ?>">
                                        <br>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                    </div>
                                    <!-- horario funcionamento -->
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Horário de Funcionamento </b></label>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <!-- inicio segunda a sexta -->
                                    <div class="col-12 col-sm-1">
                                    </div>
                                    <div class="col-12 col-sm-7">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Segunda à Sexta</b></label>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                    </div>
                                    <!-- horarios semanal -->
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Das</b></label>
                                        <input type="text" class="form-control" placeholder="horario semanal de" name="de_semana" disabled="" value="<?php echo $v["de_semana"] ?>">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Às </b></label>
                                        <input type="text" class="form-control" placeholder="horario semanal ate" name="ate_semana" disabled="" value="<?php echo $v["ate_semana"] ?>">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <!-- inicio sabado -->

                                    <div class="col-12 col-sm-1">
                                    </div>
                                    <div class="col-12 col-sm-7">
                                        <br>
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Sábado</b></label>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                    </div>
                                    <!-- horarios sabado -->
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Das</b></label>
                                        <input type="text" class="form-control" placeholder="horario sabado de" name="de_sabado" disabled="" value="<?php echo $v["de_sabado"] ?>">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Às </b></label>
                                        <input type="text" class="form-control" placeholder="horario sabado ate" name="ate_sabado" disabled="" value="<?php echo $v["ate_sabado"] ?>">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                    </div>

                                    <!-- horario missa -->
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <br>
                                        <br>
                                        <label for="exampleFormControlInput1" class="form-label"><b>Horários das Missas </b></label>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                    </div>
                                    <div class="col-12 col-sm-8">
                                        <!-- botão do modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color: #0844a4; color:white; font-size: 23px; font-weight:bold">
                                            Adicionar Horário de Missa
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                    </div>

                                    </div>
                                    </header>
                                </div> 
                                <br>
                                <br>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <div class="container-fluid">
                                        <header class="row">
                                            <div class="col-12 col-sm-6">
                                                <h5 class="modal-title" id="exampleModalLabel">Cadastrar horário missa</h5>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <img src="./img/logoApp.png" alt="logoApp" display= block width= 200px height= 50px>
                                            </div>
                                        </header>
                                    </div>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                    </div>
                                    <form name="cadastroIgreja" action="<?php echo $action ?>?id=<?php echo $id ?>"  method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                        <div class="form-group oculto">
                                            <label for=ID><b> ID Paróquia: </b></label> <br>
                                            <input class="form-control" type="number" placeholder="ID" name="id_paroquia" value="<?php echo $idParoquia ?>">
                                        </div>
                                        <div class="col-12 col-sm-8">
                                            <label for="exampleFormControlInput1" class="form-label"><b>Horário </b></label>
                                            <input type="text" class="form-control" placeholder="Horário da missa ex: 9:00" name="horario" value="<?php echo $horario ?>" required>
                                        </div>
                                        <div class="col-12 col-sm-8">
                                            <label for="exampleFormControlInput1" class="form-label"><b>Dia </b></label>
                                            <input type="text" class="form-control" placeholder="Domingo" name="dia" value="<?php echo $dia ?>" required>
                                        </div>
                                        <div class="col-12 col-sm-8">
                                            <label for="exampleFormControlInput1" class="form-label"><b>Local </b></label>
                                            <input type="text" class="form-control" placeholder="Rua tal, 33" name="local" value="<?php echo $local ?>" required>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #a9a9a9; color:white; font-size: 23px; font-weight:bold">Fechar</button>
                                            <input type="submit" type="button" class="btn btn-primary" style="background-color: #0844a4; color:white; font-size: 23px; font-weight:bold" value="Públicar">
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                    <?php
                        }
                        } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                        }
                    ?>

                    <?php
                    
                    //SELECT PARA EXIBIR HORARIOS DE MISSA

                    include("../DAL/conecta.php");

                    try {
                    $stmt = $conn->prepare("SELECT *
                                            FROM horario_missa WHERE $idParoquia = id_paroquia"); 
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                    foreach($stmt->fetchAll() as $k=>$v) { 
                            ?>
                                <div class="container-fluid">
                                <header class="row">
                                    <div class="col-12 col-sm-3">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Dia</b></label>
                                        <input type="text" class="form-control" placeholder="dia da missa" name="dia" disabled="" value="<?php echo ucfirst($v["dia"]) ?>">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Às </b></label>
                                        <input type="text" class="form-control" placeholder="horario da missa" name="horario" disabled="" value="<?php echo $v["horario"] ?>">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label for="exampleFormControlInput1" class="form-label" style="text-align: center;"><b>Local </b></label>
                                        <input type="text" class="form-control" placeholder="local da missa" name="local" disabled="" value="<?php echo ucfirst($v["local"]) ?>">
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <br>
                                        <br>
                                        <?php echo "<a href='../BLL/excluirHorario.php?id=".$v["id_horario"]."'><i class='fas fa-trash-alt'></i> Excluir</a>"."<br>" ?>
                                    </div>
                    <?php
                        }
                        } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                    ?>
                    <div class="col-12 col-sm-4">
                    </div>
                    <div class="col-12 col-sm-6">
                        <br>
                        <br>
                        <a href='../UI/index.php'>
                        <button style="background-color: #0844a4; color:white; width: 250px; height: 70px; font-size: 23px; font-weight:bold", 800, 600);>
                            Sair
                        </button>
                        </a>
                    </div>
                    <div class="col-12 col-sm-2">
                    </div>
                </div>
            </div> 
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>