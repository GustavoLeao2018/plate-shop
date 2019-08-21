<?php

    
    function conectar($nome, $usuario, $senha){
        try{
            $nome_do_banco = 'mysql:host=localhost;dbname='.$nome;
            $conexao = new PDO($nome_do_banco, $usuario, $senha);            
            return $conexao;
        }catch(PDOException $error){
            echo '<h3 class="w3-red w3-center">'.$error->getMessage().'</h3>';
            return false;
        }
    }



    function executar_query($conexao, $sql, $array_dados){
        if (sizeof($array_dados) != 0){
            try{
                $stmt = $conexao->prepare($sql);
                $stmt->execute($array_dados);
                return true;
            }catch(PDOException $error){
                echo '<h3 class="w3-red w3-center">'.$error->getMessage().'</h3>';
                return false;
            }
        }
        else {
            try {
               $stmt = $conexao->query($sql);
               return $stmt; 
            }catch(PDOException $error){
                echo '<h3 class="w3-red w3-center">'.$error->getMessage().'</h3>';
                return false;
            }
        }
    }
    function inserir_cliente($conexao, $nome, $email, $telefone, $senha){
        $sql = 'INSERT INTO cliente(id, nome, email, telefone, senha) '.
               'VALUES (:id, :nome, :email, :telefone, :senha)';
        $array_de_dados = array(
            ':id' => null,
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':senha' => $senha
        );

        return executar_query($conexao, $sql, $array_de_dados);
    }
    function listar_cliente_nome($conexao) {
        $sql = 'SELECT * FROM cliente';
        return executar_query($conexao, $sql, []);
    }
    
    $conexao = conectar('plate-shop', 'root', '');


    
    
?>