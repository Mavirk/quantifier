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
        $controller = new RegisterController();
        $controller->register();
      ?>
      <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class=form-group>
                <lable for="username" class="col col-form-lable">Name:</lable>
                <input type="text" class="col form-control" id="username" name="uname" required><br>
              </div>
              <div class=form-group>
                <lable for="email" class="col col-form-lable">Email:</lable>
                <input type="text" class="col form-control" id="email" name="email" required><br>
              </div>
              <div class=form-group>
                <lable for="password" class="col col-form-lable">Password:</lable>
                <input type="text" class="col form-control" id="password" name="password" required><br>
              </div>
              <div class=form-group>
                <lable for="password_confirm" class="col col-form-lable">Confirm Password:</lable>
                <input type="text" class="col form-control" id="password_confirm" name="password_confirm" required><br>
              </div>
              <div class="form-group">
                <input class="col" type="submit" name ="register" value= "Register">
                <a href="index.php" class="col"> Click here to login </a>
              </div>
            </from>
          </div>
        </div>
      </div>
    </body>
</html>