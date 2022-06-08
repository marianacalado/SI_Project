<?php
  session_start();
  require('database/conection.php');

  $msg= $SESSION ["msg"];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Registration</title>  
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="Register.css" rel="stylesheet" />
        <link href="footer.css" rel="stylesheet" />
    </head>

    <body> 
        <header> 
            <a href="./init_page.php"> <img alt="Logo" src="./assets/Logo_white.png" /></a>
            <div id="signup">
            <a href="./Login.php">Login</a>
            </div>
        </header>
        <section class = "section1">
            <div class = "div1">
                <form action = "action_register.php" method = "post">

                    <div>
                        <label for="name">Name <span>*</span> </label>
                        <input id = "name" name ="name" type = "text" required/> 
                    </div>
                    
                    <div>
                        <label for="email">Email <span>*</span> </label>
                        <input id = "email" name ="e_mail" type="email" required/>
                    </div>

                    <div>
                        <label for="vat_num">VAT number <span>*</span> </label>
                        <input id = "vat_num" name ="VAT_num" type="text" required/>
                    </div>
                    
                    <div id = "container1">
                        <div>
                            <label for="phoneNumber">Phone Number <span>*</span> </label>
                            <input id = "phoneNumber" name ="phone_num" type="tel" required/>
                        </div>

                        <div>
                            <label for="city">City <span>*</span> </label>
                            <input id = "city" name ="city" type="text" required/>
                        </div>
                    </div>
                    
                    <div>
                        <label for="address">Address <span>*</span> </label>
                        <input id = "address" name ="address" type="text" required>
                    </div>

                    <div id = "container2">

                        <div>                
                            <label for="password">Password <span>*</span> </label>
                            <input id = "password" name ="password" type="password" required/>
                        </div>
                            
                    </div>
                    <button>Next</button>

                </form> 

                <?php if (isset($msg)) { ?>
                    <p class = "msg"><?php echo $msg ?></p>  
                <?php } ?>

            </div>
        
            <div class = "div2">
                <img src="./assets/sign.jpg" alt="SignupImage">
            </div>
        </section>
        
        <footer>
            <div id = "footerSection1"> 
                <img src = "./assets/address.png" alt = "Address icon">
                <h4> Address </h4>
                <p> Rua Xanana Gusmão 23
                    <br> 4460-205 Senhora da hora 
                    <br> PORTUGAL 
                </p>
        
                <img src = "./assets/phone.png" alt = "Phone number icon">
                <h4> Phone number </h4>
                <p> +351 22 508 14 00 </p>
        
                <img src = "./assets/email.png" alt = "E-mail icon">
                <h4> E-mail </h4>
                <p> mypharmainfo@gmail.com </p>         
            </div>
        
            <div id = "footerSection2"> 
                <p> Copyright © MyPharma 2022. All rights reserved 
                    <br> Made by Mariana Calado | Susana Teixeira 
                </p>
            </div>
        </footer>
    </body>
</html>
