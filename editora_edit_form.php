<?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";

    $codEditora = $_GET['cod'] ?? 0;       
    $q = "select * from editoras where cod =$codEditora";    
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();   
?>
<h1>Editar Editora</h1>
<form action="editora_edit.php" method="POST">
<table>
        <tr><td>Nome<td> <input type="text" name="nome" id="nome" size="40" maxlength="100" value="<?php echo $reg->editora?>">
        <tr><td>Pais<td> <input type="text" name="pais" id="pais" size="40" maxlength="100" value="<?php echo $reg->pais?>">
        <tr><td><input type="submit" value="Gravar Editora" data-loading-text="Gravando...">
    </table>

</form>
<?php  
    $_SESSION['cod_e'] = $codEditora; 
?>