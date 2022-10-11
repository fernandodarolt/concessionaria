<?php
    $id = '';
    $nome = '';
    $op = 'inserir';
    
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $op = 'atualizar';
        $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria','root','123456');
        $sql = "SELECT * FROM marca WHERE id = {$id}";
        $dataset = $conexao->query($sql);
        $rs = $dataset->fetch();
        $nome = $rs['nome'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Marca</title>
</head>
<body>
    <form action="crud_marca.php" method="POST">
        <fieldset>
            <legend>Cadastro de Marca</legend>
            <input type="hidden" name="op" id="op" value="<?=$op?>"/>
            <input type="hidden" name="id" id="id" value="<?=$id?>"/>
            <div>
                <br/>
                <label for="marca">Descrição</label>
                <br/>
                <input type="text" id="marca" name="marca" value="<?=$nome?>"/>
            </div>
            <div>
                <br/>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
    </form> 
</body>
</html>