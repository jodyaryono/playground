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

                    <hr>

                    <h3>Data order</h3>
                    <p>
                        <a href="<?php echo base_url(); ?>orders/tambah"><button class="btn btn-primary">Tambah
                                Data</button></a>
                    </p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Tanggal</th>
                                <th>Customer</th>
                                <th width="200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($order->result_array() as $dp) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $dp['tgl_order']; ?></td>
                                <td><?php echo $dp['customer']; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>order/edit/<?php echo $dp['id_order']; ?>"
                                        title="Ubah"><button class="btn btn-info">Ubah</button></a>

                                    <a href="<?php echo base_url(); ?>order/hapus/<?php echo $dp['id_order']; ?>"
                                        onClick="return confirm('Anda yakin..???');" title="Hapus"><button
                                            class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>

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