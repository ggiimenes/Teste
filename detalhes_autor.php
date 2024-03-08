<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Detalhes do Autor</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
        ?>
        <div id="corpo">            
            <?php
                $_SESSION['i'] = "";
                include_once "topo.php";

                $c = $_GET['cod'] ?? 0; 
                $busca = $banco->query("select * from autores where cod='$c'");
            ?>
            <h1>Detalhes do Autor</h1>
            <table class='detalhes'>
                <?php
                    if (!$busca) {
                        echo "<tr><td>Busca falhou. $banco->error";
                    } else {
                        if ($busca->num_rows == 1) {
                            $reg = $busca->fetch_object();
                            $t = imagens($reg->foto);
                            echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                            echo "<td><h2>$reg->nome</h2>";   
                            echo "<br>[$reg->cod]";

                            if (is_logado()) {
                                echo "<br><a href='autor_edit_form.php?cod=$reg->cod'><i class='material-icons'>edit</i></a>";
                                echo "<a href='autor_delete.php?cod=$reg->cod'><i class='material-icons'>delete</i></a>";
                            }                                                                  
                        } else {
                            echo "<tr><td>Nenhum registro encontrado";
                        }
                    }
                ?>
            </table>
            <?php 
                echo voltar("a") 
            ?>
        </div> 
        <?php 
            include_once "rodape.php";
        ?>
    </body>
</html>


