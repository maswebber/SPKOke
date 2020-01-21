<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
  <h4 class="modal-title">Add User</h4>
</div>
<div class="modal-body">
  <div class="box-body">
    <form id="addus" class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" name="usn" class="form-control" autocomplete="off" id="username" placeholder="Masukan username (6-32 Karakter)" minlength="6" maxlength="32" required>
        </div>
      </div>
      <div class="form-group">
        <label for="hak" class="col-sm-2 control-label">Hak Akses</label>
        <div class="col-sm-10">
          <select name="role" id="hak" class="form-control">
            <?php
              $role=array('OPERATOR');
              foreach ($role as $key=>$value) {
                  ?>
                  <option value="<?=$value?>"><?=$value?></option>
                <?php
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
            <img class="attachment-img form-control" id="priv" style="width:128px;height:128px" alt="Image Preview">
        </div>
      </div>
      <div class="form-group">
        <label for="stat" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <select name="status" id="stat" class="form-control">
            <?php
              $role=array('Non-Aktif','Aktif');
              foreach ($role as $key=>$value) {
                  ?>
                  <option value="<?=$key?>"><?=$value?></option>
                <?php
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="pass1" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" autocomplete="off" minlength="8" maxlength="32" name="pwd" class="form-control" id="pass1" placeholder="Masukan Password (8-32 Karakter)">
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary pull-right" id="addusn" value="Tambah Data">
      </div>
    </form>
  </div>
</div>