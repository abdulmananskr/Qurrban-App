<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0"> <i class="fas fa-duotone fa-mosque"></i></div>
        <div class="sidebar-brand-text mx-3">Qurban App </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Query Menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu =  "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu`JOIN  `user_access_menu`                  
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>


    <!-- looping menu -->
    <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
        <?= $m['menu']; ?>
    </div>
    </li>
    <!-- sub menu sesuai menu -->
    <?php
        $menuId = $m['id'];
        $querysubMenu = "SELECT *
                    FROM `user_sub_menu` JOIN  `user_menu`                  
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    WHERE `user_sub_menu`.`menu_id` = $menuId";
        $subMenu = $this->db->query($querysubMenu)->result_array();
        ?>
    <?php foreach ($subMenu as $sm) : ?>
    <?php if ($title == $sm['title']) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
            <i class="<?= $sm['icon']; ?>"></i>
            <span><?= $sm['title']; ?></span></a>
    </li>
    </li>
    <?php endforeach; ?>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php endforeach; ?>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('autentifikasi/logout'); ?>">
            <i class="fas fa-fw fa-solid fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

</ul>
<!-- End of Sidebar -->