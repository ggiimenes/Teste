<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Novo Gênero</title>
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
                    if (!isset($_POST['nome'])) {
                        require "genero_new_form.php";
                    } else {
                        $nome = $_POST['nome'] ?? null;                          

                        if (empty($nome)) {
                            echo msg_erro('Todos os dados são obrigatórios');
                        } else {
                            $q = "insert into generos (genero) values('$nome')";                            

                            if ($banco->query($q)) {
                                echo msg_sucesso("Gênero $nome cadastrado com sucesso");
                            } else {
                                echo msg_erro("Não foi possivel criar o gênero $nome");
                            }
                        }                        
                        }                 
                    }
                    
                echo voltar("g");
            ?>
        </div> 
    </body>
</html>