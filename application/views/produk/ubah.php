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
                    <h1>Halaman produk</h1>
                    <hr>
                    <h4>Ubah Data produk</h4>
                    <?php
          foreach ($produk->result_array() as $i):
            $id_produk = $i['id_produk'];
            $nama_produk = $i['nama_produk'];
            $id_kategori = $i['id_kategori'];
            $harga = $i['harga'];
            $foto = $i['foto'];
          ?>
                    <form action="<?php echo base_url() ?>produk/simpan_ubah" enctype="multipart/form-data"
                        method="post">
                        <div class="form-group">
                            <label for="produk">Nama produk:</label>
                            <input type="hidden" class="form-control" name="id_produk"
                                value="<?php echo $id_produk; ?>">
                            <input type="text" class="form-control" name="nama_produk" required
                                value="<?php echo $nama_produk; ?>">
                        </div>
                        <div class="form-group">
                            <label for="produk">Kategori:</label>
                            <select class="form-control" name="id_kategori" required="">
                                <option value="0">-Pilih Kategori-</option>
                                <?php
                  foreach ($kategori->result_array() as $mg) {
                    if ($id_kategori == $mg['id_kategori']) {
                  ?>
                                <option value="<?php echo $mg['id_kategori']; ?>" selected="selected">
                                    <?php echo $mg['kategori']; ?></option>
                                <?php
                    } else {
                    ?>
                                <option value="<?php echo $mg['id_kategori']; ?>"><?php echo $mg['kategori']; ?>
                                </option>
                                <?php
                    }
                  }
                  ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="produk">Harga:</label>
                            <input type="number" class="form-control" name="harga" required
                                value="<?php echo $harga; ?>">
                        </div>
                        <?php if ($foto): ?>
                        <img src="<?= $foto ?>" style="width:30%" alt="">
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="produk">File produk:</label>
                            <input type="file" class="form-control" name="userfile">
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                    <?php endforeach; ?>
                </div>
                <?php $this->load->view("admin/komponen/footer.php") ?>

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
                    <div class="modal-body">ANDA YAKIN INGIN KELUAR??</div>
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