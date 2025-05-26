<?php 
$servername = "anjhxhvhnkgbop.mysql.dbaas.com.br"; 
$username = "anjhxhvhnkgbop"; 
$password = "Gabriel12@"; 
$dbname = "anjhxhvhnkgbop"; 

// Cria a conexão 
$conexao = new mysqli($servername, $username, $password, $dbname); 
$conexao->set_charset("utf8mb4");

// Verifica a conexão 
if ($conexao->connect_error)  
{
  die("Conexao falhou: " . $conexao->connect_error);  
} 
