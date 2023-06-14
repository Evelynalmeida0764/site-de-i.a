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
    
    $id = $_GET["id"];

    $intelig->conectar();
    $sucesso = $intelig->excluir($id);

    header("location: index.php");
?>
