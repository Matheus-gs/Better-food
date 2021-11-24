<section class="section-listar">

  <img src="../../assets/images/listar_produtos_bg.jpg" alt="Background Image">

  <h1>Produtos</h1>

  <table cellspacing="0">
    <?php
    // 
    $sql = $pdo->prepare("SELECT * FROM products");
    $sql->execute();

    $count = $sql->rowCount();

    print "<p class='listar-resultados'>Encontramos $count resultado(s)</p>";

    if ($count == 0) {

      echo ('
       <a href="?page=cadastrar_produtos" >Clique aqui para cadastrar produtos</a>
       
       ');
      // 
    } else if ($count !== 0) {
      // 
      echo ('
  
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Carboidratos</th>
          <th>Proteínas</th>
          <th>Gorduras Totais</th>
          <th>Peso(Kg)</th>
          <th>Validade</th>
          <th>Lote</th>
  
          <th>Editar</th>
          <th>Delete</th>
      </tr>
    
    ');
    }

    $fetchProdutos = $sql->fetchAll();

    // Identificadores das colunas
    $id_produto = 'id_produto';
    $nome_produto = 'nome_produto';

    $carboidratos_produto = 'carboidratos_produto';
    $proteinas_produto = 'proteinas_produto';
    $gorduras_totais_produto = 'gorduras_totais_produto';

    $peso_produto = 'peso_produto';

    $validade_produto = 'validade_produto';

    $lote_produto = 'lote_produto';

    foreach ($fetchProdutos as $key => $value) {

      print "<tr>";

      // Colunas
      print "<td>" . $value[$id_produto] . "</td>";
      print "<td>" . $value[$nome_produto] . "</td>";
      print "<td>" . $value[$carboidratos_produto] . "</td>";
      print "<td>" . $value[$proteinas_produto] . "</td>";
      print "<td>" . $value[$gorduras_totais_produto] . "</td>";
      print "<td>" . $value[$peso_produto] . "</td>";
      print "<td>" . $value[$validade_produto] . "</td>";
      print "<td>" . $value[$lote_produto] . "</td>";
      //===== Ações =====//

      // Editar
      print "<td>
             
               <a href='?page=editar_produtos&editar=$value[$id_produto]'>
                 <i data-feather='edit' class='edit-icon'></i>
               </a>
                 
             </td>";

      // Deletar
      print "<td>
       
               <a href='?page=editar_produtos&delete=$value[$id_produto]'>
                 <i data-feather='trash' class='delete-icon'></i>
               </a>
           
             </td>";

      print "</tr>";
    };

    ?>
  </table>


</section>