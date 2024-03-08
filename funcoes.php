<?php
    function imagens($arq) {
        $caminho = "Imagens/$arq";

        if (is_null($arq) || !file_exists($caminho)) {
            return "Imagens/indisponivel.png";
        } else {
            return $caminho;
        }
    }

    function voltar($i) {
        if ($i == "a") {
            $r = "<a href='autores.php'><span class='material-icons'>arrow_back</span></a>";    
        } else if ($i == "e") {
            $r = "<a href='editoras.php'><span class='material-icons'>arrow_back</span></a>";    
        } else if ($i == "g") {
            $r = "<a href='generos.php'><span class='material-icons'>arrow_back</span></a>";    
        } else {
            $r = "<a href='index.php'><span class='material-icons'>arrow_back</span></a>";   
        }

        return $r;
    }

    function msg_sucesso($m) {
        $resp = "<div class='sucesso'><span class='material-icons'>check_circle</span>$m</div>";
        return $resp;
    }

    function msg_erro($m) {
        $resp = "<div class='erro'><span class='material-icons'>error</span>$m</div>";
        return $resp;
    }
?>