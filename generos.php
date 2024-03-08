<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem de Gêneros</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <style>
            #titulo{
                width: 80%;
            }
        </style>
    </head>
    <body>
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";

           $ordem = $_GET['o'] ?? "n";  
           $chave = $_GET['c'] ?? "";
        ?>

        <div id="corpo">
            <?php 
                $_SESSION['i'] = "g"; 
                include_once "topo.php"; 
            ?>      
            <h1>Listagem de Gêneros</h1>            
            <form method="get" id="busca" action="generos.php">
                Ordenar: 
                <a href="generos.php?o=n&c=<?php echo $chave;?>">Nome</a> | 
                <a href="generos.php?o=c&c=<?php echo $chave;?>">Código</a> | 
                <a href="generos.php">Mostrar Todos</a> | Buscar: <input type="text" name="c" size="10" maxlength="40"/>
                <input type="submit" value="OK"/>
            </form>
            <table class="listagem">
                <?php
                    $q = "select cod, genero from generos ";
                    
                    if (!empty($chave)) {
                        $q .= "where genero like '%$chave%' or cod like '%$chave%' ";
                    }
                               
                    switch ($ordem) {
                        case "n":
                            $q .= "order by genero ";
                            break;
                        case "c":
                            $q .= "order by cod ";
                            break;  
                        default:    
                            $q .= "order by genero ";
                    }
                                   
                    $busca = $banco->query($q);

                    if (!$busca) {       
                        echo "<tr><td>Infelizmente a busca deu errado";
                    } else {
                        if ($busca->num_rows==0) {
                            echo"<tr><td>Nenhum registro encontrado";
                        } else {
                            while ($reg=$busca->fetch_object()) {
                                echo "<tr><td id='titulo'><h1>$reg->genero</h1>"; 
                                echo "<br> [$reg->cod]";

                                if (is_logado()) {                                    
                                    echo "<td><a href='genero_edit_form.php?cod=$reg->cod'><i class='material-icons'>edit</i></a>";
                                    echo "<a href='genero_delete.php?cod=$reg->cod'><i class='material-icons'>delete</i></a>";
                                }
                            }
                        }
                    }
                ?>
            </table>
        </div>
        <?php 
            include_once "rodape.php";
        ?>
    </body>
</html>