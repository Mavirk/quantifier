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
            $siteId = "";
            if($_SESSION['userid']){
                $homeController = new HomeController();
                // $homeController->getSites($_SESSION['userid']);
                $homeController->addSite($_SESSION['userid']);
                $siteId = $homeController->filterSite($_SESSION['userid']);
            }else {
                header("location: logout.php");
            }
            $userid = $_SESSION['userid'];
            $userTable = new UserTable();
            $user = $userTable->getUserbyId($userid);
        ?>

        <?php
            include 'header.php'
        ?>
        
        <header>
            <div class="container-fluid">
                <div class="row justify-content-center"> 
                    <h2 align="center"> Sites </h2>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-4">
                    </div>
                    <div class="col">
                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <label for ="sitenum">Add Site</label>
                                <input type="text" class="form-control" name="sitenum" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addSite" value="Add Site"/>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <label for="sitelist">Filter By Site</label>
                                <select class="form-control" name="sitelist">
                                    <?php
                                    $sites = $homeController->getSites($userid);
                                    foreach ($sites as $site) {
                                        Print "<option>".$site->sitenum."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="filterSite" value="Filter Site"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
                <?php
                    include 'hometables.php'
                ?>
            </div>
        </header>
    </body>
</html>