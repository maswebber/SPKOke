<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 id="headtitle">
    Ranking Hasil Perhitungan
  </h1>
  <p>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="perid2">Pilih Periode</label>
                <select class="form-control" id="perid2">
                    <?php
                        foreach ($listperiod as $key) {
                            ?>
                                <option value="<?=$key->id_tahun?>">
                                    <?php
                                        echo date('Y/m',strtotime($key->tgl_mulai)).' s/d '.date('Y/m',strtotime($key->tgl_selesai))
                                    ?>
                                </option>
                            <?php
                        }
                    ?>
                </select>
                <br>
                <button type="submit" id="carper2" class="btn btn-info btn-block">Cari</button>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
  </p>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <p id="ganti">
                
            </p>
        </div>
    </div>
</section>
<!-- /.content -->