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

/*
try {
  $sql = "INSERT INTO paroquia (paroquia, paroco, email, senha, cnpj, estado, cidade, cep, endereco, numero, telefone, id, arquivo) 
  VALUES ('$paroquia', '$paroco', '$email', '$senha', '$cnpj', '$estado', '$cidade', '$cep', '$endereco', '$numero', '$telefone', NULL, '$nomeArquivo')";

  $stmt = $conn->prepare($sql); 
  $stmt->execute();

  echo "Novo Registro Inserido com sucesso!<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
*/

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
      $conexao->query("INSERT INTO paroquia (paroquia, paroco, email, senha, cnpj, estado, cidade, cep, endereco, numero, telefone, id, arquivo, path) 
      VALUES ('$paroquia', '$paroco', '$email', '$senha', '$cnpj', '$estado', '$cidade', '$cep', '$endereco', '$numero', '$telefone', NULL, '$nomeArquivo', '$path')") or die($conexao->error);
      echo "Registro efetuado com sucesso!";
  }
      
  else
      echo "Falha ao efetuar cadastro!";
  
}
?>