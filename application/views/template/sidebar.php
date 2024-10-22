<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Welcome</div>
</a>
 <!-- Divider -->
 <hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php if ($title == 'Dashboard'){echo"active";} ?>">  
  <a class="nav-link" href="<?= base_url('dashboard');?>">
    <i class="fas fa-fw fa-tachometer-alt" href=""></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

 

<!-- QUERY MENU -->
            <?php 
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

<!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>            
            <div class="sidebar-heading">
              <?= $m['menu']; ?>
            </div>


<!-- LOOPING SUB-MENU SESUAI MENU -->
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
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?= $sm['target'];?>" aria-expanded="true" aria-controls="collapseUtilities">
                      <i class="<?= $sm['icon']; ?>"></i>
                      <span><?= $sm['title'] ?></span>
                    </a>

<!-- LOOPING SUB-MENU-CATEGORY SESUAI SUB-MENU -->                  
                    <?php 
                        $category_id= $sm['category_id'];
                        $querysubMenuCategory =" SELECT * 
                                                FROM `user_sub_menu_category` JOIN `user_sub_menu`
                                                ON `user_sub_menu_category`.`category_id` = `user_sub_menu`.`category_id`
                                                WHERE `user_sub_menu_category`.`category_id`= $category_id
                                                AND `user_sub_menu_category`.`is_activee`=1
                                              ";
                        $subMenuCategory = $this->db->query($querysubMenuCategory)->result_array();
                    ?>
                             
                  <div id="<?= $sm['target'];?>" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">                   
                    <div class="bg-white py-2 collapse-inner rounded">                   
                      <?php foreach ($subMenuCategory as $smc): ?>                      
                      <a class="collapse-item" href="<?= base_url($smc['url']); ?>"> <?=$smc['category_title']; ?></a>
                      <?php endforeach; ?>
<!--END LOOPING SUB-MENU-CATEGORY -->
                    </div>
                  </div>
            </li>
            <?php endforeach; ?> 
<!--END LOOPING SUB-MENU -->                 
            <hr class="sidebar-divider mt-3">
            <?php endforeach; ?>  
<!--END LOOPING SUB-MENU -->           




            <li class="nav-item">
                    <a class="nav-link" href="<?base_url('auth/logout');?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End  of Sidebar --> 