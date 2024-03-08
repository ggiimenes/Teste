<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Excluir Editora</title>
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
                
                $busca = $banco->query("select editora from editoras where cod='$c'");
                                
                if (!$busca) {
                    msg_erro("Busca falhou! $banco->error");
                } else {
                    if ($busca->num_rows == 1) {
                        $reg = $busca->fetch_object();

                        $busca = $banco->query("select * from livros where cod_editora=$c");

                        if ($busca->num_rows == 0) {

                            $q = "delete from editoras where cod=$c";
                                
                            if ($banco->query($q)) {
                                echo msg_sucesso("Editora $reg->editora excluída com sucesso");
                            } else {
                                echo msg_erro("Não foi possivel excluir a editora $reg->editora");
                            }
                        } else {
                            msg_erro("A editora está vinculada à livros");    
                        }
                    } else {
                        msg_erro("Nenhum registro encontrado");
                    }
                }                 
                
                echo voltar("e") 
            ?>
        </div>         
    </body>
</html>