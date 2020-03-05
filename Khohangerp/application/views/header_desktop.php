 <div class="page-container">

     <!-- HEADER DESKTOP-->
     <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="col-md-9"></div>
                    <div class="header-button">
                        <div class="noti-wrap">
                            <div class="noti__item js-item-menu">
                                <i class="zmdi zmdi-notifications"></i>
                                <span class="quantity" id="countItem" style="display: none;"></span>
                                <div class="notifi-dropdown js-dropdown" id="listNotification">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?= $_SESSION['user'] ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="<?= base_url() ?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?= $_SESSION['user'] ?></a>
                                        </h5>
                                        <span class="email"><?= $_SESSION['mail'] ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__footer">
                                        <a href="<?= base_url() ?>/User/logout">
                                            <i class="zmdi zmdi-power"></i>Đăng xuất</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<!-- HEADER DESKTOP-->