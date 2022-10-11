<?php
    $id = '';
    $descricao = '';
    $marca = '';
    $op = 'inserir';
    
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $op = 'atualizar';
        $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria','root','123456');
        $sql = "SELECT * FROM modelo WHERE id = {$id}";
        $dataset = $conexao->query($sql);
        $rs = $dataset->fetch();
        $descricao = $rs['descricao'];
        $marca = $rs['marca'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Modelo</title>
</head>
<body>
    <form action="crud_modelo.php" method="POST">
        <fieldset>
            <legend>Cadastro de Modelo</legend>
            <input type="hidden" name="op" id="op" value="<?=$op?>"/>
            <input type="hidden" name="id" id="id" value="<?=$id?>"/>
            <div>
                <br/>
                <label for="descricao">Descrição</label>
                <br/>
                <input type="text" id="descricao" name="descricao" value="<?=$descricao?>"/>
            </div>
            <div>
                <br/>
                <label for="marca">Marca:</label>
                <select name="marca">
                    <?php
                        $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria','root','123456');
                        $sql = 'SELECT * FROM marca;';
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();
                        foreach($resultset as $row){
                        echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                        }
                    ?>
                </select><br>
            </div>
            <div>
                <br/>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
    </form> 
</body>
</html>