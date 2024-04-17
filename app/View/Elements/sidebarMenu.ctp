
<div class="page-sidebar-wrapper" >
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">	
    <!-- BEGIN SIDEBAR MENU -->        
    <ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" >
        <li class="sidebar-toggler-wrapper">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler">
                  <i class="fa fa-bars 2x" aria-hidden="true"></i>
            </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <?php
            // debug($appMenuLinks);exit;
            if($isLoggedIn) :
                echo $this->Bs->buildMenu($appMenuLinks, array('parentLiClass'=>'', 'parentChildUlClass'=>'sub-menu'));
            endif;
        ?>
    </ul>
    <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>