<?php
require_once 'model/imovel.php';

class ImovelController{
    
    public static function salvar(){
        $imovel = new Imovel();
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setFoto($_POST['fato']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);
    
        $imovel->save();
    }
    public static function listar (){
        $imovel = new Imovel();
        return $imovel->listAll();
    }
    public static function editar($id){
        $usuario = new Usuario();
        $usuario = $usuario->find($id);
        return $usuario;
    }

    public static function excluir($id){
        $usuario = new Usuario();
        $usuario = $usuario->remove($id);
    }
}
?>
