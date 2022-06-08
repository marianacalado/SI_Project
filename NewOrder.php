<?php
  session_start();
  require('database/conection.php');

  $msg= $SESSION ["msg"];   
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
            <!-- <?php foreach ($categories as $row) { ?>
              <li>
                <a href="list_products.html?id_category="><?php echo $row["id"] ?></a>
              </li>
            <?php }?> vai substituir a lista de categorias em html  -->
              <li class="sidebar-title">Medicines subject to medical prescription</li>
              <li class="current">Register Prescription</li>
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
            <?php if (isset($msg)) { ?>
              <p class = "msg"><?php echo $msg ?></p>  
            <?php } ?>
          </section>
        </section>
    </div>
    <?php include('./template/footer_tem.php');?>
  </body>
</html>
