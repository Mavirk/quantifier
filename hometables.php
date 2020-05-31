<div class="row justify-content-center">
    <div class="col-8">
        <div class="row justify-content-center"> <h5>Concrete</h5></div>
        <table class="table" align="center" border= "1px" width="100%">
            <tr align="center">
                <th>Site</th>
                <th>Width(m)</th>
                <th>Length(m)</th>
                <th>Depth(mm)</th>
                <th>42,5N (50kg) Bags</th>
            </tr>
            <?php
                $arrayOfSlabs = $homeController->getSlabs($siteId);
                foreach ($arrayOfSlabs as $slab) {
                    Print "<tr>";
                        Print "<td>".$slab->sitenum."</td>";
                        Print "<td>".$slab->depth."</td>";
                        Print "<td>".$slab->length."</td>";
                        Print "<td>".$slab->width."</td>";
                        Print "<td>".$slab->bags."</td>";
                    Print "</tr>";
                }
            ?>
        </table>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="row justify-content-center"> <h5>Plaster</h5></div>
        <table class="table" align="center" border= "1px" width="100%">
            <tr align="center">
                <th>Site</th>
                <th>Width(m)</th>
                <th>Length(m)</th>
                <th>Depth(mm)</th>
                <th>42,5N (50kg) Bags</th>
            </tr>
            <?php
                $arrayOfSlabs = $homeController->getPlaster($siteId);
                foreach ($arrayOfSlabs as $slab) {
                    Print "<tr>";
                        Print "<td>".$slab->sitenum."</td>";
                        Print "<td>".$slab->depth."</td>";
                        Print "<td>".$slab->length."</td>";
                        Print "<td>".$slab->width."</td>";
                        Print "<td>".$slab->bags."</td>";
                    Print "</tr>";
                }
            ?>
        </table>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="row justify-content-center"> <h5>Screed</h5></div>
        <table class="table" align="center" border= "1px" width="100%">
            <tr align="center">
                <th>Site</th>
                <th>Width(m)</th>
                <th>Length(m)</th>
                <th>Depth(mm)</th>
                <th>42,5N (50kg) Bags</th>
            </tr>
            <?php
                $arrayOfSlabs = $homeController->getScreed($siteId);
                foreach ($arrayOfSlabs as $slab) {
                    Print "<tr>";
                        Print "<td>".$slab->sitenum."</td>";
                        Print "<td>".$slab->depth."</td>";
                        Print "<td>".$slab->length."</td>";
                        Print "<td>".$slab->width."</td>";
                        Print "<td>".$slab->bags."</td>";
                    Print "</tr>";
                }
            ?>
        </table>
    </div>
</div>