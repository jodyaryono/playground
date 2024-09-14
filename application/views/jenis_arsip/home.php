<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/komponen/header.php") ?>
</head>


<body id="page-top">

  <?php $this->load->view("admin/komponen/navbar.php") ?>
  <div id="wrapper">

    <?php $this->load->view("admin/komponen/sidebar.php") ?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <?php $this->load->view("admin/komponen/breadcrumb.php") ?>
        <div class="col-sm-8 text-left">

          <h2>Data Jenis Arsip</h2>
          <a href="<?php echo base_url(); ?>jenis_arsip/tambah"><button class="btn btn-primary">Tambah
              data</button></a>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>jenis_arsip</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($jenis_arsip->result_array() as $dp) {
              ?>

                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $dp['jenis_arsip']; ?></td>
                  <td><a href="<?php echo base_url(); ?>jenis_arsip/edit/<?php echo $dp['id_jenis_arsip']; ?>"
                      title="Ubah"><button class="btn btn-info">Ubah</button></a>

                    <a href="<?php echo base_url(); ?>jenis_arsip/hapus/<?php echo $dp['id_jenis_arsip']; ?>"
                      onClick="return confirm('Apakah Anda yakin akan di hapus?');"
                      title="Hapus"><button class="btn btn-danger">Hapus</button></a>
                  </td>
                </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.content-wrapper -->

      </div>
      <!-- /#wrapper -->


      <?php $this->load->view("admin/komponen/javascript.php") ?>
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">APAKAH ANDA YAKIN INGIN KELUAR??</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a href="<?php echo base_url() ?>index.php/dashboard/logout" type="submit"
                class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
          </div>
        </div>
      </div>

</body>

</html>