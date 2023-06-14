        <header class="header">
            <nav class="navbar">
                <a href="sobre.php"><img src="imagens/logo2.png" class="logo" alt="Logo gerada por I.A"></a>
                <ul class="nav-menu">
                    <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="sobre.php" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="inteligencia_incluir.php" class="nav-link">Registrar Inteligência</a>
                    </li>
                    <li class="nav-item">
                        <a href="cadastro_usuario.php" class="nav-link">Registrar Usuário</a>
                    </li>
                    <?php
                        if (session_status() != PHP_SESSION_ACTIVE) {
                            session_start();
                        }
                        if (isset($_SESSION['usuarioLogado']))
                        {
                    ?>
                            <li class="nav-item">
                                <a href="sair.php" class="nav-link">Sair</a>
                            </li>
                    <?php
                        }
                        else
                        {
                    ?>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="hamburguer">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav   >
        </header>
        <script src="script.js"></script> 
