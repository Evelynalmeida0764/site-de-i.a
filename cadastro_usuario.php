<?php
    require_once 'classe_usuario.php';
    $usu = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php
        require_once "head.php"
    ?>
    <!--começo barra de navegação-->
    <body class="tela-login">
        <?php
            require_once "header.php"
        ?>
        <div class="container">
            <div class="container-login">
                <div class="wrap-login">
                    <form action="" method="POST" class="form-login">
                        <span class="login-from-tittle">
                            <b> Cadastro de Usuário </b>
                            <br>
                            <br>
                        </span>
                        <div class="wrap-input">
                            <input class="input-form" type="text" name="nome" id="" placeholder="Nome Completo">
                            <span class="focus-input-form" placeholder="Nome Completo"></span>
                        </div>
                        <div class="wrap-input">
                        <input class="input-form" type="tel" name="telefone" id="" placeholder="Número de Telefone">
                            <span class="focus-input-form" data-placeholder="Número de Telefone"></span>
                        </div>
                        <div class= "wrap-input">
                        <input class="input-form" type="email" name="email" id="" placeholder="Digite Seu Email">
                            <span class="focus-input" data-placeholder="Email"></span>
                        </div>
                        <div class="wrap-input">
                            <input class="input-form" type="password" name="senha" id="" placeholder="Crie Sua Senha">
                            <span class="focus-input-form" data-placeholder="Senha"></span>
                        </div>
                        <div class="wrap-input">
                            <input class="input-form" type="password" name="confSenha" id="" placeholder="Confirme sua Senha">
                            <span class="focus-input-form" data-placeholder="Confime sua senha"></span>
                        </div>
                        <br>
                        <div class="container-login-form-btn">
                            <input class="login-form-btn" type="submit" value="Cadastrar">
                            <a href="index.php" class="login-form-btn">Cancelar</a> 
                        </div>
                        <br>
                        <ul class="login-util">
                            <li class="margin-bottom">
                                <a href="index.php" class="texto2">Voltar</a>
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
            if(isset($_POST['nome']))
            {
                $nome = addslashes($_POST['nome']);
                $telefone = addslashes($_POST['telefone']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $confsenha = addslashes($_POST['confSenha']);

                //verificar se está tudo preenchido
                if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confsenha))
                {
                    $usu->conectar("I_A","localhost","root", "");
                    if($usu->msgErro=="")//está tudo certo, então conectou
                    {
                        if($senha == $confsenha)
                        {
                            if($usu->cadastrar($nome, $telefone, $email, $senha))
                            {
                                ?>
                                    <div>
                                        <p>
                                            Usuário Cadastrado com Sucesso.
                                            <a href="login.php">LOGAR</a>
                                        </p>
                                    </div>
                                <?php
                            }else
                            {
                                ?>
                                    <div>
                                        <p>
                                        Usuário Já Cadastrado.
                                        </p>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <div>
                                    <p>
                                        Senha e Confirmar Senha não Confere.
                                    </p>
                                </div>
                            <?php
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