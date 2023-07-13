<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Pedidos</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "salafit";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 

// Consulta na tabela pedidos
$sql = "SELECT idpedidos, cliente, valor, status, endereco FROM pedidos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Dados encontrados
    echo "<h1>Tabela de Pedidos</h1>";

    // Array para armazenar os pedidos
    $pedidos = array();

    while ($row = $result->fetch_assoc()) {
        $pedidos[] = $row;
    }

    // Função para criar uma tabela com os pedidos de acordo com o status
    function criarTabelaPorStatus($status, $pedidos) {
        $tabelaPedidos = array_filter($pedidos, function ($pedido) use ($status) {
            return $pedido['status'] === $status;
        });

        echo "<h2>$status</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Cliente</th><th>Valor</th><th>Status</th><th>Endereço</th><th>Ação</th></tr>";

        foreach ($tabelaPedidos as $pedido) {
            $idPedido = $pedido["idpedidos"];
            $cliente = $pedido["cliente"];
            $valor = $pedido["valor"];
            $endereco = $pedido["endereco"];

            echo "<tr>";
            echo "<td>$idPedido</td>";
            echo "<td>$cliente</td>";
            echo "<td>$valor</td>";
            echo "<td>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='id_pedido' value='$idPedido'>";
            echo "<select name='novo_status'>";
            echo "<option value='Aguardando'" . ($pedido['status'] === 'Aguardando' ? ' selected' : '') . ">Aguardando</option>";
            echo "<option value='Preparo'" . ($pedido['status'] === 'Preparo' ? ' selected' : '') . ">Preparo</option>";
            echo "<option value='Saiu para entrega'" . ($pedido['status'] === 'Saiu para entrega' ? ' selected' : '') . ">Saiu para entrega</option>";
            echo "<option value='Entregue'" . ($pedido['status'] === 'Entregue' ? ' selected' : '') . ">Entregue</option>";
            echo "</select>";
            echo "<input type='submit' value='Atualizar'>";
            echo "</form>";
            echo "</td>";
            echo "<td>$endereco</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    // Cria as tabelas para cada status
    $statusList = array('Aguardando', 'Preparo', 'Saiu para entrega', 'Entregue');

    foreach ($statusList as $status) {
        criarTabelaPorStatus($status, $pedidos);
    }
} else {
    echo "<p>Nenhum pedido encontrado.</p>";
}

// Verifica se foi enviado um novo status
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idPedido = $_POST["id_pedido"];
    $novoStatus = $_POST["novo_status"];

    // Atualiza o status do pedido no banco de dados
    $sql = "UPDATE pedidos SET status = '$novoStatus' WHERE idpedidos = '$idPedido'";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
</body>
</html>