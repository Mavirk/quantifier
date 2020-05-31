<html lang="en" class="h-100">
    <head>
      <title>Quantifier</title>  
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
    </head>
    <body class="h-100">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <?php
        include 'controller_lib.php';
        session_start();
        $controller = new LoginController();
        $controller->Login();
      ?>
      <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                  <lable for="inputEmail" class="col col-form-label">E-mail:</lable>
                  <input type="email" class="col form-control" id="inputEmail" name="email" required>
                </div>
                <div class="form-group">
                  <lable for="inputPassword" class="col col-form-label">Password: </lable>
                  <input type="password" class="col form-control" id="inputPassword" name="password" required>
                </div>
                <div class="form-group">
                  <input class="col" type="submit" name = "login" value= "Login">
                  <a href="register.php" class="col" style="color:#148F77" > Click here to register </a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </body>
</html>
