<h1>Novo Livro</h1>
<form action="livro_new.php" method="POST">
    <table>
        <tr><td>Nome<td> <input type="text" name="nome" id="nome" size="40" maxlength="100">
        <tr><td>Autor<td>  
        <?php 
            $sql = mysqli_query($banco, "select cod, nome from autores order by cod");
        ?>
            <select name="autor" id="autor">                
            <?php
                while ($resultado = mysqli_fetch_assoc($sql)) { 
            ?>     
                <option value="<?php echo $resultado['cod']; ?>">
                <?php 
                    echo $resultado['nome']; 
                ?>
                </option>
            <?php 
                } 
            ?>
            </select>
        <tr><td>Gênero<td>  
        <?php 
            $sql = mysqli_query($banco, "select cod, genero from generos order by cod");
        ?>
            <select name="genero" id="genero">
            <?php
                while ($resultado = mysqli_fetch_assoc($sql)) { 
            ?>                         
                <option value="<?php echo $resultado['cod'] ?>">
                <?php
                    echo $resultado['genero']; 
                ?>
                </option>
            <?php 
                } 
            ?>
            </select>
        <tr><td>Editora<td> 
        <?php 
            $sql = mysqli_query($banco, "select cod, editora from editoras order by cod");
        ?>
            <select name="editora" id="editora">
            <?php
                while ($resultado = mysqli_fetch_assoc($sql)) { 
            ?>     
                <option value="<?php echo $resultado['cod'] ?>">
                <?php 
                    echo $resultado['editora']; 
                ?>
                </option>
            <?php 
                } 
            ?>
            </select>
        <tr><td>Resumo<td> <input type="text" name="resumo" id="resumo" size="50" maxlength="1000">        
        <tr><td>Capa<td> <input class="form-control" type="file" name="capa" id="capa">
        <tr><td><input type="submit" value="Gravar Livro" data-loading-text="Gravando...">
    </table>
</form>