<?php
require_once "json_reader.php";
?>
<section>
    <div class="row">
        <div class="col-4" id="table1">
            <table class="othertable" id="rent-table">
                <thead>
                    <tr>
                        <th>Aeg</th>
                        <th></th>
                        <th>Üürnik</th>
                        <th class="text-center">Riietusruum</th>
                        <th class="text-center">Spordiväljak</th>
                    </tr>
                </thead>
                <tbody id="rent-table-data">
                    <?php

                    for ($i = 0; $i < count($jsonArr); $i++) {
                        if ($i > 7) {
                            break;
                        }
                        echo "<tr>";
                        echo "<th> " . $jsonArr[$i]['rent']['court']['view']['time_from'] . " - " . $jsonArr[$i]['rent']['court']['view']['time_to'] . "</th>";
                        echo "<th><img src='https://playarena.space/sites/default/files/styles/customer-xs/public/assets/db/db-profile.png?itok=dvcOoYiW' style='width:50px;'></th>";
                        echo "<th> " . $jsonArr[$i]['title'] . "</th>";
                        
                        echo "<th class=\"text-center\"> ";
                        lockers_convert($jsonArr[$i]['rent']['lockers']['view']['title']);
                        echo " </th>";
                        echo "<th class=\"text-center\">";
                        court_convert($jsonArr[$i]['rent']['court']['view']['title'][0]);
                        echo "</th>";
                        echo "</tr>";
                    }

                    ?>

                </tbody>
            </table>
        </div>
        
        <div class="col-8 " id="table1" style="padding-left:50px;">
            <table class="othertable">
                <thead>
                    <tr>
                        <th>
                            <div id="player-container" class="player-container col-12"></div>
                            <script src="assets/js/app.js"></script>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section><!-- End Content Section -->