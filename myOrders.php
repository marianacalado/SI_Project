<?php
  session_start();

  require('database/conection.php');
  require('database/customer_emp.php');

  $customer = getCustomerByEmail();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>MyOrders</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./myOrders.css" rel="stylesheet" />
    <link href="footer.css" rel="stylesheet" />
    <link href="header2.css" rel="stylesheet" />
  </head>

  <body>
    <?php include('./template/header2_tem.php');?>
    <div class="grid-container">
      <section>
        <section class="upper-left">
          <article>
            <img class="profile-picture" src="./assets/perfil.jpg" />
            <h5>Client Number</h5>
            <p>612312312</p>
          </article>
        </section>
      </section>
      <section class="bottom-left">
        <header><h3>Personal Information</h3></header>
        <article>
          <ul>
            <li><b>Name</b><span><?php echo $customer['name']?></span></li>
            <li><b>Email</b> <span><?php echo $customer['e_mail']?></span></li>
            <li><b>Phone Number</b> <span><?php echo $customer['phone_num']?></span></li>
            <li><b>Address</b> <span><?php echo $customer['address']?></span></li>
            <li><b>VAT Number</b> <span><?php echo $customer['VAT_num']?></span></li>
          </ul>
        </article>
      </section>
      <section class="orders">
       <header>
         <h2>My Orders</h2>
       </header>
       <article class="order">
         <h3>Order [numero]</h3>
         <div class="separate" >
          <div>
            <p>Client:</p>
            <p>Nome cliente: qwewq</p>
            <p>Nome cliente: qwewq</p>
            <p>Nome cliente: qwewq</p>
            <p>Nome cliente: qwewq</p>
          </div>
            <div class="status">
             <h2>Status</h2>
             <span>Status</span>
            </div>
         </div>
       </article>
        </div>
        </div>
      </article>
      </section>
    </div>
    <?php include('./template/footer_tem.php');?>
  </body>
</html>
