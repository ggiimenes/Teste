<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Excluir Livro</title>
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
                $c = $_GET['cod'] ?? 0;  
                $busca = $banco->query("select nome from livros where cod='$c'");                              
            
                if (!$busca) {
                    msg_erro("Busca falhou! $banco->error");
                } else {
                    if ($busca->num_rows == 1) {
                        $reg = $busca->fetch_object();

                        $q = "delete from livros where cod=$c";

                        msg_sucesso("$q");
                            
                        if ($banco->query($q)) {
                            echo msg_sucesso("Livro $reg->nome excluído com sucesso");
                        } else {
                            echo msg_erro("Não foi possivel excluir o livro $reg->nome");
                        }
                    } else {
                        msg_erro("Nenhum registro encontrado");
                    }
                }
                
                echo voltar("l") 
            ?>
        </div>         
    </body>
</html>