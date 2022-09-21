<?php
include("../DAL/conecta.php");

$idparoquia = $_POST["id_paroquia"];
$horario = $_POST["horario"];
$dia = $_POST["dia"];
$local = $_POST["local"];


try {
    $sql = "INSERT INTO horario_missa (id_horario, id_paroquia, horario, dia, local) 
    VALUES (NULL, '$idparoquia', '$horario', '$dia', '$local')";
  
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
  
    echo "Novo Registro Inserido com sucesso!<br>";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;
  ?>