<!DOCTYPE html>
<html lang="pt-br">
    <?php
        require_once 'head.php';
    ?>
    <head>

    </head>
    <!--começo barra de navegação-->
    <body>
        <?php
            require_once 'header.php';
        ?>
        <iframe src="carrosel1/carrosel-img.html" frameborder="0"></iframe>

        <main class="conteudo-principal">
            <span class="historia">
                    <div>
                        <a href="historia.php">historia da Inteligencia Artificial</a>
                        <br>
                        <br>
                        <p>Um pesseio pela historia de uma tecnologia tão presente nas nossas vidas no dia de hoje</p>
                    </div>
            </span>
            <span class="hoje">
                    <div>
                        <a href="hoje.php">Inteligencia Artificial nos dias de hoje</a>
                        <br>
                        <br>
                        <p>Um vislumbre dessa tecnologia atualmente</p>
                    </div>
            </span>
            <span class="dev">
                <div>
                    <a href="dev.php">Inteligencia Artificial para os desenvolvedores</a>
                    <br>
                    <br>
                    <p>Uma demostração do que essa tecnologia pode fazer para aqueles que estão ativamente envolvidos</p>
                </div> 
            </span>
        </main>

        <iframe src="carrossel2/carrossel.php" frameborder="0"></iframe>
        <?php
            require_once 'footer.php';
        ?>

</body>
</html>