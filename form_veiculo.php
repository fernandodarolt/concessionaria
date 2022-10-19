<?php
    $id = '';
    $modelo = '';
    $combustivel = '';
    $chassi = '';
    $cor = '';
    $potencia = '';
    $cilindrada = '';
    $lotacao = '';
    $ano_modelo = '';
    $ano_fabricacao = '';
    $op = 'inserir';
    $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria','root','123456');


    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $op = 'atualizar';
        $sql = "SELECT * FROM veiculo WHERE id = {$id}";
        $dataset = $conexao->query($sql);
        $rs = $dataset->fetch();
        $modelo = $rs['modelo'];
        $combustivel = $rs['combustivel'];
        $chassi = $rs['chassi'];
        $cor = $rs['cor'];
        $potencia = $rs['potencia'];
        $cilindrada = $rs['cilindrada'];
        $lotacao = $rs['lotacao'];
        $ano_modelo = $rs['ano_modelo'];
        $ano_fabricacao = $rs['ano_fabricacao'];
        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículo</title>
</head>
<body>
    <form action="crud_veiculo.php" method="POST">
        <fieldset>
            <legend>Cadastro de Veículo</legend>
            <input type="hidden" name="op" id="op" value="<?=$op?>"/>
            <input type="hidden" name="id" id="id" value="<?=$id?>"/>
            <div>
                <br/>
                <label for="modelo">Modelo:</label>
                <select name="modelo">
                    <?php
                        $sql = 'SELECT * FROM modelo;';
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();
                        foreach($resultset as $row){
                        echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                        }
                    ?>
                </select><br>
            </div>
            <div>
                <br/>
                <label for="tipo_veiculo">Tipo:</label>
                <select name="tipo_veiculo">
                    <?php
                        $sql = 'SELECT * FROM tipo_veiculo;';
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();
                        foreach($resultset as $row){
                        echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                        }
                    ?>
                </select><br>
            </div>
            <div>
                <br/>
                <label for="combustivel">Combustivel:</label>
                <select name="combustivel">
                    <?php
                        $sql = 'SELECT * FROM combustivel;';
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();
                        foreach($resultset as $row){
                        echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                        }
                    ?>
                </select><br>
            </div>
            <div>
                <br/>
                <label for="chassi">Chassi</label>
                <br/>
                <input type="text" id="chassi" name="chassi" value="<?=$chassi?>"/>
            </div>
            <div>
                <br/>
                <label for="cor">Cor</label>
                <br/>
                <input type="text" id="cor" name="cor" value="<?=$cor?>"/>
            </div>
            <div>
                <br/>
                <label for="potencia">Potência</label>
                <br/>
                <input type="text" id="potencia" name="potencia" value="<?=$potencia?>"/>
            </div>
            <div>
                <br/>
                <label for="cilindrada">Cilindrada</label>
                <br/>
                <input type="text" id="cilindrada" name="cilindrada" value="<?=$cilindrada?>"/>
            </div>
            <div>
                <br/>
                <label for="lotacao">Passageiros</label>
                <br/>
                <input type="text" id="lotacao" name="lotacao" value="<?=$lotacao?>"/>
            </div>
            <div>
                <br/>
                <label for="ano_fabricacao">Ano Fabricacao</label>
                <br/>
                <input type="text" id="ano_fabricacao" name="ano_fabricacao" value="<?=$ano_fabricacao?>"/>
            </div>
            <div>
                <br/>
                <label for="ano_modelo">Ano Modelo</label>
                <br/>
                <input type="text" id="ano_modelo" name="ano_modelo" value="<?=$ano_modelo?>"/>
            </div>
            <div>
                <br/>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
    </form> 
</body>
</html>