<?php
include("../DAL/conecta.php");

$idparoquia = $_POST["id_paroquia"];
$descricao = $_POST["descricao"];


try {
    if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
      
        if($arquivo['error'])
            die("Falha ao enviar arquivo");
      
        $pasta = "../UI/imagemPostagem/";
        $nomeArquivo = $arquivo['name'];
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
      
        if($extensao != 'jpg' && $extensao != 'png')
            die("Tipo de arquivo não aceito");
      
      
        $path = $pasta . $novoNomeArquivo . "." . $extensao;
      
        $deuCerto = move_uploaded_file($arquivo["tmp_name"], $path);
        if($deuCerto) {
            $conexao->query("INSERT INTO postagem (id, id_paroquia, descricao, path) 
            VALUES (NULL, '$idparoquia', '$descricao', '$path')") or die($conexao->error);
            echo "Registro efetuado com sucesso!";
        }
            
        else
            echo "Falha ao efetuar cadastro!";
      }
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>