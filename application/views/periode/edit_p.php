<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
  <h4 class="modal-title">Edit Periode</h4>
</div>
<div class="modal-body">
  <div class="box-body">
    <form id="editp" class="form-horizontal" method="post">
      <input type="hidden" name="idtahun" class="form-control" id="idper" value="<?=$dataperiode->id_tahun?>" readonly>
      <div class="form-group">
        <label for="awal" class="col-sm-2 control-label">Tanggal Awal</label>
        <div class="col-sm-10">
          <input type="date" name="tglawal" class="form-control" id="awal" value="<?=$dataperiode->tgl_mulai?>">
        </div>
      </div>
      <div class="form-group">
        <label for="akhir" class="col-sm-2 control-label">Tanggal Akhir</label>
        <div class="col-sm-10">
          <input type="date" name="tglakhir" class="form-control" id="akhir" value="<?=$dataperiode->tgl_selesai?>">
        </div>
      </div>
      <div class="form-group">
        <label for="stat" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <select name="status" id="stat" class="form-control">
            <?php
              $role=array('Non-Aktif','Aktif');
              foreach ($role as $key=>$value) {
                if($key==$dataperiode->status){
                  ?>
                  <option value="<?=$key?>" selected><?=$value?></option>
                <?php
                }
                else{
                  ?>
                  <option value="<?=$key?>"><?=$value?></option>
                <?php
                }
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary pull-right" id="updateusn" value="Update Data">
      </div>
    </form>
  </div>
</div>