<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 id="headtitle">
    Ubah Password
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body" id="isikonten">
          <form id="gantipass" class="form-horizontal" method="POST">
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" for="usn">Username</label>
                <div class="col-sm-10">
                  <?php
                    $usn=$_SESSION['user'];
                    $id=$_SESSION['id'];
                  ?>
                  <input type="hidden" name="usnid" id="usern" value="<?=$id?>">
                  <input type="text" name="usn" value="<?=$usn?>" class="form-control" id="usn" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Password Lama</label>
                <div class="col-sm-10">
                  <input type="Password" name="pwordl" id="pwdl" class="form-control" placeholder="Password Lama" required>
                    <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Password Baru</label>
                <div class="col-sm-10">
                  <input type="Password" name="pwordb" id="pwdb" class="form-control" placeholder="Password Baru" required>
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <div class="col-sm-12" style="text-align: center;">
                    <input type="submit" class="btn btn-sm btn-primary btn-block" value="Simpan">
                      &nbsp;
                    <button type="reset" class="btn btn-sm btn-danger btn-block">Batal </button>
                </div>
            </div>
            <div style="margin-top: 20px;"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->