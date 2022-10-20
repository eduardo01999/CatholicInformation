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
            $_SESSION['id']=$id;

            header("Location: ../UI/home.php");
            exit();
        }
        else {
            header('Location: ../UI/index.php');
            exit();
        }
    }
    else {
        //exibe mensagem que senha esta incorreta e redireciona para index

        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Senha incorreta!')
            window.location.href='../UI/index.php';
            </SCRIPT>");
    }
    
    
}   catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

?>