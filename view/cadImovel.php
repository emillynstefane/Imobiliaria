<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Imóvel</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo isset($imovel)?$imovel->getId():''; ?>">
        <label for="descrição">Descrição:</label>
        <input type="text" name="descrição" id="descrição" value="<?php echo isset($imovel)?$imovel->getDescrição():''; ?>" ><br/>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" value="<?php echo isset($imovel)?$imovel->getFoto():''; ?>"><br/>
        <label>Valor</label>
        <input type="number" name="valor" id="valor" value="<?php echo isset($imovel)?$imovel->getValor():''; ?>"><br/>
        <label>Tipo Imóvel:</label>
        <select name="tipo" id="tipo">
            <option value="0">**SELECIONE**</option>
            <option value="A" <?php echo isset($imovel) && $imovel->getTipo() == 'A'?'selected':''; ?>>Apartamento</option>
            <option value="C" <?php echo isset($imovel) && $imovel->getTipo() == 'C'?'selected':''; ?>>Casa</option>
        </select>
        <br/>
        <input type="submit" value="Salvar" name="btnSalvar" id="btnSalvar">
    </form>
    <?php
    if(isset($_POST['btnSalvar'])){

        require_once 'controller/imovelController.php';
        call_user_func(array('imovelController','salvar'));

        header('Location: index.php?action=listar');

    }

    ?>
    
</body>
</html>

