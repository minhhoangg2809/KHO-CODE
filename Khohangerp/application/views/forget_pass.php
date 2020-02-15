
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Đăng nhập</title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url() ?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url() ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url() ?>assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="<?= base_url() ?>User/">
                                <img src="<?= base_url() ?>assets/images/icon/UTT.jpg" alt="UTT">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?= base_url() ?>User/forgetpass" method="post">
                                <div class="row">
                                    <fieldset class="form-group">
                                        <?php if ($this->session->flashdata('ER')): ?>
                                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                <span class="badge badge-pill badge-danger">Error</span>
                                                <?php echo($this->session->flashdata('ER')) ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        <?php endif ?>

                                        <?php if ($this->session->flashdata('SU')): ?>
                                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                <span class="badge badge-pill badge-successr">Success</span>
                                                <?php echo($this->session->flashdata('SU')) ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        <?php endif ?>

                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" 
                                    placeholder="Nhập e-mail">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url() ?>assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?= base_url() ?>assets/vendor/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>

</html>
<!-- end document-->