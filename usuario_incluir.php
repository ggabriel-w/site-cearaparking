<?php

include_once '../inc/funcoes.php';
require_once '../inc/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $nome = $_POST["pNome"];
    $login = $_POST["pLogin"];
    $senha = $_POST["pSenha"];

    try 
    {
        salvar_log("INSERT INTO anjhxhvhnkgbop.tb_usuarios (nome, login,senha) VALUES ('$nome' ,  '$login' , '$senha')");
        $sql_insert = $conexao->prepare("INSERT INTO anjhxhvhnkgbop.tb_usuarios (nome, login,senha) VALUES (?,  ? , ?)");
        $sql_insert->bind_param("sss", $nome , $login , $senha); // "sss" = 3 strings
        if ($sql_insert->execute()) 
        {
            $retorno = "Usuário inserido com sucesso!";
        } 
        else 
        {
            $retorno = "Erro: " . $stmt->error;
        }

        $sql_insert->close();
        $conexao->close();

    } 
    catch (PDOException $e) 
    {
        $retorno = "Erro ao cadastrar: " . $e->getMessage();
    }
}

echo $retorno;
