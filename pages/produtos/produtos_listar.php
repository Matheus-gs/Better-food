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

    $lote_produto = 'lote_produto';

    function Mask($mask, $str)
    {

      $str = str_replace(" ", "", $str);

      for ($i = 0; $i < strlen($str); $i++) {
        @$mask[strpos($mask, "#")] = $str[$i];
      }

      return $mask;
    }

    foreach ($fetchProdutos as $key => $value) {

      $validade_produto =  strtotime($value['validade_produto']);
      $validade_produto_formatado = date('d-m-Y', $validade_produto);

      print "<tr>";

      // Colunas
      print "<td>" . $value[$id_produto] . "</td>";
      print "<td>" . $value[$nome_produto] . "</td>";
      print "<td>" . number_format($value[$carboidratos_produto], 2, ',', '.') . "g" . "</td>";
      print "<td>" . number_format($value[$proteinas_produto], 2, ',', '.') . "g" . "</td>";
      print "<td>" . number_format($value[$gorduras_totais_produto], 2, ',', '.') . "g" . "</td>";
      print "<td>" . number_format(($value[$peso_produto] / 1000), 2, ',', '.') . "Kg" . "</td>";
      print "<td>" . str_replace('-', '/', $validade_produto_formatado) . "</td>";
      print "<td>" . Mask("###-###", $value[$lote_produto]) . "</td>";
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