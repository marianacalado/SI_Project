<?php
  session_start();
  require('database/conection.php');
  require('database/customer_emp.php');

  $employee = getEmployeeByEmail();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>EmployeeProfile</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./employee_init.css" rel="stylesheet" />
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
            <h5>Employee Number</h5>
            <p><?php echo $employee['id_employee']?></p>
          </article>
        </section>
      </section>
      <section class="bottom-left">
        <header><h3>Personal Information</h3></header>
        <article>
          <ul>
            <li><b>Name: </b><span><?php echo $employee['name']?></span></li>
            <li><b>Email: </b><span><?php echo $employee['e_mail']?></span></li>
            <li><b>Phone Number: </b><span><?php echo $employee['phone_num']?></span></li>
          </ul>
        </article>
      </section>
      <section class="orders">
       <header>
         <h2>Orders</h2>
       </header>
       <article class="order">
         <h3>Order [numero]</h3>
         <div class="separate" > <!-- aqui entra loop de php -->
          <div>
            <p>Client:</p>
            <p>Client's Adress:</p>
            <p>Date:</p>
            <p>Produto:</p>
            <p>Produto:</p>
          </div>
            <select>
              <option value="0">-- Status--</option>
              <option >On Hold</option>
              <option>Processing</option>
              <option>Completed</option>
            </select>
         </div>
       </article>
      </section>
    </div>
    <?php include('./template/footer_tem.php');?>
  </body>
</html>
