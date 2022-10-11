<?php
    var_dump($_POST);
    $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $op = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];
    $marca = isset($_POST['marca']) ? $_POST['marca'] : '';
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

    $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria;','root','123456');
    if ($op == 'inserir') {
        if ($descricao == '' || is_bool($descricao) || is_null($descricao) || is_float($descricao)){
            echo 'Erro: O campo Descrição é inválido, verifique o valor digitado e tente novamente.';
            exit;
        }
        $sql = "INSERT INTO modelo (descricao,marca) VALUES ('{$descricao}',{$marca});";
        $mensagem = 'Salvo com sucesso.';
    } else if ($op == 'atualizar') {
        if ($marca == ''){
            echo 'Erro: O campo Descrição é obrigatório';
            exit;
        }
        $sql = "UPDATE modelo SET descricao = '{$descricao}', marca = {$marca} WHERE id = {$id};";
        $mensagem = 'Atualizado com sucesso.';
    } else if ($op == 'excluir') {
        $sql = "DELETE FROM modelo WHERE id = {$id};";
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

