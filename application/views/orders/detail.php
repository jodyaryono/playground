<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/komponen/header.php") ?>
</head>


<body id="page-top">
    <?php $this->load->view("admin/komponen/javascript.php") ?>
    <?php $this->load->view("admin/komponen/navbar.php") ?>
    <div id="wrapper">
        <?php $this->load->view("admin/komponen/sidebar.php") ?>
        <div class="modal fade" id="entryModal" tabindex="-1" role="dialog" aria-labelledby="entryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entryModalLabel">Tambah Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>orders/tambah_edit_detail" method="post">
                            <input type="hidden" name="id_order" value="<?php echo $header['id_order']; ?>">
                            <div class="form-group">
                                <label for="produk">Produk:</label>
                                <select class="form-control" id="produk" name="produk" required>
                                    <?php echo $opsi_produk; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="number" class="form-control" id="harga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Qty:</label>
                                <input type="number" class="form-control" id="qty" name="qty" value="1" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Total</label>
                                <p class="form-control" id="total"></p>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/komponen/breadcrumb.php") ?>
                <div class="col-sm-8 text-left">
                    <div class="form-group">
                        <label for="produk">Tanggal:</label>
                        <p class="form-control">
                            <?= $header['tgl_order'] ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="produk">Customer:</label>
                        <p class="form-control">
                            <?= $header['customer'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 text-left">
                    <p>
                        <a href="<?php echo base_url(); ?>orders/tambah"><button class="btn btn-primary">Order
                                Baru</button></a>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#entryModal">Tambah
                            Detail</button>
                    </p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Produk</th>
                                <th>harga Asli</th>
                                <th>harga Transaksi</th>
                                <th>qty</th>
                                <th>total</th>
                                <th width="200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total = 0;
                            foreach ($detail as $dp) {
                                $total += $dp['harga'] * $dp['qty'];
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $dp['nama_produk']; ?></td>
                                <td><?php echo number_format($dp['harga'], 0); ?></td>
                                <td><?php echo number_format($dp['harga_aktual'], 0); ?></td>
                                <td><?php echo $dp['qty']; ?></td>
                                <td><?php echo number_format($dp['harga_aktual'] * $dp['qty'], 0); ?></td>
                                <td>

                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-id="<?php echo $dp['id_order_detail']; ?>"
                                        data-id_produk="<?php echo $dp['id_produk']; ?>"
                                        data-qty="<?php echo $dp['qty']; ?>"
                                        data-harga="<?php echo $dp['harga_aktual']; ?>"
                                        data-target=" #entryModal">Edit</button>
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
                        <tfoot>
                            <tr>
                                <td colspan="5">Total</td>
                                <td><?php echo number_format($total, 0); ?></td>
                            </tr>
                        </tfoot>
                    </table>

                    <?php $this->load->view("admin/komponen/footer.php") ?>

                </div>
                <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->
            <script>
            $(document).ready(function() {
                $('#entryModal').on('show.bs.modal', function(e) {

                    //check if data-id attribute exists
                    var id = $(e.relatedTarget).data('id');
                    var id_produk = $(e.relatedTarget).data('id_produk');
                    var qty = $(e.relatedTarget).data('qty');
                    var harga = $(e.relatedTarget).data('harga');

                    console.log(id);
                    //check if id defined then edit
                    if (id !== undefined) {
                        $('#entryModalLabel').text('Edit Detail');
                        $('#produk').val(id_produk);
                        $('#qty').val(qty);
                        $('#harga').val(harga);
                        $('#total').text(qty * harga);
                    } else {
                        //reset form
                        $('#produk').val('');
                        $('#harga').val('');
                        $('#qty').val('1');
                        $('#total').text('');
                    }
                });
                $('#produk').change(function() {
                    var selectedProduct = $(this).find('option:selected');
                    var harga = selectedProduct.data(
                        'harga'
                    ); // Ensure 'harga' data attribute exists on the option element
                    $('#harga').val(harga);
                    $('#qty').trigger('change');
                });
                $('#qty').change(function() {
                    var qty = $(this).val();
                    var harga = $('#harga').val();
                    var total = qty * harga;
                    $('#total').text(total);
                });
                $('#harga').change(function() {
                    $('#qty').trigger('change');
                });
            });
            </script>
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