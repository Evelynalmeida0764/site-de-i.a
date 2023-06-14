<?php
    require_once 'classe_inteligencia.php';

    session_start();
    if (!isset($_SESSION['usuarioLogado']))
    {
        header("location: login.php?cadastroInteligenciaSemLogin&oper=alterar&id=".$id);
    }
    
    $intelig = new Inteligencia();
    
    $intelig->conectar();
    if ($intelig->msgErro != "")
    {
        die("Erro ao conectar no banco de dados");
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $id = $_POST['id'];
        $titulo = addslashes($_POST['titulo']);
        $conteudo = addslashes($_POST['conteudo']);
        $img = addslashes($_POST['imagem']);

        //verificar se está tudo preenchido
        if(!empty($id) && !empty($titulo) && !empty($conteudo) && !empty($img))
        {
            $intelig->conectar();
            if($intelig->msgErro=="")//está tudo certo, então conectou
            {
                $sucesso = $intelig->editar($id, $titulo, $conteudo, $img);
                if ($sucesso) {
                    // Sucesso no cadastro
                    //echo "Inteligência artificial editada com sucesso!";
                    header("location: index.php");
                } else {
                    // Falha no cadastro
                    echo "Erro ao editar a inteligência artificial";
                }
            }
            else
            {
                ?>
                    <div>
                        <?php echo "Erro: " .$intelig->msgErro; ?>
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
    else
    {
        if (!isset($_GET['id'])) {
            die("Parâmetro inválido ou inexistente");
        }
    
        $id = $_GET['id'];

        $inteligAEditar = $intelig->obterPorId($id);
        if (!$inteligAEditar)
        {
            die("Inteligencia não existe");
        }
    
    }

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
                            <b> Inteligencia Artificial | Editar </b>
                        </br></br>
                        </span>
                        <div class="wrap-input margin-bottom-35">
                            <input class="input-form" type="text" 
                                value="<?php echo $inteligAEditar["id"] ?> " 
                                name="id" id="" placeholder="Id da Inteligencia">
                            <span class="focus-input-form" placeholder="Id da Inteligencia"></span>
                        </div>
                        <div class="wrap-input margin-bottom-35">
                            <input class="input-form" type="text" 
                                value="<?php echo $inteligAEditar["titulo"] ?> " 
                                name="titulo" id="" placeholder="Titulo da Inteligencia">
                            <span class="focus-input-form" placeholder="Titulo da Inteligencia"></span>
                        </div>
                        <div class="wrap-input margin-bottom-35">
                            <input class="input-form" type="text" 
                                value="<?php echo $inteligAEditar["descricao"] ?> " 
                                name="conteudo" id="" placeholder="conteudo da inteligencia">
                            <span class="focus-input-form" placeholder="conteudo da inteligencia"></span>
                        </div>
                        <div class="wrap-input margin-bottom-35">
                            <input class="input-form" type="img" 
                                value="<?php echo $inteligAEditar["urlDaImagem"] ?> " 
                                name="imagem" id="" placeholder="imagem da inteligencia">
                            <span class="focus-input-form" placeholder="imagem da inteligencia"></span>
                        </div>
                        <br>
                        <div class="container-login-form-btn">
                            <input class="login-form-btn" type="submit" value="Salvar">
                            <a href="index.php" class="texto2">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            require_once '../footer.php';
        ?>
    </body>
</html>