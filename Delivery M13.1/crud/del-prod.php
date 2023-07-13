<?php

require('../conect/conn.php');

if (isset($_GET['idpratos'])) {
    $idpratos = $_GET['idpratos'];
    
    $del_prod = $pdo->prepare('DELETE FROM pratos WHERE idpratos = ?;');
    $del_prod->execute([$idpratos]);

    if ($del_prod->rowCount() > 0) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Nenhum registro foi excluído.";
    }
} else {
    echo "O parâmetro 'idpratos' não foi fornecido.";
}


?>
