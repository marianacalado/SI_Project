<?php
  session_start();

  //require('database/conection.php'); 

  // $msg= $SESSION ["msg"];
  // unset($SESSION ["msg"]);//apagar o atributo sessao 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>MyOrders</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./myOrders.css" rel="stylesheet" />
  </head>

  <header>
    <!-- Cabeçalho da página: Navbar-->
    <a href="./init_page.php"><img alt="Logo" src="./assets/Logo_white.png"/></a>
    <div id="logout">
      <a href="./init_page.php">Logout</a>
    </div>
  </header>

  <body>
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
  </body>
</html>
