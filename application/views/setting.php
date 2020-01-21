<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 id="headtitle">
        Pengaturan Sistem
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Format Laporan</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Logo & Keterangan Site</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="pull-right">
                            <a href="#" class="btn btn-primary" id="preview">Preview</a>
                            <p>
                        </div>
                        <form method="post" id="format">
                            <input type="submit" class="btn btn-block btn-success" value="Save">
                            <h2 class="box-title">Format Header</h2>
                            <textarea id="headnote" name="head"><?= $laporan->head ?></textarea>
                            <h2 class="box-title">Format Body</h2>
                            <textarea id="bodynote" name="body"><?= $laporan->body ?></textarea>
                            <h2 class="box-title">Format Footer</h2>
                            <textarea id="footnote" name="foot"><?= $laporan->foot ?></textarea>
                            <input type="submit" class="btn btn-block btn-success" value="Save">
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Pengaturan Logo dan Keterangan Site</h3>
                            </div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" id="setting">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" name="logo" id="logo" class="form-control">
                                            <small>Logo ukuran 256 x 256px, jika ukuran lebih besar, maka akan disesuaikan</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Nama Site</label>
                                            <input type="text" name="site" id="site" class="form-control" placeholder="Nama Site" value="<?=$general->nama?>" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="logo">Kota</label>
                                            <input type="text" name="kota" id="kota" class="form-control" placeholder="Nama Kota" value="$general->kota?" required>
                                        </div> -->
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <img class="attachment-img form-control" src="<?=base_url('assets/images/').$general->logo?>" id="previewimg" style="width:256px;height:256px" alt="Image Preview">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>
</section>
<!-- /.content --> 