<?php
    class Inteligencia{
        private $conn;
        public $msgErro="";

        public function conectar()
        {
            $nomeDoBd = "I_A";
            $usuario = "root";
            $senha = "";

            global $conn;
            try {
                $conn = new PDO("mysql:dbname=".$nomeDoBd,$usuario,$senha);
            }
            catch (PDOException $e){
                $this->msgErro = $e->getMessage();
            }
        }

        public function cadastrar($titulo, $conteudo, $img)
        {
            global $conn;
            //Verificar se o titulo já está cadastrado
            $sql = $conn->prepare("SELECT id FROM inteligencia_artificial WHERE titulo = :t");
            $sql->bindValue(":t", $titulo);
            $sql->execute();

            if($sql->rowCount() > 0)
            {
                return false;
            }
            else
            {
                $sql = $conn->prepare("INSERT INTO inteligencia_artificial (titulo, descricao, urlDaImagem)
                VALUES (:t, :c, :i)");
                $sql->bindValue(":t", $titulo);
                $sql->bindValue(":c", $conteudo);
                $sql->bindValue(":i", $img);
                $sql->execute();
                return true;
            }
        }

        public function editar($id, $titulo, $conteudo, $img)
        {
            global $conn;

            //Verificar se o titulo já está cadastrado
            $sql = $conn->prepare("SELECT id FROM inteligencia_artificial WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            if($sql->rowCount() == 0)
            {
                die("Erro ao salvar dados da inteligencia artificial pois a mesma nao existe no BD");
            }

            $sql = $conn->prepare(
                "UPDATE inteligencia_artificial
                 SET titulo=:t, descricao = :d, urlDaImagem = :i
                 WHERE id = :id");
                $sql->bindValue(":t", $titulo);
                $sql->bindValue(":d", $conteudo);
                $sql->bindValue(":i", $img);
                $sql->bindValue(":id", $id);
                $sql->execute();
            return true;
        }

        public function excluir($id)
        {
            global $conn;

            $sql = $conn->prepare(
                "DELETE FROM inteligencia_artificial
                 WHERE id = :id");
                $sql->bindValue(":id", $id);
                $sql->execute();
        }

        public function obter()
        {
            global $conn;

            // Executa a consulta SQL
            $sql = "SELECT id, titulo, descricao, urlDaImagem FROM inteligencia_artificial ORDER BY id";
            $result = $conn->query($sql);

            // Verifica se há resultados na consulta
            if ($result->rowCount() > 0) {
                // Retorna os resultados como um array associativo
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // Retorna um array vazio se não houver dados encontrados
                return [];
            }

        }

        public function obterPorId($id)
        {
            global $conn;

            // Executa a consulta SQL
            $sql = "SELECT id, titulo, descricao, urlDaImagem FROM inteligencia_artificial WHERE id=".$id;
            $result = $conn->query($sql);

            // Verifica se há resultados na consulta
            if ($result->rowCount() > 0) {
                // Retorna os resultados como um array associativo
                return $result->fetch(PDO::FETCH_ASSOC);
            } else {
                // Retorna um array vazio se não houver dados encontrados
                return [];
            }

        }

    }
?>