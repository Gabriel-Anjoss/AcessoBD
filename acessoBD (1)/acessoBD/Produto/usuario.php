<?php
  include_once 'Conectar.php';

  class Usuario { //Criando a classe Usuario

     private $usuario;
     private $senha;
     private $conn; //Conexão

    //Getters e Setters 
     public function getUsuario(){
        return $this->usuario;
     }

     public function setUsuario($uusuario){
        $this->usuario = $uusuario;
     }

     public function getSenha(){
        return  $this->senha;
     }

     public function setSenha($ssenha){
        $this->senha = $ssenha;
     }

     //Função Logar

     function logar() {
        try{
            $this-> conn = new Conectar(); //Instanciando para a chamada do Conectar.php
            $sql = $this->conn->prepare("SELECT * FROM usuario WHERE Login LIKE ? and Senha = ?");
            @$sql-> bindParam(1, $this->getUsuario(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getSenha(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch(PDOException $exc){
            echo "<span class='text-green-200'> Erro ao executar consulta. </span" . $exc->getMessage();
        }
     }

  } //Encerramento da classe Usuario
?>