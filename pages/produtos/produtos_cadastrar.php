<section class="section-cadastrar">


    <div class="section-presentation">

        <img src="../../assets/images/cadastrar_produtos_bg.jpg" alt="Background Image">

        <h1>Seja bem vindo</h1>
        <p>
            nessa página você poderá cadastrar um novo produto em nosso sistema.
        </p>
    </div>

    <div class="form-container">
        <form action="" method="POST">

            <label>Nome</label>
            <input type="text" name="nome_produto" required placeholder="Nome do produto">

            <label>Carboidratos(g)</label>
            <input type="number" name="carboidratos_produto" required min="0" placeholder="Carboidratos">

            <label>Proteínas(g)</label>
            <input type="number" name=" proteinas_produto" required min="0" placeholder="Proteínas">

            <label>Gorduras Totais(g)</label>
            <input type="number" name=" gorduras_totais_produto" required min="0" placeholder="Gorduras Totais">

            <label>Peso(g)</label>
            <input type="number" name="peso_produto" required min="0" placeholder="Peso">

            <label>Validade</label>
            <input type="date" name="validade_produto" required min="0">

            <label>Lote</label>
            <input type="number" name="lote_produto" placeholder="Lote" size="6" maxlength="6">

            <button type="submit">Cadastrar</button>

        </form>
    </div>
</section>

<?php

$nome_produto = @$_POST['nome_produto'];

$carboidratos_produto = @$_POST['carboidratos_produto'];
$proteinas_produto = @$_POST['proteinas_produto'];
$gorduras_totais_produto = @$_POST['gorduras_totais_produto'];

$peso_produto = @$_POST['peso_produto'];

$validade_produto = @$_POST['validade_produto'];

$lote_produto = @$_POST['lote_produto'];

// Verificando se já existe um produto de mesmo nome e lote no banco de dados
$has_product = $pdo->prepare("SELECT * FROM products WHERE nome_produto='{$nome_produto}' AND lote_produto='{$lote_produto}'");
$has_product->execute();

$has_product_counter = $has_product->rowCount();

// Validando a verificação acima e cadastrando
if (
    $nome_produto !== null and
    $has_product_counter == 0
) {

    try {
        $sql = "INSERT INTO products (
            id_produto,
            nome_produto,
            carboidratos_produto,
            proteinas_produto,
            gorduras_totais_produto,
            peso_produto,
            validade_produto,
            lote_produto
        )
            VALUES (
                null,
                '{$nome_produto}',
                '{$carboidratos_produto}',
                '{$proteinas_produto}',
                '{$gorduras_totais_produto}',
                '{$peso_produto}',
                '{$validade_produto}',
                '{$lote_produto}'
            )
        ";

        $pdo->exec($sql);


        echo '<script type="text/javascript">alert("Produto cadastrado com sucesso")</script>';
        echo '<script type="text/javascript">location.href="?page=listar_produtos"</script>';
    } catch (PDOException $e) {

        echo '<script type="text/javascript">console.log("Falha ao cadastrar")</script>';

        echo $sql . "<br>" . $e->getMessage();
    }

    $pdo = null;
} else if ($has_product_counter !== 0) {
    print '<script type="text/javascript">alert("Não foi possível cadastrar, este produto já foi cadastrado anteriormente.")</script>';
}


?>