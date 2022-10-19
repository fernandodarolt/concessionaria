<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veiculos</title>
    <style>
        .text-left{
            text-align:left;
        }
        .text-center{
            text-align:center;
        }
        table {
            width:100%;
        }
        .titulo{
            margin-bottom:0;
        }
        thead tr th{
            border-bottom:2px solid #000;
            margin:0;
        }
        .div-button button{
            float:right;
            margin:15px;
            width:75px;
            border:0;
            background-color:#CCC;
            padding:5px;
            border-radius:5px;
        }
    </style>
</head>
<body>
    <h3 class="titulo">Lista de Veiculos</h3>
    <hr/>
    <div class="div-button">
        <a href="form_veiculo.php"><button>Novo</button></a>
    </div>
    <table cellspacing="0">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">Modelo</th>
                <th class="text-left">Tipo</th>
                <th class="text-left">Combustível</th>
                <th class="text-left">Chassi</th>
                <th class="text-left">Cor</th>
                <th class="text-left">Potência</th>
                <th class="text-left">Cilindrada</th>
                <th class="text-left">Nº Passageiros</th>
                <th class="text-left">Ano</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria','root','123456');
                $sql = " SELECT *,
                (SELECT mc.nome FROM marca mc WHERE m.marca = mc.id) 'mc',
                (SELECT t.descricao FROM tipo_veiculo t WHERE t.id = v.tipo_veiculo) tipo,
                m.descricao AS 'mod',
                c.descricao AS 'comb'
                FROM veiculo v
                INNER JOIN modelo m ON m.id = v.modelo
                INNER JOIN combustivel c ON c.id = v.combustivel";
                $dataset = $conexao->query($sql);
                $rs = $dataset->fetchAll();
                foreach($rs as $row){
                    echo '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['mod'].'</td>
                            <td>'.$row['tipo'].'</td>
                            <td>'.$row['comb'].'</td>
                            <td>'.$row['chassi'].'</td>
                            <td>'.$row['cor'].'</td>
                            <td>'.$row['potencia'].'</td>
                            <td>'.$row['cilindrada'].'</td>
                            <td>'.$row['lotacao'].'</td>
                            <td>'.$row['ano_fabricacao'].'/'.$row['ano_modelo'].'</td>
                            <td class="text-center">
                                <a href="form_veiculo.php?id='.$row['id'].'">Editar</a>
                            </td>
                            <td class="text-center">
                                <a href="crud_veiculo.php?op=excluir&id='.$row['id'].'">Excluir</a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
</html>