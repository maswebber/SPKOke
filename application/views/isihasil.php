<!-- Advanced Tables -->
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Tabel Nilai Alternatif
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <?php 
                            foreach ($krit as $key) {
                                ?>
                                    <th>
                                        <?=$key->ketkri?>
                                    </th>
                                <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($nilaialter as $key2) {
                            ?>
                            <tr>
                                <td><?=$key2['no']?></td>
                                <td><?=$key2['keterangan']?></td>
                                <?php
                                    foreach ($key2['nilai'] as $key) {
                                        echo "<td>$key</td>";
                                    }
                                ?>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--End Advanced Tables -->
<!-- Advanced Tables -->
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
        Tabel Pembagi
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <th>Keterangan</th>
                    <?php 
                            foreach ($krit as $key) {
                                ?>
                                    <th>
                                        <?=$key->ketkri?>
                                    </th>
                                <?php
                            }
                        ?>
                </thead>
                <tr>
                        <td>Nilai Pembagi</td>
                        <?php
                        foreach ($cekpembagi as $key) {
                            echo "<td>".$key."</td>";
                        }
                        ?>
                    </tr>
            </table>
        </div>
    </div>
</div>
<!--End Advanced Tables -->
<!-- Advanced Tables -->
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
       Tabel Keputusan Ternormalisasi
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <?php 
                            foreach ($krit as $key) {
                                ?>
                                    <th>
                                        <?=$key->ketkri?>
                                    </th>
                                <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($tabkep as $key2) {
                            ?>
                            <tr>
                                <td><?=$key2['no']?></td>
                                <td><?=$key2['keterangan']?></td>
                                <?php
                                    foreach ($key2['nilai'] as $key) {
                                        echo "<td>$key</td>";
                                    }
                                ?>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--End Advanced Tables -->
<!-- Advanced Tables -->
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
        Tabel Keputusan Ternormalisasi dan Terbobot
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <?php 
                            foreach ($krit as $key) {
                                ?>
                                    <th>
                                        <?=$key->ketkri?>
                                    </th>
                                <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tabbot as $key) {
                        ?>
                        <tr>
                            <td><?=$key['no']?></td>
                            <td><?=$key['keterangan']?></td>
                            <?php
                                foreach ($key['nilai'] as $key) {
                                    echo "<td>$key</td>";
                                }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--End Advanced Tables -->
<!-- Advanced Tables -->
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
        Solusi Ideal Positif (A*) dan Negatif (A-)
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Solusi Ideal</th>
                        <?php 
                            foreach ($krit as $key) {
                                ?>
                                    <th>
                                        <?=$key->ketkri?>
                                    </th>
                                <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>A*</td>
                        <?php
                        foreach ($plus as $key => $value){
                            ?>
                            <td><?=$value?></td>
                            <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>A-</td>
                        <?php
                        foreach ($min as $key => $value){
                            ?>
                            <td><?=$value?></td>
                            <?php
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--End Advanced Tables -->
<!-- Advanced Tables -->
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
        Jarak Ideal Positif (S*) dan Negatif (S-)
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <th>Nilai S*</th>
                        <th>Nilai S-</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($jaridl as $key2) {
                    ?>
                    <tr>
                        <td><?=$key2['no']?></td>
                        <td><?=$key2['keterangan']?></td>
                        <td><?=$key2['spos']?></td>
                        <td><?=$key2['sneg']?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--End Advanced Tables -->
<!-- Advanced Tables -->
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
        Kedekatan Relatif (RC)
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <th>Nilai RC</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        $op=1;
                        arsort($rcd);
                        foreach ( $rcd as $key => $value){
                            ?>
                        <tr>
                            <td><?=$op?></td>
                            <td><?=$key?></td>
                            <td><?=$value?></td>
                        </tr>
                            <?php
                            $op++;
                        }
                        $jsondata['ranking']=$rcd;
                        // $testjson=json_encode($jsondata);
                        // echo $testjson;
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--End Advanced Tables -->