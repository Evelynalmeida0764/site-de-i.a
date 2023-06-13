<?php
    require_once 'usuarios.php';
    $usu = new Usuario();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="tela-login">
    <header class="header">
        <nav class="navbar">
            <img src="imagens/logo2.png" class="logo" alt="Logo gerada por I.A">
            <ul class="nav-menu">
                <li class="nav-item">
                <a href="index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="sobre.html" class="nav-link">Sobre</a>
                </li>
                <li class="nav-item">
                    <a href="cadastro.php" class="nav-link">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
            </ul>
            <div class="hamburguer">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <script src="script.js"></script>
    
    <div class="container">
        <div class="container-login">
            <div class="wrap-login">
                <form class="form-login">
                    <span class="login-from-tittle">
                        LOGIN
                    </span>
                    <div class= "wrap-input margin-top-35 margin-bottom-35">
                        <input type="email" name="email" class="input-form">
                        <span class="focus-input" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input margin-bottom-35">
                        <input type="password" name="senha" class="input-form">
                        <span class="focus-input-form" data-placeholder="Senha"></span>
                    </div>
                    <div class="container-login-form-btn">
                        <button class="login-form-btn">LOGAR</button>
                    </div>
                    <ul class="login-util">
                        <li class="margin-bottom">
                            <a href="cadastro.html" class="texto2">Cadastre-se</a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>Todos os direitos reservados.</p>
        <div class="midia-icons">
            <a href="https://github.com/Evelynalmeida0764" class="link"><i class="fa-brands fa-github"></i></a>
            <a href="https://twitter.com/loveyoudoguin" class="link"><i class="fa-brands fa-twitter"></i></a>
            <a href="" class="link"><i class="fa-brands fa-discord" class="link"></i></a>
        </div>
    </footer>

    <?php
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            if(!empty($email) && !empty($senha))
            {
                $usu->conectar("I_A","localhost","root", "");
                if($usu->msgErro == "")
                {
                    if($usu->logar($email,$senha))
                    {
                        header("location: cadastro_inteligencia.php");
                    }
                    else
                    {
                        ?>
                            <div class="msg-erro">
                                <p>Email ou Senha estão incorretos</p>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                            <?php echo "Erro: ".$usu->msgErro ?>
                        </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <span class="msg-erro">
                        <p>Preencha todos os campos</p>
                    </span>
                <?php
            }

        }
    ?>
    
</body>
</html>