<?php
if(file_exists("Glogal.php")){
    include_once 'Global.php';
}else if(file_exists("includes/Global.php")){
    include_once '/includes/Global.php';
}

function salvar() {
    if(
    isset($_PoST['nome']) and
    isset($_PoST['idade']) and
    isset($_PoST['cpf']) 
   ){
    $nome =($_PoST['nome']);
    $valor =($_PoST['idade']);
    $qtd =($_PoST['cpf']);
    $dtval =(isset($_PoST['dtnas']) ? $_POST['dtnas'] : "");
      
    $SQL = "INSERT INTO produto (nome,idade,cpf,data_de_nascimento) values (:nome, :idade, :cpf, :dtnas):";
    $preparo = conexao()->preparo($SQL);
    $preparo->bindValue("nome", $nome);
    $preparo->bindValue("idade", $valor);
    $preparo->bindValue("cpf", $qtd);
    $preparo->bindValue("dtnas", $dtval);
    $preparo->execute();
    if($preparo->rowCount () == 1) {
        echo"Sucesso!";
    }else{
        echo "Erro";
        
    }
    }
}

function Listar(){
    $SQL = "SELECT =  FROM produto WHERE 1;";
    $preparo = conexao() ->prepare($SQL);
    $preparo ->execute();
    while ($linha = $preparo->fetch(PDO::FETCH_ASSOC)) {
        echo"<tr>";
        echo "<td> <a href='?excluir=".$linha['idProduto']."'>Excluir</a></td>";
        echo"<td>" .$linha['idProduto']."</td>";
        echo"<td>" .$linha['nome']."</td>";
        echo"<td>" .$linha['idade']."</td>";
        echo"<td>" .$linha['cpf']."</td>";
        echo"<td>" .$linha['data_de_nascimento']."</td>";
        echo"</tr>";
        
    }
}
function editar_por_id() {
    if(isset($GET['editar'])){
        $id = $GET['editar'];
        $SQL = "SELECT = FROM produto WHERE idProduto = :idProduto;";
        $prepare = conexao()->prepare($SQL);
        $prepare->bindValue (":idProduto", $id);
        $prepare->execute();
        if($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form method="post">
                <input type="hidden" name="editar" value=" <?= $linha['idProduto'] ?>"/>
                Nome:
                <input type="text" name="nome" value=" <?= $linha['nome'] ?>"/>
                Valor:
                <input type="text" name="idade" value=" <?= $linha['valor'] ?>"/>
                Quantidade:
                <input type="text" name="cpf" value=" <?= $linha['quantidade'] ?>"/>
                Data de Validade:
                <input type="text" name="dtnas" value=" <?= $linha['data_de_validade'] ?>" />
                <input type="submit" value="Editar" />
            </form>
         <?php
         }
    }
}
 