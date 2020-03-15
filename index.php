<html>
    <header>
        <title>Quantifier</title>    
    </header>
    <body>

    <?php
      include 'controller_lib.php';
      $controller = new RegisterController();
      $controller->register();
    ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          Name: <input type="text" name="uname" required><br>
          E-mail: <input type="text" name="email" required><br>
          Password: <input type="text" name="password" required><br>
          Confirm Password: <input type="text" name="password_confirm" required><br>
          <input type="submit" name = "register" value= "Register">
      </form>
    </body>
</html>