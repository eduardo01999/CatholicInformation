<?php
include("../DAL/conecta.php");

$id = $_GET["id"];
$excluir = false;
try {
    ?>
    <script lanvuage="JavaScript">
        if(confirm("Deseja realmente excluir esse horário?"))
        {
            $excluir = true;
            excluir();
            alert("Registro excluido com sucesso!");
            history.go(-1);
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
?>
<script>
      function excluir() {
        <?php
        if ($excluir != false) {
            $stmt = $conn->prepare("DELETE FROM horario_missa WHERE id_horario=$id"); 
            $stmt->execute();
        }
        else {
            exit();
        }
        ?>
      }
</script>

<?php
$conn = null;

?>