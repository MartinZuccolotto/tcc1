<?php
    include ('../conect/conn.php');

    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];


   /* if(empty($id_produto) ||empty($valor)){
        echo "Voce precisa preencher todos os campos";

   /* }   else    {
        try{*/
        $carrinho = $pdo->prepare('INSERT INTO carrinho (nome, valor, quantidade) values (?, ?, ?)');
        $carrinho->bindParam(1, $nome);
        $carrinho->bindParam(2, $valor);
        $carrinho->bindParam(3, $quantidade);
        $carrinho->execute();
       /* } catch (Exception $e){
            echo $e->getMessage();
        }
    }*/

?>