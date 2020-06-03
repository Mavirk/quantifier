<html lang="en" class="h-100">
    <head>
        <title>Quantifier</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
        <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
    </head>
    <body class="h-100">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <?php
            include 'controller_lib.php';
            // include 'model_lib.php';
            session_start();
            if($_SESSION['userid']){
                $homeController = new HomeController();
            }else {
                header("location: logout.php");
            }
        ?>

        <?php
            include 'header.php'
        ?>
        
        <header>
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col p-5"> 
                        <div class="row justify-content-center p-5">
                            <h2 align="center">Contact Us</h2>
                        </div>
                        <div class="row justify-content-center p-1">
                            <h6 align="center">Email: oatsrobert81@gmail.com</h6>
                        </div>
                        <div class="row justify-content-center p-1">
                            <h6 align="center">Phone: +27 79 352 9648</h6>
                        </div>
                    </div>
                </div> 
        </header>
    </body>
</html>