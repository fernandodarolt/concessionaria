<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Marcas</title>
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
    <h3 class="titulo">Lista de Marcas</h3>
    <hr/>
    <div class="div-button">
        <a href="form_marca.php"><button>Novo</button></a>
    </div>
    <table cellspacing="0">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">Descrição</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria','root','123456');
                $sql = "SELECT * FROM marca";
                $dataset = $conexao->query($sql);
                $rs = $dataset->fetchAll();
                foreach($rs as $row){
                    echo '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['nome'].'</td>
                            <td class="text-center">
                                <a href="form_marca.php?id='.$row['id'].'">Editar</a>
                            </td>
                            <td class="text-center">
                                <a href="crud_marca.php?op=excluir&id='.$row['id'].'">Excluir</a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
</html>