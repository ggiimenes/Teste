<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Excluir Autor</title>
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
                
                $busca = $banco->query("select nome from autores where cod='$c'");
                                
                if (!$busca) {
                    msg_erro("Busca falhou! $banco->error");
                } else {
                    if ($busca->num_rows == 1) {
                        $reg = $busca->fetch_object();

                        $busca = $banco->query("select * from livros where cod_autor=$c");

                        if ($busca->num_rows == 0) {

                            $q = "delete from autores where cod=$c";
                                
                            if ($banco->query($q)) {
                                echo msg_sucesso("Autor $reg->nome excluído com sucesso");
                            } else {
                                echo msg_erro("Não foi possivel excluir o autor $reg->nome");
                            }
                        } else {
                            msg_erro("O autor está vinculado à livros");    
                        }
                    } else {
                        msg_erro("Nenhum registro encontrado");
                    }
                }
                                 
                echo voltar("a") 
            ?>
        </div>         
    </body>
</html>