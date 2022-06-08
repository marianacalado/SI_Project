<?php
  session_start();

  require('database/conection.php');

  // if (!isset($_SESSION["email"]) ) {
  //   $_SESSION["msg"] = "Please login.";
  //   header("Location: init_page.php");
  // }

  $stmt = $dbh->prepare('SELECT name FROM Customer WHERE id_customer=?');
  $stmt->execute();
  $name = $stmt->fetchAll();
 
  $stmt = $dbh->prepare('SELECT e_mail FROM Customer WHERE id_customer=?');
  $stmt->execute();
  $email = $stmt->fetchAll();

  $stmt = $dbh->prepare('SELECT phone_num FROM Customer WHERE id_customer=?');
  $stmt->execute();
  $phone_num = $stmt->fetchAll();

  $stmt = $dbh->prepare('SELECT address FROM Customer WHERE id_customer=?');
  $stmt->execute();
  $address = $stmt->fetchAll();

  $stmt = $dbh->prepare('SELECT VAT_num FROM Customer WHERE id_customer=?');
  $stmt->execute();
  $vat_num = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>CustomerProfile</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="customer_init.css" rel="stylesheet" />
  </head>

  <body>
    <header>
      <a href="./init_page.php"><img alt="Logo" src="./assets/Logo_white.png"/></a>
      <!-- <div id="logout">
        <a href="./init_page.php">Logout</a>
      </div> -->
      <form id="logout" action="action_logout.php">
        <span><?php echo $_SESSION["email"] ?></span>
        <input type="submit" value="Logout">
      </form>
      <?php if (isset($msg)) { ?>
        <p><?php echo $msg ?></p>
      <?php } ?>
    </header>
    <div class="grid-container">
      <section>
        <section class="upper-left">
          <article>
            <img class="profile-picture" src="./assets/perfil.jpg" alt="profile_user" />
            <h5>Client Number</h5>
            <p>612312312</p>
          </article>
        </section>
      </section>
      <section class="bottom-left">
        <header><h3>Personal Information</h3></header>
         
        <article>
          <ul>
            <li><b>Name</b><span><?php echo $name[0]?></span></li>
            <li><b>Email</b> <span><?php echo $email[0]?></span></li>
            <li><b>Phone Number</b> <span><?php echo $phone_num ?></span></li>
            <li><b>Address</b> <span><?php echo $address?></span></li>
            <li><b>VAT Number</b> <span><?php echo $vat_num ?></span></li>
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
  </body>
</html>
