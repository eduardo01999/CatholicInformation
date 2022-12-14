<?php
include("../BLL/autentica.php");

$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <script src="https://kit.fontawesome.com/61f3f3e294.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CatholicInformation!</title>
    <!-- ABRIR PopUp no centro -->
    <script language="javascript" type="text/javascript">
        function OpenPopupCenter(pagina, titulo, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4; 
            var targetWin = window.open(pagina, titulo, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        } 
    </script>

    <style>
        body {
            background-image: url("img/fundo.jpg");
        }
    </style>

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
                    <div class="col-12 col-sm-3">
                    </div>
                    <!-- Icone para acessar menu usuario -->
                    <div class="col-12 col-sm-2">
                        <a href='perfil.php'><br><i class="fa-solid fa-circle-user" style="font-size: 25px;"></i></a>
                    </div>
                    <!-- Icone para sair -->
                    <div class="col-12 col-sm-2">
                        <a href='../BLL/sair.php'><br><i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 25px;"></i></a>
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
            <img src="./img/LogoAppSemFundo.png" alt="logoApp" display= block width= 550px height= 100px>
        </div>
        <div class="col align-self-end">
        </div>
    </div>
  </div>
  <!-- Botão Abrir local para postagem -->
    <div class="container">
        <main class="row align-items-center">
            <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-2">
                        </div>
                        <div class="col-12 col-sm-1">
                        <br>
                            <button style="background-color: #0844a4; color:white; width: 35px; height: 40px; font-size: 23px; font-weight:bold" onclick="OpenPopupCenter('cadastroPostagem.php', 'TEST!?', 800, 600);">
                                +
                            </button>
                        </div>
                        
                    </div>
            </div>
        </main>
    </div>
    <!-- Inicio de postagens realizadas -->
    <div class="container">
        <main class="row align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-2">
                </div>
                <div class="col-12 col-sm-8">
                    <!-- inicio do card para postagem -->
                    <?php
                        include("../DAL/conecta.php");

                        try {
                        $stmt = $conn->prepare("SELECT post.id as id_postagem, post.id_paroquia, post.descricao, post.path as path_postagem, post.data_inclusao, post.extensao,
                                                par.paroquia, par.path as path_paroquia, par.id as id_da_paroquia
                                                FROM postagem post, paroquia par where $id = id_paroquia and par.id = id_paroquia ORDER BY post.data_inclusao DESC"); 
                        $stmt->execute();

                        // set the resulting array to associative
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                        foreach($stmt->fetchAll() as $k=>$v) { 
                            
                                ?>
                                <br>
                                <div class="card">
                                    <div class="card-body">
                                        <!-- imagem da paroquia, e nome -->
                                        <div class="container-fluid">
                                        <header class="row">
                                            <div class="col-12 col-sm-7">
                                                <h5 class="card-title"> <img src="<?php echo $v["path_paroquia"] ?>" alt="imagemPerfil" class="rounded-circle" width= 60px height= 60px> <?php echo $v["paroquia"] ?></h5>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                            </div>
                                            <div class="col-12 col-sm-1">
                                            <!-- MENU PARA EDIÇÃO E EXCLUSÃO-->
                                            <div class="btn-group">
                                            <button type="button" style="background-color: #0844a4;" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <b>...</b>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item" type="button" onclick="OpenPopupCenter('cadastroPostagem.php?idpostagem=<?php echo $v['id_postagem']; ?>', 'TEST!?', 800, 600);">Editar</button>
                                                    <a href='../BLL/excluirPostagem.php?id=<?php echo $v['id_postagem']; ?>'><button class="dropdown-item" type="button">Excluir</button> </a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        </header>
                                        
                                        <!-- descrição -->
                                        <p class="card-text"><?php echo $v["descricao"] ?></p>
                                        <!-- data da publicação -->
                                        <p class="card-text" style="text-align: end;"><small class="text-muted">Públicado em: <?php echo $v["data_inclusao"] ?></small></p>
                                    </div>
                                    <?php
                                    //Diferenciando arquivos publicados
                                    if ($v["extensao"] == "mp4" or $v["extensao"] == "webm" or $v["extensao"] == "ogg") {
                                        ?>
                                        <video controls> 
                                        <!--<object>
                                            <embed src="demo.mp4" type="application/x-shockwave-flash" 
                                            allowfullscreen="true" allowscriptaccess="always">  		
                                        </object>
                                        -->
                                        <source src="<?php echo $v["path_postagem"] ?>">
                                    </video>
                                <?php
                                    }
                                    else {
                                        ?>
                                        <img class="card-img-bottom" src="<?php echo $v["path_postagem"] ?>" alt="Imagem de capa do card">
                                        <?php
                                    }
                                ?>
                                </div>
                    <?php
                        }
                        } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                    ?>

                    <!-- SALVAR
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> <img src="../UI/imagemPostagem/631a2ffd585f8.png" alt="imagemPerfil" class="rounded-circle" width= 60px height= 60px> Título do card</h5>
                            <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior, para demonstração.</p>
                            <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p>
                        </div>
                        <img class="card-img-bottom" src="../UI/imagemPostagem/631a2ffd585f8.png" alt="imagem da postagem">
                        <video src="../UI/imagemPostagem/testando.mp4"> 
                            <object>
                                <embed src="demo.mp4" type="application/x-shockwave-flash" 
                                allowfullscreen="true" allowscriptaccess="always">  		
                            </object>
                        </video>
                    </div>
                    -->
                </div>
            </div> 
            <!-- fim do card de postagem -->
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>