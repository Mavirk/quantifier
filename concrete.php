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
                $concreteController = new ConcreteController();
                $homeController = new HomeController();
                $concreteController->addFoundation($_SESSION['userid']);
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
                <div class="row justify-content-center p-5"> 
                    <h2 align="center">Concrete Slabs</h2>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-sm-9">
                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <label for ="sitenum">Site Number</label>
                                    <select class="form-control" name="sitenum" required>
                                        <?php
                                        $sites = $homeController->getSites($userid);
                                        foreach ($sites as $site) {
                                            Print "<option>".$site->sitenum."</option>";
                                        }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for ="width">Width (m): </label>
                                <input type="text" class="form-control" id="width" name="width" required/>
                            </div>
                            <div class="form-group">
                                <label for ="length">Length (m): </label>
                                <input type="text" class="form-control" id="length" name="length" required/>
                            </div>
                            <div class="form-group">
                                <label for ="depth">Depth (mm): </label>
                                <input type="text" class="form-control" id="depth" name="depth" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addfoundation" value="Add"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-9">
                        <table class="table table-striped" align="center" border= "1px" width="100%">
                            <thead >
                                <tr align="center" class="thead-dark">
                                    <th>Site</th>
                                    <th>42,5N Cement (50kg Bags)</th>
                                    <th>Concrete Stone Aggregate (m³)</th>
                                    <th>Sand (m³)</th>
                                    <th>Width (m)</th>
                                    <th>Length (m)</th>
                                    <th>Thickness (mm)</th>
                                </tr>
                            </thead>
                            <?php
                                $arrayOfSlabs = $concreteController->getFoundations($userid);
                                foreach ($arrayOfSlabs as $slab) {
                                    Print "<tr>";
                                        Print "<td>".$slab->sitenum."</td>";
                                        Print "<td>".$slab->bags."</td>";
                                        Print "<td>".$slab->stone."</td>";
                                        Print "<td>".$slab->sand."</td>";
                                        Print "<td>".$slab->width."</td>";
                                        Print "<td>".$slab->length."</td>";
                                        Print "<td>".$slab->depth."</td>";
                                    Print "</tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>