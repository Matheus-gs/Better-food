<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

    $id = (int)$_GET['delete'];
    $pdo->exec("DELETE FROM products WHERE id_produto=" . $id);
    // 
    print "<script type='text/javascript'>location.href='?page=listar_produtos';</script>";
}
?>

<!-- Preenchendo os campos com os valores atuais -->
<?php

if (isset($_REQUEST['editar'])) {

    $id = (int)$_GET['editar'];

    $sql = $pdo->prepare("SELECT * FROM products WHERE id_produto =" . $id);
    $sql->execute();

    $fetchProdutos = $sql->fetchAll();

    $nome_produto = 'nome_produto';

    $carboidratos_produto = 'carboidratos_produto';
    $proteinas_produto = 'proteinas_produto';
    $gorduras_totais_produto = 'gorduras_totais_produto';

    $peso_produto = 'peso_produto';

    $validade_produto = 'validade_produto';

    $lote_produto = 'lote_produto';

    foreach ($fetchProdutos as $key => $value) {
        $nome_produto_atual = $value[$nome_produto];
        $carboidratos_produto_atual = $value[$carboidratos_produto];
        $proteinas_produto_atual = $value[$proteinas_produto];
        $gorduras_totais_produto_atual = $value[$gorduras_totais_produto];
        $peso_produto_atual = $value[$peso_produto];
        $validade_produto_atual = $value[$validade_produto];
        $lote_produto_atual = $value[$lote_produto];
    }

?>
    <section class="section-cadastrar editar">

        <div class="section-presentation">

            <img src="../../assets/images/cadastrar_produtos_bg.jpg" alt="Background Image">

            <h1>Se enganou?</h1>
            <p>
                Não se preocupe, fique a vontade para editar suas informações.
            </p>
        </div>
        <div class="form-container">

            <form action="" method="POST">

                <label>Nome</label>
                <input type="text" name="nome_produto" required value="<?php echo $nome_produto_atual ?>">

                <label>Carboidratos(g)</label>
                <input type="number" name="carboidratos_produto" required value="<?php echo $carboidratos_produto_atual ?>" min="0">

                <label>Proteínas(g)</label>
                <input type="number" name=" proteinas_produto" required value="<?php echo $proteinas_produto_atual ?>" min="0">

                <label>Gorduras Totais(g)</label>
                <input type="number" name=" gorduras_totais_produto" required value="<?php echo $gorduras_produto_atual ?>" min="0">

                <label>Peso(Kg)</label>
                <input type="number" name="peso_produto" required value="<?php echo $peso_produto_atual ?>" min="0">

                <label>Validade</label>
                <input type="date" name="validade_produto" required value="<?php echo $validade_produto_atual ?>" min="0">

                <label>Lote</label>
                <input type="number" name="lote_produto" value="<?php echo $lote_produto_atual ?>">

                <button type="submit">Editar</button>

            </form>
        </div>
    </section>

<?php
    // 
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

    if (
        $nome_produto !== null and
        $has_product_counter == 0
    ) {
        $id = (int)$_GET['editar'];

        try {

            $sql = "UPDATE products SET
                nome_produto = '{$nome_produto}',
                carboidratos_produto = '{$carboidratos_produto}',
                proteinas_produto = '{$proteinas_produto}',
                gorduras_totais_produto = '{$gorduras_totais_produto}',
                peso_produto = '{$peso_produto}',
                validade_produto = '{$validade_produto}',
                lote_produto = '{$lote_produto}'

                WHERE id_produto =" . $id;


            $stmt = $pdo->prepare($sql);

            $stmt->execute();

            echo  "<script>location.href='?page=listar_produtos';</script>";
        } catch (PDOException $e) {

            echo $sql . "<br>" . $e->getMessage();
            $pdo = null;
        }
    }
}

?>