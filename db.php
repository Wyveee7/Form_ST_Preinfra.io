<?php

// Recebendo os dados do formulário
$email = $_POST['email'];
$observador = $_POST['observador'];
$avaliacao = $_POST['avaliacao'];
$setor = $_POST['setor'];

$A1 = $_POST['A1'];
$A2 = $_POST['A2'];
$A3 = $_POST['A3'];
$A4 = $_POST['A4'];
$A5 = $_POST['A5'];

$B1 = $_POST['B1'];
$B2 = $_POST['B2'];
$B3 = $_POST['B3'];
$B4 = $_POST['B4'];
$B5 = $_POST['B5'];
$B6 = $_POST['B6'];

$C1 = $_POST['C1'];
$C2 = $_POST['C2'];
$C3 = $_POST['C3'];
$C4 = $_POST['C4'];
$data_atual = date('d/m/Y');
$hora_atual = date('H,i,s');

// Conexão com o banco de dados
$host = 'database-1.cxkk6gmy4fma.us-east-2.rds.amazonaws.com';
$user = 'admin';
$password = 'preinfraadmin';
$database = 'stpreinfradb';

$conn = new mysqli($host, $user, $password, $database);

//Verificar conexão

if($conn->connect_error){
    die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);
}

$smtp = $conn->prepare("INSERT INTO respostas (email, observador, avaliacao, setor, A1, A2, A3, A4, A5, B1, B2, B3, B4, B5, B6, C1, C2, C3, C4, data_atual, hora_atual) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$smtp->bind_param("sssssssssssssssssssss", $email, $observador, $avaliacao, $setor,$A1, $A2, $A3, $A4, $A5, $B1, $B2, $B3, $B4, $B5, $B6, $C1, $C2, $C3, $C4, $data_atual, $hora_atual);

if($smtp->execute()){
    echo "Avaaliação enviada com sucesso!";
}else{
    echo "Erro no envio: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>