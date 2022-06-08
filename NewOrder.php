<?php
  session_start();
  require('database/conection.php');
  require('database/category.php');
  require('database/product.php');

  $categories = getCategory();
  // $id_category= $_GET['id_category'];
  
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>NewOrder</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="NewOrder.css" rel="stylesheet" />
    <link href="footer.css" rel="stylesheet" />
    <link href="header2.css" rel="stylesheet" />
  </head>
  
  <body>
    <?php include('./template/header2_tem.php');?>
    <div>
        <nav id="menu">
          <ul>
            <li class="sidebar-title">Medicines subject to medical prescription</li>
            <li class="current">Register Prescription</li>
            <li class="sidebar-title">Medicines not subject to medical prescription</li>
            <?php foreach ($categories as $row) { ?>
              <li class="categorias"><a href="list_products.php?id_category=<?php echo $row["id_category"]?>"><?php echo $row["name"] ?></a></li>
            <?php }?> 
          </ul>
        </nav>
        <section class="main-container">
          <header>
              <h1>Prescription Registration</h1>
          </header>
          <section class="input-container">

            <form action="action_prescription.php" method="post">
              <label for="prescription">Prescription Id Number <span>*</span> </label>
              <input type="text" id="prescription" name ="id_prescription" required />

              <label for="benf">Beneficiary Name <span>*</span> </label>
              <input type="text" id="benf" name ="benf_name" required />
              
              <label for="doct_name">Doctor Name <span>*</span> </label>
              <input type="text" id="doct_name" name ="doct_name" required />

              <button>Register</button>

            </form>
          </section>
        </section>
    </div>
    <?php include('./template/footer_tem.php');?>
  </body>
</html>
