<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Editar Livro</title>
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
                $cod = $_SESSION['cod_l'];                            
                $nome = $_POST['nome'] ?? null;
                $autor = $_POST['autor'] ?? null;
                $genero = $_POST['genero'] ?? null;
                $editora = $_POST['editora'] ?? null;
                $resumo = $_POST['resumo'] ?? null;                        
                $capa = $_POST['capa'] ?? null; 

                $q="update livros set nome='$nome', cod_autor=$autor, cod_genero=$genero, cod_editora=$editora, resumo='$resumo', capa='$capa' where cod=$cod";                                        

                if ($banco->query($q)) {
                    echo msg_sucesso("Livro alterado com sucesso");                        
                } else {
                    echo msg_erro("Não foi possivel alterar o livro");
                }                
            }
            
            echo voltar("l");
        ?>
        </div>
        <?php 
            require_once "rodape.php";
        ?> 
    </body>
</html>