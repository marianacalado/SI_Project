<?php 
  session_start();

  require('database/conection.php');
  require('database/category.php'); 
  require('database/product.php');
  require('database/suplier.php');
  require('database/brand.php');

  $supliers = getSuplier();

  $brands = getBrand();

  $categories = getCategory();
  
  $id_category= $_GET['id_category'];

  $category = getCategoryById($id_category);

  $products= getProductsByCategoryId($id_category);

  $result_= $_SESSION["session_products"];
  //unset

  // if (isset($_SESSION["session_products"])) {
    
  // }

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

              <form id="Submit filter" action="action_filter.php" method= "get">
                <select name="Supplier Select">
                  <option value= "none">---Supplier---</option>
                  <?php foreach ($supliers as $row) { ?>
                    <option value="<?php echo $row['id_suplier']; ?>"> <?php echo $row['name']; ?> </option>
                  <?php }?> 
                </select>
                <select name="Brand Select">
                  <option value= "none">---Brand---</option>
                  <?php foreach ($brands as $row) { ?>
                    <option value="<?php echo $row['id_brand']; ?>"> <?php echo $row['name']; ?> </option>
                  <?php }?> 
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
                <tr>
                  <?php foreach ($products as $row) { ?> 
                    <td>
                      <p><?php echo $row["name"] ?></p>
                      <img src="<?php echo $row['image_path']?>" alt= "image_product"> 
                    </td>
                    <td><p><?php echo $row["id_product"] ?></p></td>
                    <td><p><?php echo $row["description"] ?></p></td>
                    <td><span class="price">€<?php echo $row["unit_price"]?></span></td>
                    <td>
                      <form action="action_cart.php" method= "get">
                        <input type="hidden" name= "id_product" value= "<?php echo $row["id_product"] ?>" >
                        <input type="hidden" name= "name" value= "<?php echo $row["name"] ?>">
                        <input type="hidden" name= "unit_price" value= "<?php echo $row["unit_price"] ?>">
                        <input type="number" value= "1" min="1" name= "quantity">
                        <input type="submit" value= "Add to cart">
                      </form>
                    </td>
                  <?php }?> 
                </tr>
              </table>
            </section>
        </section>
    </div>
    <?php include('./template/footer_tem.php');?>
  </body>
</html>



