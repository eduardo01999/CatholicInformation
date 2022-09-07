<?php
session_start();
include("../DAL/conecta.php");

if(empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../UI/index.php');
    exit();
}

$email=$_POST['email'];
$senha=$_POST['senha'];


try {
    //PEGA SENHA DO BANCO DE DADOS
    $stmt = $conn->prepare("SELECT senha FROM paroquia WHERE email='{$email}'"); 
    $stmt->execute();
    if ($stmt->rowCount()) {  
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach($stmt->fetchAll() as $k=>$v) { 
            $senhaDB = $v["senha"];
        }
    }

    //VERIFICA SE A SENHA ESTA CORRETA
    if(password_verify($senha,$senhaDB)){
        //PEGA ID E EMAIL DO BANCO DE DADOS
        $stmt = $conn->prepare("SELECT id, email FROM paroquia WHERE email='{$email}'"); 
        $stmt->execute();
        if ($stmt->rowCount()) {  
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            foreach($stmt->fetchAll() as $k=>$v) { 
                $id = $v["id"];
            }
            $SESSION['email']=$email;

            header("Location: ../UI/home.php?id=$id");
            exit();
        }
        else {
            header('Location: ../UI/index.php');
            exit();
        }
    }
    
    
}   catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

?>