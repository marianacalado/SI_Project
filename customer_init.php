<?php
  session_start();

  require('database/conection.php');
  require('database/customer_emp.php');

  $customer = getCustomerByEmail();

  $msg2= $SESSION ["msg2"];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>CustomerProfile</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="customer_init.css" rel="stylesheet" />
    <link href="footer.css" rel="stylesheet" />
    <link href="header2.css" rel="stylesheet" />
  </head>

  <body>
    <?php include('./template/header2_tem.php');?>
    <p><?php echo $msg2?></p>
    <div class="grid-container">
      <section>
        <section class="upper-left">
          <article>
            <img class="profile-picture" src="./assets/perfil.jpg" alt="profile_user" />
            <h5>Client Number</h5>
            <p><?php echo $customer['id_customer']?></p>
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
      <section class="new-order">
        <article>
          <p>
            Place your orders in a single click.
          </p>
          <a href="./NewOrder.php"> 
            <button>Order Now</button>
          </a>
        </article>
      </section>
      <section class="my-orders">
        <article>
          <p>
            Check the status of your order.
          </p>
          <a href="./myOrders.php"> 
            <button>My Orders</button>
          </a>
        </article>
      </section>
    </div>
    <?php include('./template/footer_tem.php');?>
  </body>
</html>
