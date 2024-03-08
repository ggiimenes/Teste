<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Editar Editora</title>
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
                $cod = $_SESSION['cod_e'];                            
                $nome = $_POST['nome'] ?? null;
                $pais = $_POST['pais'] ?? null;

                $q = "update editoras set editora ='$nome', pais ='$pais' where cod = $cod";    
    
                if ($banco->query($q)) {
                    echo msg_sucesso("Editora alterada com sucesso");                        
                } else {
                    echo msg_erro("Não foi possivel alterar a editora");
                }                
            }
            
            echo voltar("e");
        ?>
        </div>
        <?php 
            require_once "rodape.php";
        ?> 
    </body>
</html>