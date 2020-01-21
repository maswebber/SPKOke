<!-- Advanced Tables -->
<div class="text-left">
    <button class="btn btn-lg btn-success" id="printlap"> 
        <span class="fa fa-print"></span>
        &nbsp
        Print
    </button>
</div>
<br>
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
        Ranking Hasil Hitung
    </div>
    <div class="panel-body">
        <div id="printpa" style="margin-left: 1.5cm;margin-right: 1.5cm;">
             <?=$data->head?>
            <hr style="border-top:3px double black;">
            <table width="100%" >
                <tr>
                    <td>
                        <h5 style="text-align:center">
                            PERIODE <?=date('Y/m/d',strtotime($period->tgl_mulai)).' s/d '.date('Y/m/d',strtotime($period->tgl_selesai))?>
                            <br>
                            <br>
                            <br>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:justify">
                        KALIMAT PENGANTAR ATAU PENJELASAN PADA LAPORAN
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                        <table width="75%" style="text-align: center" border="1">
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Infrastruktur</th>
                                    <th style="text-align: center">Ideal Positif</th>
                                    <th style="text-align: center">Ideal Negatif</th>
                                    <th style="text-align: center">Hasil Akhir</th>
                                </tr>
                                <?php
                                    $op=1;
                                    arsort($rcd);
                                    // arsort($jaridl);
                                    
                                    // print_r(json_encode($rcd));
                                    usort($jaridl, function($a, $b) {
                                        return $b['rc'] <=> $a['rc'];
                                    });
                                    // print_r(json_encode($jaridl));
                                    foreach ($jaridl as $key){
                                        ?>
                                    <tr>
                                        <td><?=$op?></td>
                                        <td><?=$key['keterangan']?></td>
                                        <td><?=number_format((float)$key['spos'], 2, ',', '')?></td>
                                        <td><?=number_format((float)$key['sneg'], 2, ',', '')?></td>
                                        <td><?=number_format((float)$key['rc'], 2, ',', '')?></td>
                                    </tr>
                                        <?php
                                        $op++;
                                    }
                                    $jsondata['ranking']=$rcd;
                                    // $testjson=json_encode($jsondata);
                                    // echo $testjson;
                                ?>
                            </table> 
                        </center>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td style="text-align:justify">
                        <?= $data->foot?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!--End Advanced Tables -->