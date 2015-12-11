<?php
include './includes/Global.php';
include './includes/Estoque.php';
$title = "Controle de Estoque" ;
include './template/header.php';
?>
<?php salvar(); ?>

<form method="post">
    <div class="center">
        <h2 style="text-align: center;">Cadastro de Nomes</h2>
        Nome: <input type="text" name="nome"/>
        Idade: <input type="text" name="idade"/>
        CPF: <input type="text" name="cpf"/>
        Data de Nascimento: <input type="text" name="dtnas"/>
        <input type="submit" value="Enviar" />
    </div>
</form>

<?php
   include './template/footer.php';
   ?>