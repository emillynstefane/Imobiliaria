<?php


require_once 'Banco.php';
require_once 'Conexao.php';

class Imovel extends Banco{
    private $id;
    private $descricao ;
    private $foto;
    private $valor;
    private $tipo;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        return $this->descricao = $descricao;
    }

    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto){
        return $this->foto = $foto;
    }
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        return $this->valor = $valor;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($tipo){
        return $this->tipo = $tipo;
    }


public function save(){
$result = false;
$conexao = new Conexao();
if ($conn = $conexao->getConection()){
    if ($this->id > 0){
        $query = "UPDATE imovel set descricao = :descricao, foto = :foto, valor = :valor, tipo = :tipo where id = :id";
        $stmt = $conn->prepare($query);
        if ($stmt->execute(array(':descricao' => $this->descricao, ':foto'=> $this->foto, ':valor'=> $this->valor, ':tipo' => $this->tipo, ':id' => $this-> id))){
            $result = $stmt->rowCount();
        }
    }else{$query = "INSERT into imovel (id, descricao, foto, valor, tipo) values (null, :descricao,:foto,:valor, :tipo)";
        $stmt = $conn->prepare($query);
        if ($stmt->execute(array(':descricao' => $this->descricao, ':foto'=> $this->foto, ':valor'=> $this->valor, ':tipo' => $this->tipo))){
            $result = $stmt->rowCount();
        }
    } 
    
   
}
return $result;

}


public function remove($id){
    
}

public function find($id){
    $conexao = new Conexao();
$conn = $conexao->getConection();
$query = "SELECT * from imovel where id = :id";
$stmt = $conn->prepare($query);
if ($stmt->execute(array(':id' => $id))){
    if ($stmt->rowCount() > 0){
}else{
    $result = false;
}
}
return $result;
}

public function count(){
    
}

public function listAll(){
    $conexao = new Conexao();
    $conn = $conexao->getConection();
    $query = "SELECT * FROM imovel";
    $stmt = $conn->prepare($query);
    $result = array();
    if($stmt->execute()){
        while($rs = $stmt->fetchObject(Imovel::class)){
            $result[] = $rs;
        }
    } else{
        $result = false;
    }
    return $result;
}

}

?>
