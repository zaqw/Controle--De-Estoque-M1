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
    $dtval =(isset($_PoST['dtval']) ? $_POST['dtval'] : "");
      
    $SQL = "INSERT INTO produto (nome,valor,quantidade,data_de_validade) values (:nome, :valor, :qtd, :dtval):";
    $preparo = conexao()->preparo($SQL);
    $preparo->bindValue("nome", $nome);
    $preparo->bindValue("valor", $valor);
    $preparo->bindValue("qtd", $qtd);
    $preparo->bindValue("dtval", $dtval);
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
        echo"<td>" .$linha['valor']."</td>";
        echo"<td>" .$linha['quantidade']."</td>";
        echo"<td>" .$linha['data_de_validade']."</td>";
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
                <input type="text" name="valor" value=" <?= $linha['valor'] ?>"/>
                Quantidade:
                <input type="text" name="qtd" value=" <?= $linha['quantidade'] ?>"/>
                Data de Validade:
                <input type="text" name="dtval" value=" <?= $linha['data_de_validade'] ?>" />
                <input type="submit" value="Editar" />
            </form>
         <?php
         }
    }
}
    function editar() {
    if(
    isset($_POST['editar']) and
    isset($_POST['nome']) and
    isset($_POST['valor']) and
    isset($_POST['qd']) and
    isset($_POST['dtval'])
    )}