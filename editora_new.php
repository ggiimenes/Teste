<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Nova Editora</title>
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
                        require "editora_new_form.php";
                    } else {
                        $nome = $_POST['nome'] ?? null;                         
                        $pais = $_POST['pais'] ?? null;

                            if (empty($nome) || empty($pais)) {
                                echo msg_erro('Todos os dados são obrigatórios');
                            } else {
                                $q = "insert into editoras (editora, pais) values('$nome', '$pais')";                            

                                if ($banco->query($q)) {
                                    echo msg_sucesso("Editora $nome cadastrado com sucesso");
                                } else {
                                    echo msg_erro("Não foi possivel criar a editora $nome");
                                }
                            }                        
                        }                 
                    }

                echo voltar("e");
            ?>
        </div> 
    </body>
</html>