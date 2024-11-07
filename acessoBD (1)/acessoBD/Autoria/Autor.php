<?php
include_once 'conectar.php';

class Autor {
    private $codigo;
    private $nomeautor;
    private $sobrenome;
    private $email;
    private $nasc;
    private $conn;
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getNome() {
        return $this->nomeautor;
    }

    public function setNome($nomeautor) {
        $this->nomeautor = $nomeautor;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNasc() {
        return $this->nasc;
    }

    public function setNasc($nasc) {
        $this->nasc = $nasc;
    }

    function salvar(){
        try{
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("insert into  autor values (null,?,?,?,?)");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR);
            if($sql->execute()==1){
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc){
            echo "Erro ao salvar o registro. " . $exc->getMessage();
        }
    }

    function listar(){
        try{
            $this-> conn = new Conectar();
            $sql = $this ->conn->query("select * from autor order by NomeAutor");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }

        catch(PDOException $exc){
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }

    function exclusao()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("delete from Autor where Cod_autor = ?");
            @$sql-> bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            if($sql->execute() == 1) 
            {
                return "Excluido com sucesso!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc)
        {
            echo "Erro ao excluir. " . $exc->getMessage();
        }
    }

    function consultar(){
        try{
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from Autor where NomeAutor like ?");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch(PDOException $exc){
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
    
    function alterar() {
        try {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from Autor where Cod_autor = ?");
            @$sql-> bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch(PDOException $exc) {
            echo "Erro ao alterar. ".$exc->getMessage();
        }
    }

    function alterar2() {
        try {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("update Autor set NomeAutor = ?, Sobrenome = ?, Email = ?, Nasc = ? where Cod_autor = ?");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getCodigo(), PDO::PARAM_STR);
            if($sql->execute()==3) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc) {
            echo "Erro ao alterar o registro. ".$exc->getMessage();
        }
    }
}
?>
