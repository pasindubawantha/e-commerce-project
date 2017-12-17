<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">ECommerce</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('Customer_main/index'); ?>">Home</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="<?php echo site_url('Customer_main/registration'); ?>">Registration</a></li>
            <li><a href="#">Single</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo site_url('Customer_main/login'); ?>">Login</a></li>
            <li><a href="<?php echo site_url('Customer_main/logout'); ?>">LogOut</a></li>
            <?php if(isset($this->session->customer)) { ?>
            <li><a href="#"><?php echo $this->session->customer; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</nav>
