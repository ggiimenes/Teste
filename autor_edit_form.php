<?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";

    $codAutor = $_GET['cod'] ?? 0;       
    $q = "select * from autores where cod =$codAutor";    
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();   
?>
<h1>Editar Autor</h1>
<form action="autor_edit.php" method="POST">
    <table>
        <tr><td>Nome<td> <input type="text" name="nome" id="nome" size="40" maxlength="100" value="<?php echo $reg->nome?>">
        <tr><td>Foto<td> <input class="form-control" type="file" name="foto" id="foto">
        <tr><td><input type="submit" value="Gravar Autor" data-loading-text="Gravando...">
    </table>
</form>
<?php  
    $_SESSION['cod_a'] = $codAutor; 
?>