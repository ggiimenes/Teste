<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Editar Gênero</title>
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
            if (!is_logado()) {
                echo msg_erro('Área restrita! Faça login!');
            } else {
                $cod = $_SESSION['cod_g'];                            
                $nome = $_POST['nome'] ?? null;

                $q = "update generos set genero='$nome' where cod=$cod";                                        

                if ($banco->query($q)) {
                    echo msg_sucesso("Gênero alterado com sucesso");                        
                } else {
                    echo msg_erro("Não foi possivel alterar o gênero");
                }                
            }
            
            echo voltar("g");
            ?>
        </div>
        <?php 
            require_once "rodape.php";
        ?> 
    </body>
</html>