<?php
    session_start();
    session_destroy();
    require_once 'head.php';
    require_once 'header.php';
?>
<body>
    <p>Você saiu do sistema com sucesso!</p>
</body>
<?php
    require_once 'footer.php';
?>
