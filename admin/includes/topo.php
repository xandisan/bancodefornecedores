<header id="menuHeader">
    <div class="container12">
        <div class="row">
            <div class="column2">
                <a class="logo" href="<?php echo $caminho; ?>/admin/fornecedores/">
                    <a href="">
                        <img src="<?php echo $caminho; ?>/img/logo2.png" alt="">
                    </a>
                </a>
            </div>
            <div id="btn-sanduiche">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <nav class="column10">
                <ul>
                    <!-- <li><a href="<?php echo $caminho; ?>/admin/">Home</a></li> -->
                    <li><a href="<?php echo $caminho; ?>/admin/fornecedores/index.php">Fornecedores</a></li>
                    <li><a href="<?php echo $caminho; ?>/admin/perfil/index.php">Perfil</a></li>
                    <?php
						$connl = conexao();
                        $sql_perfil = "SELECT * FROM usuarios WHERE login = '$logado'";
                        $perfil = mysqli_query($connl,$sql_perfil);
                        while ($res = mysqli_fetch_array($perfil)){
                        $tipo_de_usuario = ($res['id_tipo_usuario']);
                        if($tipo_de_usuario == 1){    
                    ?>
                    <li><a href="<?php echo $caminho; ?>/admin/usuarios/index.php">Usuários</a></li> 
                    <?php
                        }else{
                        }
                    } 
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>