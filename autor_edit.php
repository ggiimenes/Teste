<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Editar Autor</title>
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
                $cod = $_SESSION['cod_a'];                            
                $nome = $_POST['nome'] ?? null;
                $foto = $_POST['foto'] ?? null;

                $q = "update autores set nome='$nome', foto='$foto' where cod=$cod";                                        

                if ($banco->query($q)) {
                    echo msg_sucesso("Autor alterado com sucesso");                        
                } else {
                    echo msg_erro("Não foi possivel alterar o autor");
                }                
            }
        
            echo voltar("a");
        ?>
        </div>
        <?php 
            require_once "rodape.php";
        ?> 
    </body>
</html>