<?php
$data = date("j/m/Y");
$hora = date("H:i:s");
?>
<header>
    <div class="container12">
        <div class="row">
            <div class="column2">
                <a class="logo" href="">
                    <h1>Admin</h1>
                </a>
            </div>

            <nav class="column10">
                <ul>
                    <li><a href="<?php echo $caminho; ?>/admin/">Home</a></li>
                    <li><a href="<?php echo $caminho; ?>/admin/usuarios/index.php">Usuários</a></li>
                    <li><a href="<?php echo $caminho; ?>/admin/fornecedores/index.php">Fornecedores</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>