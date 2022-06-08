<?php 
  session_start();
  require('database/conection.php');//eu preciso de por isto se ja estiver dentro do ficheiro action?
  require('database/category.php'); 
  require('database/product.php');
  //require('database/suplier.php');

  $categories = getCategory();
  
  $id_category= $_GET['id_category'];

  $category = getCategoryById($id_category);

  $products= getProductsByCategoryId($id_category);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>MyProducts</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href= "list_products.css" rel="stylesheet" />
    <link href="header2.css" rel="stylesheet" />
  </head>
  
  <body>
    <?php include('./template/header2_tem.php');?>
    <div>
        <nav id="menu">
          <ul>
            <li class="sidebar-title">Medicines subject to medical prescription</li>
            <li class="current"><a href="./NewOrder.php">Register Prescription</a></li>
            <li class="sidebar-title">Medicines not subject to medical prescription</li>
            <?php foreach ($categories as $row) { ?>
              <li class="categorias"><a href="list_products.php?id_category=<?php echo $row["id_category"]?>"><?php echo $row["name"]?></a></li>
            <?php }?> 
          </ul>
        </nav>
        <section class="main-container">
            <header>
                <h1>Select Your Products</h1>
            </header>
            <section >
              <h3>Filter by</h3>
              <div class='select-container'>

              <form id="Submit filter" action="action_filter.php">
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
                <input type="submit" value="Submit filter">
              </form>
              
              
              </div>
              <table>
                <th>Image</th>
                <th>ProductId</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th><!-- temos de ver isto com o carrinho  -->
                <th></th>
                <?php foreach ($products as $row) { ?> 
                  <tr>
                    <td>
                      <p><?php echo $row["name"] ?></p>
                      <img src="<?php echo $row['image_path']?>" alt= "image_product" width="200"/> 
                    </td>
                    <td><p><?php echo $row["id_product"] ?></p></td>
                    <td><p><?php echo $row["description"] ?></p></td>
                    <td><span class="price">€<?php echo $row["unit_price"]?></span></td>
                    <td>
                      <form action="action_cart">
                        <input type="number" value= "1" min=1>
                        <input type="submit" value= "Add to cart">
                      </form>
                    </td>
                  </tr>
                <?php }?> 
              </table>
            </section>
        </section>
    </div>
  </body>
</html>



