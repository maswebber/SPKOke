<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">Preview Format Laporan</h4>
</div>
<div class="modal-body">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="printpa" style="margin-left: 1.5cm;margin-right: 1.5cm;">
                <?= $data->head ?>
                <hr style="border-top:3px double black;">
                <table width="100%">
                    <tr>
                        <td style="text-align:justify">
                            <?= $data->body ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <table width="75%" style="text-align: center" border="1">
                                    <tbody>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Infrastruktur</th>
                                            <th style="text-align: center">Ideal Positif</th>
                                            <th style="text-align: center">Ideal Negatif</th>
                                            <th style="text-align: center">Hasil Akhir</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Rumah Rakyat</td>
                                            <td>1,26</td>
                                            <td>3,16</td>
                                            <td>0,71</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jembatan</td>
                                            <td>2,37</td>
                                            <td>2,22</td>
                                            <td>0,48</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Taman Desa Sehat</td>
                                            <td>2,71</td>
                                            <td>1,68</td>
                                            <td>0,38</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Gedung Serbaguna</td>
                                            <td>2,36</td>
                                            <td>1,32</td>
                                            <td>0,36</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Trotoar</td>
                                            <td>2,79</td>
                                            <td>1,46</td>
                                            <td>0,34</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align:justify">
                            <?=$data->foot ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--End Advanced Tables -->
</div> 