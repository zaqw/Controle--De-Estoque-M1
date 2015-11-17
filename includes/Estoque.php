<?php
if(file_exists("Glogal.php")){
    include_once 'Global.php';
}else if(file_exists("includes/Global.php")){
    include_once '/includes/Global.php';
}

function salvar() {
    if(
    isset($_PoST['nome']) and
    isset($_PoST['valor']) and
    isset($_PoST['qtd'])
   ){
    $nome =($_PoST['nome']);
    $valor =($_PoST['valor']);
    $qtd =($_PoST['qtd']);
      
    $SQL ="";
    $preparo = conexao()->preparo($SQL);
    //$preparo->bindValue("", $nome);
    //$preparo->bindValue("", $valor);
    //$preparo->bindValue("", $qtd);
    $preparo->execute();
    if($preparo->rowCount () == 1) {
        echo"Sucesso!";
    }else{
        echo "Erro";
        
    }
    }
}