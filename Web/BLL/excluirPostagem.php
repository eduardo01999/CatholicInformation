<?php
include("../DAL/conecta.php");

$id = $_GET["id"];

try {
    ?>
    <script lanvuage="JavaScript">
        if(confirm("Deseja realmente excluir essa postagem?"))
        {
            <?php
                $stmt = $conn->prepare("DELETE FROM postagem WHERE id=$id"); 
                $stmt->execute();
            ?>
            alert("Postagem excluida!")
            history.go(-1);
        }
        else
        {
            alert("Você cancelou!")
            history.go(-1);
        }
    </script>
<?php
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>