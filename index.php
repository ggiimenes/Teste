<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem de Livros</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                $_SESSION['i'] = "l"; 
                include_once "topo.php"; 
            ?>      
            <h1>Listagem de Livros</h1>            
            <form method="get" id="busca" action="index.php">
                Ordenar: 
                <a href="index.php?o=n&c=<?php echo $chave;?>">Nome</a> | 
                <a href="index.php?o=e&c=<?php echo $chave;?>">Editora</a> | 
                <a href="index.php?o=a&c=<?php echo $chave;?>">Autor</a> | 
                <a href="index.php?o=g&c=<?php echo $chave;?>">Gênero</a> |
                <a href="index.php">Mostrar Todos</a> | Buscar: <input type="text" name="c" size="10" maxlength="40"/>
                <input type="submit" value="OK"/>
            </form>
            <table class="listagem">
                <?php
                    $q="select l.cod, l.nome, l.capa, g.genero, e.editora, a.nome as autor from livros l inner join generos g on l.cod_genero=g.cod inner join editoras e on l.cod_editora=e.cod inner join autores a on l.cod_autor=a.cod ";
                    
                    if (!empty($chave)) {
                        $q .= "where l.nome like '%$chave%' or e.editora like '%$chave%' or g.genero like '%$chave%' or a.nome like '%$chave%' ";
                    }
                               
                    switch ($ordem) {
                        case "n":
                            $q .= "order by l.nome ";
                            break;
                        case "e":
                            $q .= "order by e.editora ";
                            break;
                        case "g":
                            $q .= "order by g.genero ";
                            break;    
                        case "a":
                            $q .= "order by a.nome ";
                            break;  
                        default:    
                            $q .= "order by l.nome ";
                    }                  
                
                    $busca = $banco->query($q);

                    if (!$busca) {       
                        echo "<tr><td>Infelizmente a busca deu errado";
                    } else {
                        if ($busca->num_rows==0) {
                            echo"<tr><td>Nenhum registro encontrado";
                        } else {
                            while ($reg=$busca->fetch_object()) {
                                $t = imagens($reg->capa); 
                                echo "<tr><td id='titulo'><h1>$reg->nome</h1>";
                                echo "<br>$reg->autor";
                                echo "<br>$reg->editora";
                                echo "<br>[$reg->genero]";
                                echo "<a href='detalhes.php?cod=$reg->cod'>Detalhes</a>";                                    

                                if (is_logado()) {                                    
                                    echo "<td><a href='livro_edit_form.php?cod=$reg->cod'><i class='material-icons'>edit</i></a>";
                                    echo "<a href='livro_delete.php?cod=$reg->cod'><i class='material-icons'>delete</i></a>";
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