<?php
  session_start();

  // if (!isset($_SESSION["username"])) {
  //   $_SESSION["msg"] = "Please login.";
  //   header("Location: init_page.php");
  // }

  require('database/conection.php'); 

  $msg= $SESSION ["msg"];
  unset($SESSION ["msg"]);//apagar o atributo sessao 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>MyPharmaProfile</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="customer_init.css" rel="stylesheet" />
  </head>

  <body>
    <header>
      <a href="./init_page.php"><img alt="Logo" src="./assets/Logo_white.png"/></a>
      <div id="logout">
        <a href="./init_page.php">Logout</a>
      </div>
      <!-- <p><?php echo $msg?></p> para aparecer mensagem que se registou! -->
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
            <li>
              <b>Name</b>
              <span>asdasdas</span>
            </li>
            <li><b>Email</b> <span>dqwdqwd@fww.com</span></li>
            <li><b>Phone Number</b> <span>99999999999</span></li>
            <li><b>Address</b> <span>street ewqeqwewq</span></li>
            <li><b>Nif</b> <span>12313123</span></li>
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
