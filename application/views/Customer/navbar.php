
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                        <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                        <li><a href="<?php echo site_url('Customer_main/registration'); ?>"><i class="fa fa-user"></i> Registration</a></li>

                        <?php if(isset($this->session->customer)) { ?>
                            <li><a href="<?php echo site_url('Customer_main/logout'); ?>"><i class="fa fa-user"></i> LogOut</a></li>
                            <li style="float: right;"><a href="#"><i class="fa fa-user"></i> <?php echo $this->session->customer; ?></a></li>
                        <?php }
                        else { ?>
                        <li><a href="<?php echo site_url('Customer_main/login'); ?>"><i class="fa fa-user"></i> Login</a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->


<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="index.html">Sandhoora<span>Holdings</span></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="<?php echo site_url('Customer_main/cart'); ?>">Cart - <span class="cart-amunt" id="cart_total_display"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count">*</span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->


<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url('Customer_main/index'); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('Customer_main/cart'); ?>">Cart</a></li>
                    <li><a href="#">Checkout</a></li>
                    <li><a href="#">Category</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->




