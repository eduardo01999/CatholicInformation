<?php
include("../DAL/conecta.php");

$id = $_GET["id"];
$descricao = $_POST["descricao"];

try {
    ?>
    <script lanvuage="JavaScript">
        if(confirm("Deseja realmente fazer a alteraçaõ?"))
        {
            <?php
                $stmt = $conn->prepare("UPDATE postagem SET descricao = '$descricao' WHERE id= '$id'"); 
                $stmt->execute();
            ?>
            alert("Registro alteardo!")
            window.close()
        }
        else
        {
            history.go(-1);
        }
    </script>
<?php
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>