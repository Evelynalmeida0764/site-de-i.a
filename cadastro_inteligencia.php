<?php
    require_once 'classe_inteligencia.php';

    session_start();
    if (!isset($_SESSION['usuarioLogado']))
    {
        header("location: login.php?cadIntSemLogin=1");
    }
    $usu = new Inteligencia();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <!--começo barra de navegação-->
    <body class="tela-login">

        <header class="header">
            <nav class="navbar">
                <a href="sobre.html"><img src="imagens/logo2.png" class="logo" alt="Logo gerada por I.A"></a>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="sobre.html" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="cadastro_inteligencia.php" class="nav-link">Registrar Inteligência</a>
                    </li>
                    <li class="nav-item">
                        <a href="cadastro_usuario.php" class="nav-link">Registrar Usuário</a>
                    </li>
                    <?php
                        session_start();
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
            </nav>
        </header>
        <script src="script.js"></script>
        <!--fim barra de navegação-->
        <div class="container">
            <div class="container-login">
                <div class="wrap-login">
                    <form action="" method="POST" class="form-login">
                        <span class="login-from-tittle">
                            <b> Cadastro de inteligencia </b>
                            <br>
                        </span>
                        <div class="wrap-input margin-bottom-35">
                            <input class="input-form" type="text" name="titulo" id="" placeholder="Titulo da Inteligencia">
                            <span class="focus-input-form" placeholder="Titulo da Inteligencia"></span>
                        </div>
                        <div class="wrap-input margin-bottom-35">
                            <input class="input-form" type="text" name="conteudo" id="" placeholder="conteudo da inteligencia">
                            <span class="focus-input-form" placeholder="conteudo da inteligencia"></span>
                        </div>
                        <div class="wrap-input margin-bottom-35">
                            <input class="input-form" type="img" name="imagem" id="" placeholder="imagem da inteligencia">
                            <span class="focus-input-form" placeholder="imagem da inteligencia"></span>
                        </div>
                        <br>
                        <div class="container-login-form-btn">
                            <input class="login-form-btn" type="submit" value="_Cadastrar_">
                            <a href="login.php" class="login-form-btn">_cancelar_</a> 
                        </div>
                        <br>
                        <ul class="login-util">
                            <li class="margin-bottom">
                                <a href="login.php">Voltar</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        
        <?php
            if(isset($_POST['titulo']))
            {
                $titulo = addslashes($_POST['titulo']);
                $conteudo = addslashes($_POST['conteudo']);
                $img = addslashes($_POST['img']);

                //verificar se está tudo preenchido
                if(!empty($titulo) && !empty($conteudo) && !empty($img))
                {
                    $usu->conectar("I_A","localhost","root", "");
                    if($usu->msgErro=="")//está tudo certo, então conectou
                    {
                        $cadastrado = $usu->cadastrar($_POST['titulo'], $_POST['conteudo'], $_POST['imagem']);
                            if ($cadastrado) {
                                // Sucesso no cadastro
                                echo "Inteligência artificial cadastrada com sucesso!";
                            } else {
                                // Falha no cadastro
                                echo "Erro ao cadastrar a inteligência artificial.";
                            }
                    }
                    else
                    {
                        ?>
                            <div>
                                <?php echo "Erro: " .$usu->msgErro;   ?>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                            <p>
                                Preencha todos os campos.
                            </p>
                        </div>
                    <?php
                }

            }
        ?>
    </body>
</html>