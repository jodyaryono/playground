<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/komponen/header.php") ?>

    <title>Silahkan login</title>

    <!-- Custom fonts for this template-->
    <?php $this->load->view("admin/komponen/javascript.php") ?>

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('css/sb-admin-2.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="assets/images/index.jpg" height="500" width="500">
                            </div>
                            <div class="col-lg-6">

                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di Playground!</h1>
                                    </div>
                                    <form class="form-signin" method="POST"
                                        action="<?php echo base_url() ?>index.php/login">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username">
                                            <?php echo form_error('username'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                            <?php echo form_error('password'); ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-block" name="btn-login" id="btn-login"
                                            type="submit">
                                            LOGIN</button>


                                        <a class="h4 text-black-500 mb-2">LSP Informatika</a>

                                </div>



</body>

</html>