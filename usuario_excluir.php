<?php

include_once '../inc/funcoes.php';
require_once '../inc/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $usuario_id = $_POST["pUsuario_id"];    

    try 
    {
        salvar_log("DELETE FROM anjhxhvhnkgbop.tb_usuarios WHERE usuario_id = $usuario_id",'excluir.sql');
        $sql_delete = $conexao->prepare("DELETE FROM anjhxhvhnkgbop.tb_usuarios WHERE usuario_id = ?");
        $sql_delete->bind_param("i", $usuario_id); 
        if ($sql_delete->execute()) 
        {
            $retorno = "Usuário excluído com sucesso!";
        } 
        else 
        {
            $retorno = "Usuário excluidO! Atualize a página" ;
        }

        $sql_update->close();
        $conexao->close();

    } 
    catch (PDOException $e) 
    {
        $retorno = "Erro ao cadastrar: " . $e->getMessage();
    }
}

echo $retorno;
header("Location: " . $_SERVER['PHP_SELF']);
