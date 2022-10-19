<?php
    #Verifica e armazena as variaveis via POST OU GET
    $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $op = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
    $tipo_veiculo = isset($_POST['tipo_veiculo']) ? $_POST['tipo_veiculo'] : '';
    $combustivel = isset($_POST['combustivel']) ? $_POST['combustivel'] : '';
    $chassi = isset($_POST['chassi']) ? $_POST['chassi'] : '';
    $cor = isset($_POST['cor']) ? $_POST['cor'] : '';
    $potencia = isset($_POST['potencia']) ? $_POST['potencia'] : '';
    $cilindrada = isset($_POST['cilindrada']) ? $_POST['cilindrada'] : '';
    $lotacao = isset($_POST['lotacao']) ? $_POST['lotacao'] : '';
    $ano_fabricacao = isset($_POST['ano_fabricacao']) ? $_POST['ano_fabricacao'] : '';
    $ano_modelo = isset($_POST['ano_modelo']) ? $_POST['ano_modelo'] : ''   ;

    #Armazena na variavel conexao a conexão com BD
    $conexao = new PDO('mysql:host=localhost;port=3306;dbname=concessionaria;','root','123456');

    #Executa o comando conforme oque estiver na variavel 'op'
    if ($op == 'inserir') {
        #Faz a validação dos dados
        if ($chassi == '' || is_bool($chassi) || is_null($chassi) || is_float($chassi)){
            echo 'Erro: O campo chassi é inválido, verifique o valor digitado e tente novamente.';
            exit;
        } else if ($modelo == '' || is_bool($modelo) || is_null($modelo) || is_float($modelo)) {
            echo 'Erro: O campo modelo é inválido.';
            exit;
        } else if ($tipo_veiculo == '' || is_bool($tipo_veiculo) || is_null($tipo_veiculo) || is_float($tipo_veiculo)) {
            echo 'Erro: O campo tipo é inválido.';
            exit;
        } else if ($combustivel == '' || is_bool($combustivel) || is_null($combustivel) || is_float($combustivel)) {
            echo 'Erro: O campo combustivel é inválido.';
            exit;
        } else if ($ano_fabricacao == '' || is_bool($ano_fabricacao) || is_null($ano_fabricacao) || is_float($ano_fabricacao)) {
            echo 'Erro: O Ano Fabricação é inválido.';
            exit;
        } else if ($ano_modelo == '' || is_bool($ano_modelo) || is_null($ano_modelo) || is_float($ano_modelo)) {
            echo 'Erro: O campo Ano Modelo é inválido.';
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
        echo 'Comando inválido, consulte o administrador do sistema. => <br/>';
        echo $conexao->errorInfo();
    }
    #Executa o SQL e retorna a mensagem ou erro
    if ($conexao->exec($sql)){
        echo $mensagem;
    } else {
        echo 'Erro ao cadastrar => <br/>';
        echo $conexao->errorInfo();
    }
