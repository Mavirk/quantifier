<div class="row justify-content-center">
    <div class="col-8">
        <div class="row justify-content-center p-5"> <h5>Concrete</h5></div>
        <table class="table table-striped" align="center" border= "1px" width="100%">
            <thead>
                <tr align="center" class="thead-dark">
                <th>Site</th>
                <th>42,5N (50kg) Bags</th>
                <th>Concrete Stone Agregate(m³)</th>
                <th>Building Sand(m³)</th>
                <th>Width(m)</th>
                <th>Length(m)</th>
                <th>Thickness(mm)</th>
                </tr>
            </thead>
            <?php
                $arrayOfSlabs = $homeController->getSlabs($siteId);
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


<div class="row justify-content-center">
    <div class="col-8">
        <div class="row justify-content-center p-5"> <h5>Plaster</h5></div>
        <table class="table table-striped" align="center" border= "1px" width="100%">
            <thead>
                <tr align="center" class="thead-dark">
                    <th>Site</th>
                    <th>42,5N (50kg) Bags</th>
                    <th>Plaster Sand(m³)</th>
                    <th>Width(m)</th>
                    <th>Length(m)</th>
                    <th>Thickness(mm)</th>
                </tr>
            </thead>
            <?php
                $arrayOfPlaster = $homeController->getPlaster($siteId);
                foreach ($arrayOfPlaster as $plaster) {
                    Print "<tr>";
                        Print "<td>".$plaster->sitenum."</td>";
                        Print "<td>".$plaster->bags."</td>";
                        Print "<td>".$plaster->sand."</td>";
                        Print "<td>".$plaster->width."</td>";
                        Print "<td>".$plaster->length."</td>";
                        Print "<td>".$plaster->depth."</td>";
                        // Print "<td><a href='delete.php'>Delete</a></td>";
                    Print "</tr>";
                }
            ?>
        </table>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="row justify-content-center p-5"> <h5>Screed</h5></div>
        <table class="table table-striped" align="center" border= "1px" width="100%">
            <thead>
                <tr align="center" class="thead-dark">
                    <th>Site</th>
                    <th>42,5N (50kg) Bags</th>
                    <th>Sand(m³)</th>
                    <th>Width(m)</th>
                    <th>Length(m)</th>
                    <th>Thickness(mm)</th>
                </tr>
            </thead>
        <?php
            $arrayOfSlabs = $homeController->getScreed($siteId);
            foreach ($arrayOfSlabs as $slab) {
                Print "<tr>";
                    Print "<td>".$slab->sitenum."</td>";
                    Print "<td>".$slab->bags."</td>";
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