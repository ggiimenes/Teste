<?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";

    $codGenero = $_GET['cod'] ?? 0;       
    $q = "select * from generos where cod =$codGenero";    
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();   
?>

<h1>Editar Gênero</h1>
<form action="genero_edit.php" method="POST">
    <table>
        <tr><td>Nome<td> <input type="text" name="nome" id="nome" size="40" maxlength="100" value="<?php echo $reg->genero?>">
        <tr><td><input type="submit" value="Gravar Gênero" data-loading-text="Gravando...">
    </table>
</form>
<?php  
    $_SESSION['cod_g'] = $codGenero; 
?>