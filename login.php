<?php
    require_once 'classe_usuario.php';
    $usu = new Usuario();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php
        require_once 'head.php';
    ?>
    <body class="tela-login">
        <?php
            require_once 'header.php';
        ?>
        <div class="container">
            <div class="container-login">
                <div class="wrap-login">
                    <form class="form-login" method="POST">
                        <?php
                        if (isset($_GET['cadastroInteligenciaSemLogin'])) {
                        ?>
                            <div style="color: red;" >
                                <p>É necessário fazer login antes de registrar inteligências</p>
                            </div>
                            </br>
                        <?php
                        }
                        ?>
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
                            <input type="submit" value="Logar">
                        </div>
                        <br>
                        <ul class="login-util">
                            <li class="margin-bottom">
                                <a href="cadastro_usuario.php" class="texto2">Cadastre-se</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
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
                            header("location: inteligencia_incluir.php");

                            session_start();
                            $_SESSION['usuarioLogado'] = $email;
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
            require_once 'footer.php';
        ?>
    </body>
</html>