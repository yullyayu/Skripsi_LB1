<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Edit Data Puskesmas 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <form class="form-horizontal" action="<?php echo site_url('dinkes/editPuskesmas'); ?>" method="post">
            <?php foreach ($editPuskesmas as $ep) { ?>    
                <div class="box-body">
                    <div class="form-group">
                    <label for="kd_puskesmas" class="col-sm-2 control-label">Kode</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="kd_puskesmas" id="kd_puskesmas" placeholder="Kode Puskesmas" value="<?php echo $ep->kd_puskesmas?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_puskesmas" class="col-sm-2 control-label">Nama Puskesmas</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="Nama Puskesmas" value="<?php echo $ep->nama_puskesmas?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $ep->kecamatan?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="kota" class="col-sm-2 control-label">Kota</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $ep->kota?>">
                    </div>
                </div>
                <div class="box-footer">
                <!-- <button type="cancel" name="cancel" class="btn btn-success" href="">Cancel</button> -->
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
                </div>
            <?php } ?>
            </form>
        </div>
    </section>
</div>

