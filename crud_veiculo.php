<?php
    #Verifica e armazena as variaveis via POST OU GET
    $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $op = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : $_GET['modelo'];
    $tipo_veiculo = isset($_POST['tipo_veiculo']) ? $_POST['tipo_veiculo'] : $_GET['tipo_veiculo'];
    $combustivel = isset($_POST['combustivel']) ? $_POST['combustivel'] : $_GET['combustivel'];
    $chassi = isset($_POST) ? $_POST['chassi'] : $_GET['chassi'];
    $cor = isset($_POST['cor']) ? $_POST['cor'] : $_GET['cor'];
    $potencia = isset($_POST['potencia']) ? $_POST['potencia'] : $_GET['potencia'];
    $cilindrada = isset($_POST['cilindrada']) ? $_POST['cilindrada'] : $_GET['cilindrada'];
    $lotacao = isset($_POST['lotacao']) ? $_POST['lotacao'] : $_GET['lotacao'];
    $ano_fabricacao = isset($_POST['ano_fabricacao']) ? $_POST['ano_fabricacao'] : $_GET['ano_fabricacao'];
    $ano_modelo = isset($_POST['ano_modelo']) ? $_POST['ano_modelo'] : $_GET['ano_modelo'];

    #Inicia conexão com BD
    $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria;','root','123456');

    #Executa o comando conforme oque estiver na variavel 'op'
    if ($op == 'inserir') {
        if ($chassi == '' || is_bool($chassi) || is_null($chassi) || is_float($chassi)){
            echo 'Erro: O campo chassi é inválido, verifique o valor digitado e tente novamente.';
            exit;
        }
        $sql = "INSERT INTO veiculo VALUES (DEFAULT,{$modelo},{$tipo_veiculo},{$combustivel},'{$chassi}','{$cor}','{$potencia}','{$cilindrada}','{$lotacao}',{$ano_modelo},{$ano_fabricacao});";
        $mensagem = 'Salvo com sucesso.';
    } else if ($op == 'atualizar') {
        if ($chassi == ''){
            echo 'Erro: O campo chassi é obrigatório';
            exit;
        }
        $sql = "UPDATE veiculo SET modelo = {$modelo}, tipo_veiculo = {$tipo_veiculo}, combustivel = {$combustivel}, chassi = '{$chassi}', cor = '{$cor}', potencia = '{$potencia}', cilindrada = '{$cilindrada}', lotacao = '{$lotacao}', ano_modelo = {$ano_modelo}, ano_fabricacao = {$ano_fabricacao} WHERE id = {$id};";
        $mensagem = 'Atualizado com sucesso.';
    } else if ($op == 'excluir') {
        $sql = "DELETE FROM veiculo WHERE id = {$id};";
        $mensagem = 'Excluído com sucesso.';
    } else {
        echo 'Erro ao cadastrar => <br/>';
        echo $conexao->errorInfo();
    }
    #Executa o SQL e retorna a mensagem ou erro
    if ($conexao->exec($sql)){
        echo $mensagem;
    } else {
        echo 'Erro ao cadastrar => <br/>';
        echo $conexao->errorInfo();
    }
