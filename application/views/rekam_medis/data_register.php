  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Register
        <small>Rekam Medis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Register Rekam Medis</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th scoop="col" rowspan="2">No</th>
                  <th scoop="col" rowspan="2">No Register</th>
                  <th scoop="col" rowspan="2">Nama</th>
                  <th scoop="col" rowspan="2">Alamat</th>
                  <th scoop="col" rowspan="2">Kode Penyakit</th>
                  <th scoop="col" colspan="2">Umur</th>
                  <th scoop="col" colspan="3">Dalam Wilayah</th>
                  <th scoop="col" colspan="3">Luar Wilayah</th>
                  <th scoop="col" colspan="2">Action</th>
                </tr>
                <tr>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">Baru</th>
                    <th scope="col">Lama</th>
                    <th scope="col">KKL</th>
                    <th scope="col">Baru</th>
                    <th scope="col">Lama</th>
                    <th scope="col">KKL</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no =0; foreach ($rekam_medis as $key ): $no++;?> 
                  <tr class="odd gradeX">
                    <th scope="row"><?php echo $no?></th>
                    <th scope="row"><?php echo $key->no_register?></th>
                    <th scope="row"><?php echo $key->nama?></th>
                    <th scope="row"><?php echo $key->alamat?></th>
                    <th scope="row"><?php echo $key->kode_penyakit ?></th>
                    <?php $jk = $key->jenis_kelamin?>
                    <?php if ($jk == 'Perempuan') { ?>
                      <td><?php echo $key->umur ?></td>
                      <td>-</td>
                    <?php }else{ ?>
                      <td>-</td>
                      <td><?php echo $key->umur?></td>
                    <?php }  ?> 
                    <?php $dw = $key->dalam_wilayah?>
                    <?php if ($dw == 'Baru') { ?>
                      <td><?php echo $key->dalam_wilayah ?></td>
                      <td>-</td>
                      <td>-</td>
                    <?php }elseif($dw == 'Lama'){ ?>
                      <td>-</td>
                      <td><?php echo $key->dalam_wilayah?></td>
                      <td>-</td>
                    <?php }else { ?>
                      <td>-</td>
                      <td>-</td>
                      <td><?php echo $key->dalam_wilayah?></td>
                    <?php }  ?>              
                    <?php $lw = $key->luar_wilayah?>
                    <?php if ($lw == 'Baru') { ?>
                      <td><?php echo $key->luar_wilayah ?></td>
                      <td>-</td>
                      <td>-</td>
                      <?php }elseif($lw == 'Lama'){ ?>
                      <td>-</td>
                      <td><?php echo $key->luar_wilayah?></td>
                      <td>-</td>
                    <?php }else { ?>
                      <td>-</td>
                      <td>-</td>
                      <td><?php echo $key->luar_wilayah?></td>
                    <?php }  ?>
                    <td><a class='btn btn-info btn-xs' href="<?php echo site_url('rekam_medis/editRM/'. $key->no_register);?>"><span class="fa fa-pencil" ></span></a></td>
                    <td><a class='btn btn-danger btn-xs' href="<?php echo site_url('rekam_medis/hapusRegister/'. $key->no_register);?>"><span class="fa fa-trash-o"></span></a></td>
                  </tr>
                    <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->