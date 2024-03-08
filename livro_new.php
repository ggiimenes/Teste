<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Novo Livro</title>
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
                    require "livro_new_form.php";
                } else {
                    $nome = $_POST['nome'] ?? null;
                    $autor = $_POST['autor'] ?? null;
                    $genero = $_POST['genero'] ?? null;
                    $editora = $_POST['editora'] ?? null;
                    $resumo = $_POST['resumo'] ?? null;                        
                    $capa = $_POST['capa'] ?? null;                              

                    if (empty($nome) || empty($genero) || empty($editora) || empty($resumo) || empty($autor)) {
                        echo msg_erro('Todos os dados são obrigatórios');
                    } else {
                        $q = "insert into livros (nome, cod_genero, cod_editora, cod_autor, resumo, capa) values('$nome', $genero, $editora, $autor,'$resumo', '$capa')";
            
                        if ($banco->query($q)) {
                            echo msg_sucesso("Livro $nome cadastrado com sucesso");
                        } else {
                            echo msg_erro("Não foi possivel criar o livro $nome");
                        }
                    }                        
                }                 
            }
            echo voltar("l");
        ?>
        </div> 
    </body>
</html>