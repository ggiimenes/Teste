<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem de Editoras</title>
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
                $_SESSION['i'] = "e"; 
                include_once "topo.php"; 
            ?>     
            <h1>Listagem de Editoras</h1>           
            <form method="get" id="busca" action="editoras.php">
                Ordenar: 
                <a href="editoras.php?o=n&c=<?php echo $chave;?>">Nome</a> | 
                <a href="editoras.php?o=c&c=<?php echo $chave;?>">Código</a> | 
                <a href="editoras.php?o=p&c=<?php echo $chave;?>">País</a> | 
                <a href="editoras.php">Mostrar Todos</a> | Buscar: <input type="text" name="c" 
                size="10" maxlength="40"/>
                <input type="submit" value="OK"/>
            </form>
            <table class="listagem">
                <?php
                    $q = "select cod, editora, pais from editoras ";
                    
                    if (!empty($chave)) {
                        $q .="where editora like '%$chave%' or cod like '%$chave%' or pais like '%$chave%'";
                    }
                               
                    switch ($ordem){
                        case "n":
                            $q .="order by editora ";
                            break;
                        case "c":
                            $q .="order by cod ";
                            break;  
                        case "p":
                            $q .="order by pais ";
                            break;  
                        default:    
                            $q .="order by editora ";
                    }
                                   
                    $busca = $banco->query($q);

                    if (!$busca) {       
                        echo "<tr><td>Infelizmente a busca deu errado";
                    } else {
                        if ($busca->num_rows==0) {
                            echo"<tr><td>Nenhum registro encontrado";
                        } else {
                            while ($reg=$busca->fetch_object()) {
                                echo "<tr><td id='titulo'><h1>$reg->editora</h1>"; 
                                echo "<br> [$reg->cod]";
                                echo "<br> $reg->pais";

                                if (is_logado()) {                                    
                                    echo "<td><a href='editora_edit_form.php?cod=$reg->cod'><i class='material-icons'>edit</i></a>";
                                    echo "<a href='editora_delete.php?cod=$reg->cod'><i class='material-icons'>delete</i></a>";
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