<?php
    //Verifica se vem algum dado via POST ou GET
    $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $op = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];
    $marca = isset($_POST['marca']) ? $_POST['marca'] : '';

    //Conecta ao banco de dados
    $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria;','root','123456');

    //Executa o comando
    //SQL conforme instrução da varialvel "OP" e retorna mensagem tratada
    if ($op == 'inserir') {
        if ($marca == '' || is_bool($marca) || is_int($marca) || is_numeric($marca) || is_null($marca) || is_float($marca)){
            echo 'Erro: O campo Descrição é inválido, verifique o valor digitado e tente novamente.';
            exit;
        }
        $sql = "INSERT INTO marca (nome) VALUES ('{$marca}');";
        $mensagem = 'Salvo com sucesso.';
    } else if ($op == 'atualizar') {
        if ($marca == ''){
            echo 'Erro: O campo Descrição é obrigatório';
            exit;
        }
        $sql = "UPDATE marca SET nome = '{$marca}' WHERE id = {$id};";
        $mensagem = 'Atualizado com sucesso.';
    } else if ($op == 'excluir') {
        $sql = "DELETE FROM marca WHERE id = {$id};";
        $mensagem = 'Excluído com sucesso.';
    } else {
        echo 'Erro ao cadastrar => <br/>';
        echo $conexao->errorInfo();
    }
    if ($conexao->exec($sql)){
        echo $mensagem;
    } else {
        echo 'Erro ao cadastrar => <br/>';
        echo $conexao->errorInfo();
    }