<?php
include("../DAL/conecta.php");

$id = $_GET["id"];

try {
    ?>
    <script lanvuage="JavaScript">
        if(confirm("Deseja realmente excluir esse horário?"))
        {
            <?php
                $stmt = $conn->prepare("DELETE FROM horario_missa WHERE id_horario=$id"); 
                $stmt->execute();
            ?>
            alert("Registro excluido com sucesso!")
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