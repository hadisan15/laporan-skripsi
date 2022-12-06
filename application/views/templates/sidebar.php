    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #108bb5;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2 mb-1" href="http://instagram.com/tourdeloksado" target="_blank">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo-tdl22.png'); ?>" alt="" style="width: 80px; height: 80px;">
          <!-- <i class="fas fa-code"></i> -->
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Query Menu -->
      <?php
      $role_id = $this->session->userdata('role_id');
      $queryMenu = "SELECT `user_menu`.`id`,`menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id 
                    ORDER BY `user_menu`.`menu` ASC
                    ";
      $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- Looping Menu -->
      <?php foreach ($menu as $m) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          <?= $m['menu']; ?>
        </div>

        <!-- Looping Sub Menu -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * 
                          FROM `user_sub_menu` JOIN `user_menu`
                          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                          AND `user_sub_menu`.`is_active` = 1
          ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
          <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon']; ?>"></i>
              <span><?= $sm['title']; ?></span>
            </a>
            </li>
          <?php endforeach; ?>
          <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->