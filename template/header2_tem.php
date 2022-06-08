<!DOCTYPE html>

<head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="header2.css" rel="stylesheet" />
</head>

<body>
    <header>
        <a href="./init_page.php"><img alt="Logo" src="./assets/Logo_white.png"/></a>
        <form id="logout" action="action_logout.php">
            <span><?php echo $_SESSION["email"] ?></span>
            <input type="submit" value="Logout">
        </form>
    </header>
</body>
