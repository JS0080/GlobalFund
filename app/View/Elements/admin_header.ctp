<li class="dropdown user">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

        <?php //echo $this->html->image('/admin_assets/img/avatar1_small.jpg'); ?>
        <span class="username">
            Admin	 <?php //echo  $_SESSION['Auth']['User']['first_name']." ".$_SESSION['Auth']['User']['last_name'];  ?>
        </span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu">



        <li>
            <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'logout')); ?>">
                <i class="fa fa-key"></i> Log Out
            </a>
        </li>
    </ul>
</li>