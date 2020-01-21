<?=form_open('home/plkr',array('class'=>"form-horizontal"))?>
    <div class="modal-header">
        <h4 class="modal-title">Tambah Kriteria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="server_name" class="control-label col-lg-4">Kode Kriteria</label>

            <div class="col-lg-8">
                <?=
                        form_input(array(
                            'id'=>'server_name',
                            'name'=>'codename',
                            'class'=>'form-control',
                            'required'=>'enable',
                            'placeholder'=>"Masukan Kode Kriteria"
                          ));
                    ?>
            </div>
        </div>
        <div class="form-group">
            <label for="server_name" class="control-label col-lg-4">Keterangan Kriteria</label>

            <div class="col-lg-8">
                <?=
                        form_input(array(
                            'id'=>'server_name',
                            'name'=>'ketkri',
                            'class'=>'form-control',
                            'required'=>'enable',
                            'placeholder'=>"Masukan Keterangan Kriteria"
                          ));
                    ?>
            </div>
        </div>
        <div class="form-group">
            <label for="server_name" class="control-label col-lg-4">Bobot</label>

            <div class="col-lg-8">
                <?=
                        form_input(array(
                            'id'=>'server_name',
                            'name'=>'bobot',
                            'class'=>'form-control',
                            'required'=>'enable',
                            'placeholder'=>"Masukan Bobot",
                            'step'=>"0.1",
                            'type'=>"number"
                          ));
                    ?>
            </div>
        </div>
        <div class="form-group">
            <label for="server_name" class="control-label col-lg-4">Pilih Atribut</label>
            <div class="col-lg-8">
                <?php 
                    $options=array('benefit'=>'Benefit','cost'=>'Cost');
                    echo form_dropdown('att', $options,'Benefit','class="form-control" id="server_name"');
                ?>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="submit" name="ok" class="btn btn-warning" value="Konfirmasi">
    </div>
<?=form_close()?>