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
            // include 'model_lib.php';
            session_start();
            if($_SESSION['userid']){
                $homeController = new HomeController();
                $homeController->addFoundation($_SESSION['userid']);
            }else {
                header("location: logout.php");
            }
            $userid = $_SESSION['userid'];
            $userTable = new UserTable();
            $user = $userTable->getUserbyId($userid);
        ?>
       
        <div class="container-fluid h-100">
            <div class="row h-25">
                <div class="col">
                    <div class="row"> 
                        <div class="col-3">
                            <h6>Hello <?php Print "$user->username"?></h6>
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col-3">
                            <a href="logout.php"> Click here to logout </a>
                        </div>
                    </div> 
                    <div class="row justify-content-center" id="navbar">
                        <h6>NAVBAR</h6>
                    </div> 
                    <div class="row justify-content-center"> 
                        <h2 align="center"> Foundations </h2>
                    </div> 
                </div>
            </div>
            <div class="row h-75 justify-content-center">
                <div class="col-sm-9">
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="form-group">
                            <label for ="sitenum">Site Number</label>
                            <input type="text" class="form-control" id="sitenum" name="sitenum"/>
                        </div>
                        <div class="form-group">
                            <label for ="width">Width (m): </label>
                            <input type="text" class="form-control" id="width" name="width"/>
                        </div>
                        <div class="form-group">
                            <label for ="length">Length (m): </label>
                            <input type="text" class="form-control" id="length" name="length"/>
                        </div>
                        <div class="form-group">
                            <label for ="depth">Depth (mm): </label>
                            <input type="text" class="form-control" id="depth" name="depth"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="addfoundation" value="Add"/>
                        </div>
                    </form>
                </div>
                <div class="col-sm-9">
                    <table class="table" align="center" border= "1px" width="100%">
                        <tr align="center">
                            <th>Sitename</th>
                            <th>Depth</th>
                            <th>Length</th>
                            <th>Width</th>
                            <th>Bags of Cement</th>
                        </tr>
                        <?php
                            $arrayOfFoundations = $homeController->getFoundations($userid);
                            foreach ($arrayOfFoundations as $foundation) {
                                Print "<tr>";
                                    Print "<td>".$foundation->sitenum."</td>";
                                    Print "<td>".$foundation->depth."</td>";
                                    Print "<td>".$foundation->length."</td>";
                                    Print "<td>".$foundation->width."</td>";
                                    Print "<td>".$foundation->bags."</td>";
                                    // Print "<td><a href='delete.php'>Delete</a></td>";
                                Print "</tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>