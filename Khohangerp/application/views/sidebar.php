 <!-- MENU SIDEBAR-->
 <aside class="menu-sidebar d-none d-lg-block">
    <div class="logo" style="background: white;">
        <a href="<?= base_url() ?>User/Trangchu">
            <img style="height: 80px; width: 200px;" 
            src="<?= base_url() ?>assets/images/icon/UTT.jpg" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow" href="<?= base_url() ?>User/toMain">
                        <i class="fa fa-home"></i>Trang chủ
                    </a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url() ?>Nhacungcap/">
                        <i class="fa fa-female"></i>Quản lý nhà cung cấp
                    </a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url() ?>Khachhang/">
                        <i class="fa fa-user"></i>Quản lý khách hàng
                    </a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url() ?>Cat/">
                     <i class="fa fa-bars"></i>Quản lý danh mục
                 </a>
             </li>
             <li>
                <a class="js-arrow" href="<?= base_url() ?>Item/">
                   <i class="fas fa-cube"></i>Quản lý mặt hàng
               </a>
           </li>
           <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fa fa-tags"></i>Quản lý nhập xuất</a>
                <ul class="list-unstyled navbar__sub-list js-sub-list"><li>
                    <a href="<?= base_url() ?>Nhapkho">Nhập kho</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>Xuatkho">Xuất kho</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="js-arrow" href="<?= base_url() ?>User/toList_userview">
                <i class="fas fa-users"></i>Quản lý người dùng
            </a>
        </li>
    </ul>
</nav>
</div>
</aside>
<!-- END MENU SIDEBAR-->
