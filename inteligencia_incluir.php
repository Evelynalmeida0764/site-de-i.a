<?php
    require_once 'classe_inteligencia.php';

    session_start();
    if (!isset($_SESSION['usuarioLogado']))
    {
        header("location: login.php?cadastroInteligenciaSemLogin");
    }
    $intelig = new Inteligencia();
?>

<!DOCTYPE html>
<html lang="en">
    <?php
        require_once 'head.php';
    ?>
    <!--começo barra de navegação-->
    <body class="tela-login">
        <?php
            require_once 'header.php';
        ?>
        <!--fim barra de navegação-->
        <div class="container">
            <div class="container-login">
                <div class="wrap-login">
                    <form action="" method="POST" class="form-login">
                        <span class="login-from-tittle">
                            <b> Cadastro de inteligencia </b>
                        </br></br>
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
                            <input class="login-form-btn" type="submit" value="Cadastrar">
                            <a href="login.php" class="login-form-btn">Cancelar</a> 
                        </div>
                        <br>
                        <ul class="login-util">
                            <li class="margin-bottom">
                                <a href="index.php">Voltar</a>
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
                $img = addslashes($_POST['imagem']);

                //verificar se está tudo preenchido
                if(!empty($titulo) && !empty($conteudo) && !empty($img))
                {
                    $intelig->conectar();
                    if($intelig->msgErro=="")//está tudo certo, então conectou
                    {
                        $cadastrado = $intelig->cadastrar($titulo, $conteudo, $img);
                        if ($cadastrado) {
                            // Sucesso no cadastro
                            echo "Inteligência artificial cadastrada com sucesso!";
                        } else {
                            // Falha no cadastro
                            echo "Erro ao cadastrar a inteligência artificial";
                        }
                    }
                    else
                    {
                        ?>
                            <div>
                                <?php echo "Erro: " .$intelig->msgErro;   ?>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                            <p>
                                Preencha todos os campos
                            </p>
                        </div>
                    <?php
                }

            }
        ?>
        <?php
            require_once 'footer.php';
        ?>
    </body>

    </html>