<?php #### RENDER MENU LEVEL 3 ####
function renderMenuLev3($children)
{ ?>
    <?php if (!empty($children)): ?>
    <div class="dropdown-menu dropdown-menu-small">
        <?php foreach ($children as $item): ?>
            <?php
            $item_class = array('dropdown-item');
            if(menu_is_active($item['url'])){
                $item_class[] = 'active';
            }
            ?>
            <a class="<?php echo implode(" ", $item_class) ?>"
               href="<?php echo isset($item['url']) ? base_url($item['url']) : '#'; ?>"
               id="<?php echo url_title($item['label']) ?>"><?php echo $item['label']; ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php } ?>

<?php #### RENDER MENU LEVEL 2 ####

function renderMenuLev2($children)
{
    ?>
    <?php if (!empty($children)): ?>
    <ul class="nav nav--no-borders flex-column">
        <?php foreach ($children as $item):
            $nav_item_class = array('nav-item');
            $nav_link_class = array('nav-link');

            if($item_has_children = !empty($item['children'])){
                $nav_item_class[] = 'dropdown';
                $nav_link_class[] = 'dropdown-toggle';
            }
            if(menu_is_active($item['url'])){
                $nav_item_class[] = 'show';
                $nav_link_class[] = 'active';
            }
        ?>
            <li class="<?php echo implode(" ", $nav_item_class) ?>">
                <a class="<?php echo implode(" ", $nav_link_class) ?>"
                   href="<?php echo isset($item['url']) ? base_url($item['url']) : '#'; ?>"
                   id="<?php echo url_title($item['label']) ?>"
                    <?php if ($item_has_children): ?>
                        data-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                    <?php endif; ?>>
                    <?php if (isset($item['icon'])) : ?>
                        <i class="material-icons"><?php if (isset($item['icon'])) echo $item['icon']; ?></i>
                    <?php endif; ?>
                    <span><?php echo $item['label']; ?></span>
                </a>
                <?php if ($item_has_children): ?>
                    <?php renderMenuLev3($item['children']) ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php } ?>

<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="<?php echo base_url(); ?>" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <?php echo assets_img('hahalolo-logo.png', array('class' => 'd-inline-block align-top mr-1', 'id' => 'main-logo', 'style'=>'max-height: 25px;')); ?>
                    <span class="d-none d-md-inline ml-1"></span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons"></i>
            </a>
        </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                   aria-label="Search"></div>
    </form>
    <div class="nav-wrapper">
        <?php if ($sidebarMenu = $this->config->item('sidebar_menu')): ?>
            <?php /* MENU LEV 1 (GROUP) */
            foreach ($sidebarMenu as $item):  $item_has_children = !empty($item['children']); ?>
                <h6 class="main-sidebar__nav-title"
                    id="<?php echo url_title($item['label']) ?>"><?php echo $item['label']; ?></h6>
                <?php if ($item_has_children): ?>
                        <?php renderMenuLev2($item['children']) ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</aside>