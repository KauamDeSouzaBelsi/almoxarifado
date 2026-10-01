<?php 
require "conexao.php";

$metodo = $_SERVER["REQUEST_METHOD"];

if($metodo == "POST"){

    $json = file_get_contents("php://input");

    $dados = json_decode($json,true);

    if($dados["categoria"] == "eletrica" || $dados["categoria"] == "mecanica" || $dados["categoria"] == "hidraulica")
    
    {    
        $sql = "INSERT INTO almoxarifado (nome, categoria, fornecedor, quantidade, preco_unitario) VALUES (?,?,?,?,?)"; 
        $comando = $pdo -> prepare($sql);
        
        // Executando o comando SQL
        $comando -> execute([
        $dados["nome"],
        $dados["categoria"],
        $dados["fornecedor"],
        $dados["quantidade"],
        $dados["preco_unitario"]
        ]);
        
            echo json_encode(["Mensagem"=>"item cadastrado com sucesso!"]);
    } 
        else{
            echo json_encode(["Mensagem"=>"Por favor, confira os itens colocados"]);
        }
}
if($metodo == "GET"){
    $sql = "SELECT * FROM almoxarifado ORDER BY id";

    $comando = $pdo -> query($sql);

    $almoxarifado = $comando -> fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($almoxarifado);
};

if($metodo == "PUT"){
    $json = file_get_contents("php://input");

    $dados = json_decode($json,true);
    
    if($dados["categoria"] == "eletrica" or $dados["categoria"] == "mecanica" or $dados["categoria"] == "hidraulica"){
            $sql = "UPDATE almoxerifado SET nome=?,categoria=?,fornecedor=?,qunatidade=?,preco_unitario=? WHERE id=?";
        
            $comando = $pdo -> prepare($sql);
        
            $comando -> execute([
                $dados["nome"],
                $dados["categoria"],
                $dados["fornecedor"],
                $dados["qunatidade"],
                $dados["preco unitario"],
                $dados["id"]
            ]);
        
            echo json_encode(["Mensagem"=>"item atualizado com sucesso!"]);
        }
     else{
            echo json_encode(["Mensagem"=>"aaaaaaa"]);
    }        
};

if($metodo == "DELETE"){

    $json = file_get_contents("php://input");

    $dados = json_decode($json,true);

    $sql = "DELETE FROM almoxarifado WHERE id=?";

    $comando = $pdo -> prepare($sql);

    $comando -> execute([
        $dados["id"]
    ]);

    echo json_encode(["Mensagem"=>"item excluído com sucesso!"]);
}
?>