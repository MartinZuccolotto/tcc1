<?php
include('../conect/conn.php'); 

$idImagem = $_GET['idsucos'];

$stmt = $pdo->prepare('SELECT caminho FROM sucos WHERE idsucos = ?');
$stmt->bindParam(1, $idImagem);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $caminhoImagem = $row['caminho'];
    $tipo = mime_content_type($caminhoImagem);
    header('Content-Type: ' . $tipo);
    readfile($caminhoImagem);
    exit;
} else {
    echo 'Imagem não encontrada';
}
?>