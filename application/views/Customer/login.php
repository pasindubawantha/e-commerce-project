<div class="single-product-area">
<!--    <div class="zigzag-bottom"></div>-->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">

                    <div class="woocommerce-info single-sidebar" style="font-size: medium;">

                        <h3>Login</h3>

                        <?php echo validation_errors(); ?>

                        <?php echo form_open('Customer_main/login','autocomplete = "on"'); ?>

                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" style="width: 50%;padding: 5px;">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" style="width: 50%;padding: 5px;">
                        </div>

                        <button type="submit" class="button" name="submit">Login</button>

                        <?php echo form_close(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
