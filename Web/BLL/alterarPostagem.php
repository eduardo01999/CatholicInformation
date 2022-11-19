<?php
include("../DAL/conecta.php");

$id = $_GET["id"];
$descricao = $_POST["descricao"];

try {
    ?>
    <script lanvuage="JavaScript">
        <?php
            if(isset($_FILES['arquivo'])) {
                $arquivo = $_FILES['arquivo'];

                $pasta = "../UI/imagemPostagem/";
                $nomeArquivo = $arquivo['name'];
                $novoNomeArquivo = uniqid();
                $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
            
                $path = $pasta . $novoNomeArquivo . "." . $extensao;
            
                $deuCerto = move_uploaded_file($arquivo["tmp_name"], $path);
                if($deuCerto) {
                    $stmt = $conn->prepare("UPDATE postagem SET descricao = '$descricao', path = '$path' WHERE id= '$id'"); 
                    $stmt->execute();
                    exit();
                    echo "Registro alterado com sucesso!";
                }
                else
                    $stmt = $conn->prepare("UPDATE postagem SET descricao = '$descricao' WHERE id= '$id'"); 
                    $stmt->execute();
                }
                ?>
                alert("Registro alteardo!")
                window.close()
        <?php
        
?>
            
    </script>
<?php
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>