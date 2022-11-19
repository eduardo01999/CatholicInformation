<?php
include("../DAL/conecta.php");

$paroquia = $_POST["paroquia"];
$paroco = $_POST["paroco"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
$cnpj = $_POST["cnpj"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$telefone = $_POST["telefone"];
$deSemana = $_POST["de_semana"];
$ateSemana = $_POST["ate_semana"];
$deSabado = $_POST["de_sabado"];
$ateSabado = $_POST["ate_sabado"];


try {
  if(isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];
  
    if($arquivo['error'])
        die("Falha ao enviar arquivo");
  
    $pasta = "../UI/imagemParoquia/";
    $nomeArquivo = $arquivo['name'];
    $novoNomeArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
  
    if($extensao != 'jpg' && $extensao != 'png')
        die("Tipo de arquivo não aceito");
  
  
    $path = $pasta . $novoNomeArquivo . "." . $extensao;
  
    $deuCerto = move_uploaded_file($arquivo["tmp_name"], $path);
    if($deuCerto) {
        $conexao->query("INSERT INTO paroquia (paroquia, paroco, email, senha, cnpj, estado, cidade, cep, endereco, numero, telefone, id, arquivo, path, de_semana, ate_semana, de_sabado, ate_sabado) 
        VALUES ('$paroquia', '$paroco', '$email', '$senha', '$cnpj', '$estado', '$cidade', '$cep', '$endereco', '$numero', '$telefone', NULL, '$nomeArquivo', '$path', '$deSemana', '$ateSemana', '$deSabado', '$ateSabado')") or die($conexao->error);
        ?>
        <script>
        alert("Registro efetuado com sucesso!");
        window.location.href = "../UI/index.php";
        </script>
        <?php
    }
        
    else
        ?>
        <script>
        alert("Falha ao efetuar cadastro!");
        history.go(-1);
        </script>
        <?php
    
  }
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;



?>