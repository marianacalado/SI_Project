<header>
    <a href="./init_page.php"><img alt="Logo" src="./assets/Logo_white.png"/></a>
    <!-- <div id="logout">
    <a href="./init_page.php">Logout</a>
    </div> -->
    <form id="logout" action="action_logout.php">
        <span><?php echo $_SESSION["email"] ?></span>
        <input type="submit" value="Logout">
    </form>
</header>