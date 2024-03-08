<?php
    require_once "includes/login.php";

    $index = $_SESSION["i"];

    echo "<header>";
    
    if (empty($_SESSION['user'])) {
        echo "<a href='user_login.php'>Entrar</a>";
    }
    else {
        echo "Olá,<strong> " . $_SESSION['nome']."</strong> |";

        if ($index == 'l') {
            echo "<a href='livro_new.php'> Novo Livro </a> | ";
        } else {
            echo "<a href='index.php'> Livros </a> | ";    
        }

        if ($index == 'a') {
            echo "<a href='autor_new.php'> Novo Autor </a> | ";
        } else {
            echo "<a href='autores.php'> Autores </a> | ";
        }

        if ($index == 'e') {
            echo "<a href='editora_new.php'> Nova Editora </a> | ";
        } else {
            echo "<a href='editoras.php'> Editoras </a> | ";
        }

        if ($index == 'g') {
            echo "<a href='genero_new.php'> Novo Genêro </a> | ";
        } else {
            echo "<a href='generos.php'> Genêros </a> | ";
        }

        echo "<a href='user_new.php'> Novo Usuário </a> | "; 
        echo "<a href='user_logout.php'> Sair </a>";
    }
    echo "</header>";
?>