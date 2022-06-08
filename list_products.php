<?php 
  // session_start();
  // require('database/conection.php');//eu preciso de por isto se ja estiver dentro do ficheiro action?
  // require('database/category.php'); 
  // require('database/product.php');

  // $id_category= $_GET['id_category'];

  // fuction getCategoryById($id_category) { //esta função vai a tabela das categorias logo por nas categorias 
  //     global $dbh;
  //     $stmt = $dbh->prepare('SELECT * FROM Category WHERE id_category=?'); 
  //     $stmt->execute(array($id_category)); //executa da erro 
  //     return $stmt->fetch()
  // }

  // $category = getCategoryById($id_category);

  // fuction getProductsByCategoryId($id_category) { //por no file de products
  //     global $dbh;
  //     $stmt = $dbh->prepare('SELECT * FROM Product WHERE category_id=?'); //seleciona todos os produtos de uma determinada categoria 
  //     $stmt->execute(array($id_category)); 
  //     return $stmt->fetchAll()$products
  // }

  // $products= getProductsByCategoryId($id_category);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>MyProducts</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="list_products.css" rel="stylesheet" />
    <link href="footer.css" rel="stylesheet" />
    <link href="header2.css" rel="stylesheet" />
  </head>
  
  <body>
    <?php include('./template/header2_tem.php');?>
    <div>
        <nav id="menu">
            <ul>
              <!-- <?php foreach ($categories as $row) { ?>
                <li>
                  <a href="list_products.php?id_category="><?php echo $row["id"] ?></a>
                </li>
              <?php }?> vai substituir a lista de categorias em html  -->
              <li class="sidebar-title">Medicines subject to medical prescription</li>
              <li class="categorias"><a href="./NewOrder.php">Register Prescription</a></li>
              <li class="sidebar-title">Medicines not subject to medical prescription</li>
              <li class="categorias"><a href="./list_products.php">Beauty & Hygiene</a></li>
              <li class="categorias"><a href="./list_products.php">Personal Care</a></li>
              <li class="categorias"><a href="./list_products.php">Medicines</a></li>
              <li class="categorias"><a href="./list_products.php">Food Suplements & Nutricion</a></li>
              <li class="categorias"><a href="./list_products.php">Contraception & Intimate Products</a></li>
              <li class="categorias"><a href="./list_products.php">Covid-19</a></li>
              <li class="categorias"><a href="./list_products.php">Medical Equipment</a></li>
              <li class="categorias"><a href="./list_products.php">Animal Care</a></li>
              <li class="categorias"><a href="./list_products.php">Orthopedic Products</a></li>
            </ul>
        </nav>
        <section class="main-container">
            <header>
                <h1>Select Your Products</h1>
            </header>
            <section >
              <h3>Filter by</h3>
              <div class='select-container'>
                <select>
                  <option>---Supplier---</option>
                  <option>Alconox</option>
                  <option>Berkshire Corporation</option>
                  <option>Celitron</option>
                  <option>Drugsales</option>
                  <option>Estima Pharma Solutions</option>
                  <option>GE Healthcare Life Sciences</option>
                </select>
                <select>
                  <option>---Brand---</option>
                  <option>Giorgio Armani</option>
                  <option>Vichy</option>
                  <option>La Roche Posay</option>
                  <option>Sensilis</option>
                  <option>Aposán</option>
                  <option>Listerine</option>
                  <option>Urgo</option>
                  <option>Venixe</option>
                  <option>Sargenor</option>
                  <option>Bayer</option>
                  <option>Niquitin</option>
                  <option>Moreno</option>
                  <option>Eucerin</option>
                  <option>Durex</option>
                  <option>Race</option>
                </select>
              </div>
              <table>
                <th>Image</th>
                <th>Supplier</th>
                <th>Product</th>
                <th>Brand</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>

                <th></th>
                <!-- Começa aqui o loop do php -->
                <tr>
                  <td>w</td>
                  <td>w</td>
                  <td>w</td>
                  <td>w</td>
                  <td>w</td>
                  <td>w</td>
                  <td><input type="number"/></td>
                  <td><button>Add</button></td>
                </tr>

                <!-- Acaba aqui -->
              </table>
            </section>
        </section>
    </div>
    <?php include('./template/footer_tem.php');?>
  </body>
</html>



