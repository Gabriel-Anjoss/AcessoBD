<?php
include_once 'conectar.php';

class Livro{
    private $codigoLivro;
    private $titulo;
    private $categoria;
    private $isbn;
    private $idioma;
    private $paginas;
    private $conn;
    
    public function getCodigo(){
        return $this->codigoLivro;
    }

    public function setCodigo($codigoLivro){
        $this->codigoLivro = $codigoLivro;
    }



    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }



    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }



    public function getISBN(){
        return $this->isbn;
    }

    public function setISBN($isbn){
        $this->isbn = $isbn;
    }



    public function getIdioma(){
        return $this->idioma;
    }

    public function setIdioma($idioma){
        $this->idioma = $idioma;
    }



    public function getPaginas(){
        return $this->paginas;
    }

    public function setPaginas($paginas){
        $this->paginas = $paginas;
    }


    function salvar(){
        try{
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("insert into livro values (null,?,?,?,?,?)");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getISBN(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getPaginas(), PDO::PARAM_STR);

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
            $sql = $this ->conn->query("select * from livro order by Titulo");
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
            $sql = $this->conn->prepare("DELETE FROM Livro WHERE Cod_livro = ? ");
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
            $sql = $this->conn->prepare("select * from Livro where Titulo like ?");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from Livro where Cod_livro = ?");
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
            $sql = $this->conn->prepare("update Livro set Titulo = ?, Categoria = ?, ISBN = ?, Idioma = ?, QtdPag = ? where Cod_livro = ?");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getISBN(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getPaginas(), PDO::PARAM_STR);
            @$sql-> bindParam(6, $this->getCodigo(), PDO::PARAM_STR);
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