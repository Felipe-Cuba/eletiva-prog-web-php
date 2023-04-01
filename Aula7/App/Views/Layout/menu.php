<header>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">FATEC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" <?php if ($viewVar['nameController'] == "HomeController") { ?> class="active"
                        <?php } ?>>
                        <a class="nav-link active" aria-current="page" href="http://<?php echo APP_HOST; ?>">Home</a>
                    </li>
                    <li class="nav-item" <?php if ($viewVar['nameController'] == "UsuarioController") { ?>
                        class="active" <?php } ?>>
                        <a class="nav-link" href="http://<?php echo APP_HOST; ?>/usuario/cadastro">Cadastro de
                            Usuário</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>