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
                    <h1>Order</h1>
                    <h4>Order Transaksi</h4>
                    <form action="<?php echo base_url() ?>orders/simpan" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_order" id="id_order" value="<?= $id_order ?? 0 ?>">
                        <div class="form-group">
                            <label for="produk">Tanggal:</label>
                            <input type="date" class="form-control" id="tgl_order" name="tgl_order" required>
                        </div>
                        <div class="form-group">
                            <label for="produk">Customer</label>
                            <input type="text" class="form-control" name="customer" id="customer" required>
                        </div>
                        <br>
                        <?php if ($id_order == 0): ?>
                            <button type="submit" class="btn btn-primary">Simpan/Insert Detail</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary">Simpan/Edit Detail</button>
                        <?php endif; ?>
                    </form>
                </div>


                <div class="col-sm-8 text-left">

                </div>
                <!-- /.content-wrapper -->
            </div>
            <?php $this->load->view("admin/komponen/footer.php") ?>
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

            <script>
                <?php if ($id_order == 0): ?>
                    //default tgl_order = today
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    $('#tgl_order').val(yyyy + '-' + mm + '-' + dd);
                <?php else: ?>
                    //get the data
                    $('#tgl_order').val('<?= $header['tgl_order'] ?>');
                    $('#customer').val('<?= $header['customer'] ?>');
                <?php endif; ?>
            </script>
</body>

</html>