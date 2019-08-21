<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>

        <link rel="stylesheet" href="../node_modules/w3-css/3/w3.css" />

        <title>Finalizar cadastro do cliente</title>
    </head>
    <body>

        <section class="w3-container w3-padding">
<?php
    if(isset($_POST['nome']) and isset($_POST['email']) and isset($_POST['telefone']) and isset($_POST['senha'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = md5($_POST['senha']);        
        
        echo '<h3 class="w3-orange w3-center">'.'Finalizando cadastro!'.'</h3>';
        echo '<div class="w3-panel">';
        echo '<p>'.'<b>'.'Nome: '.'</b>'.$nome.'</p>';
        echo '<p>'.'<b>'.'Email: '.'</b>'.$email.'</p>';
        echo '<p>'.'<b>'.'Telefone: '.'</b>'.$telefone.'</p>';
        echo '<p>'.'<b>'.'Senha: '.'</b>';
        for($i = 0; $i < strlen($senha); $i++ ){
            echo '*';
        }
        echo '</p>';
        echo '</div>';

        require '../model/banco.php';


        $resposta = inserir_cliente($conexao, $nome, $email, $telefone, $senha);
        if($resposta){
            echo '<h3 class="w3-green w3-center">'.'Salvo com sucesso!'.'</h3>';
        }
        else {
            echo '<div class="w3-red w3-center">';
            echo    '<h3>'.'Erro ao salvar cliente!'.'</h3>';
            echo    '<h3>'.'Tente novamente!'.'</h3>';
            echo '</div>';
        }

  
    }
    else {
        echo '<div class="w3-red w3-center">';
        echo    '<h3>'.'Erro ao cadastrar cliente!'.'</h3>';
        echo    '<h3>'.'Tente novamente!'.'</h3>';
        echo '</div>';
    }


?>
        </section>


    </body>
</html>