<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>

        <title>Cadastro de placa</title>

        <link rel="stylesheet" href="../node_modules/w3-css/3/w3.css"/>

    </head>
    <body>

        <section class="w3-container w3-padding">
                <form action="../controller/finalizar-cliente.php" method="POST" class="w3-card">
                    <h3 class="w3-blue w3-padding w3-center">Cadastro do cliente</h3>
                    <div class="w3-panel">
                        <label for="nomeCliente">
                            Selecione o nome do cliente:
                        </label>
<?php
    require '../model/banco.php';
    $resposta = listar_cliente_nome($conexao);
    echo '<select class="w3-select" id="nomeCliente">';
    while($linha = $resposta->fetch(PDO::FETCH_OBJ)){
        echo '<option>'.$linha->nome.'</option>';
    }
    echo '</select>';
?>
                    </div>
                </form>
            </section>
    </body>
</html>