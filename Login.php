<?php

  require('database/conection.php');//eu preciso de por isto se ja estiver dentro do ficheiro action?
  require('action_login.php'); 

  $msg = $_SESSION["msg"];
  unset($_SESSION["msg"]);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Login</title>  
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="Login.css" rel="stylesheet" />
  </head>

  <body>
    <header>
      <a href="./init_page.php"><img alt="Logo" src="./assets/Logo_white.png"/></a>
    </header>
    <div class = "section1">
      <article>
        <form action="action_login.php" method="post">
          <div id = "text">Welcome!</div>
                  
          <label id="label1" for="email">Email</label>
          <input type="text" id="email" name ="email" required>

          <label id="label2" for="password_">Password</label>
          <input type="password" id ="password_" name ="password_" required>
  
          <button type="submit">Login</button>  

          <p>Not a member? <a href = "Register.html">Register here.</a></p>
        </form>
      </article>   
    </div>
  </body>
</html>
 