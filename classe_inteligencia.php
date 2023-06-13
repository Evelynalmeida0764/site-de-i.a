<?php
    class Inteligencia{
        private $pdo;
        public $msgErro="";

        public function conectar($nome, $host, $usuario, $senha)
        {
            global $pdo;
            try{
                $pdo = new PDO("mysql:dbname=".$nome,$usuario,$senha);
            }
            catch (PDOException $e){
                $this->msgErro = $e->getMessage();
            }
        }

        public function cadastrar($titulo, $conteudo, $img)
        {
            global $pdo;
            //Verificar se o titulo já está cadastrado
            $sql = $pdo->prepare("SELECT id FROM inteligencia_artificial WHERE titulo = :t");
            $sql->bindValue(":t", $titulo);
            $sql->execute();

            if($sql->rowCount()>0)
            {
                return false;
            }
            else
            {
                $sql = $pdo->prepare("INSERT INTO inteligencia_artificial (titulo, conteudo, img)
                VALUES (:t, :c, :i)");
                $sql->bindValue(":t", $titulo);
                $sql->bindValue(":c", $conteudo);
                $sql->bindValue(":i", $img);
                $sql->execute();
                return true;
            }
        }
        
        public function logar($email, $senha){

            global $pdo;
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
                
            if($sql->rowCount() > 0)
            {
                $dados = $sql->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return True;
            }
            else
            {
                return False;
            }
        }
    }
?>