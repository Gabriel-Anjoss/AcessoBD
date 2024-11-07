<?php
include_once 'conectar.php';

class Autoria{
    private $codigo;
    private $codigoLivro;
    private $dataLancamento;
    private $editora;
    private $conn;
    
    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }



    public function getCodigoLivro(){
        return $this->codigoLivro;
    }

    public function setCodigoLivro($codigoLivro){
        $this->codigoLivro = $codigoLivro;
    }



    public function getDataLancamento(){
        return $this->dataLancamento;
    }

    public function setDataLancamento($dataLancamento){
        $this->dataLancamento = $dataLancamento;
    }



    public function getEditora(){
        return $this->editora;
    }

    public function setEditora($editora){
        $this->editora = $editora;
    }

    function salvar(){
        try{
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("insert into autoria values (?,?,?,?)");
            @$sql-> bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCodigoLivro(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getEditora(), PDO::PARAM_STR);
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
            $sql = $this ->conn->query("select * from autoria order by Editora");
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
            $sql = $this->conn->prepare("DELETE FROM Autoria WHERE Cod_autor = ? AND Cod_livro = ?");
            @$sql-> bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCodigoLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from Autoria where Editora like ?");
            @$sql-> bindParam(1, $this->getEditora(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from Autoria where Cod_autor = ? AND Cod_livro = ?");
            @$sql-> bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCodigoLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("update Autoria set Cod_autor = ?, Cod_livro = ?, DataLancamento = ?, Editora = ? where Cod_autor = ? and Cod_livro = ?");
            @$sql-> bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCodigoLivro(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getEditora(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getCodigo(), PDO::PARAM_STR);
            @$sql-> bindParam(6, $this->getCodigoLivro(), PDO::PARAM_STR);
            if($sql->execute() == 1) {
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