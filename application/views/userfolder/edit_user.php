<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
  <h4 class="modal-title">Edit User</h4>
</div>
<div class="modal-body">
  <div class="box-body">
    <form id="editus" class="form-horizontal" method="post">
      <input type="hidden" name="iduser" class="form-control" id="idus" value="<?=$datauser->id_ngota?>" readonly>
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" name="usn" class="form-control" id="username" value="<?=$datauser->usn?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="hak" class="col-sm-2 control-label">Hak Akses</label>
        <div class="col-sm-10">
          <?php
            if($datauser->id_ngota==1){
              $cek='readonly';
              $role=array('ADMIN');
            }
            else{
              $cek='';
              $role=array('OPERATOR');
            }
          ?>
          <select name="role" id="hak" class="form-control" <?=$cek?>>
            <?php
              foreach ($role as $key=>$value) {
                if($value==$datauser->role){
                  ?>
                  <option value="<?=$value?>" selected><?=$value?></option>
                <?php
                }
                else{
                  ?>
                  <option value="<?=$value?>"><?=$value?></option>
                <?php
                }
                
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group col-md-12">
        <div class="col-md-6">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <div class="col-md-6">
            <img class="attachment-img form-control" id="priv" src="<?=base_url("assets/images/".$datauser->foto)?>" style="width:128px;height:128px" alt="Image Preview">
        </div>
      </div>
      <div class="form-group">
        <label for="stat" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <select name="status" id="stat" class="form-control" <?=$cek?>>
            <?php
              $role=array('Non-Aktif','Aktif');
              foreach ($role as $key=>$value) {
                if($key==$datauser->status){
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
        <label for="pass1" class="col-sm-2 control-label">Password Lama</label>
        <div class="col-sm-10">
          <input type="password" name="pwd1" class="form-control" id="pass1">
          <small>* Jika tidak mengganti password kosongkan</small>
        </div>
      </div>
      <div class="form-group">
        <label for="pass2" class="col-sm-2 control-label">Password Baru</label>
        <div class="col-sm-10">
          <input type="password" name="pwd2" minlength="8" maxlength="32" class="form-control" id="pass2">
          <small>* Jika tidak mengganti password kosongkan</small>
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary pull-right" id="updateusn" value="Update Data">
      </div>
    </form>
  </div>
</div>