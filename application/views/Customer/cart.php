<script>
    function remove(e) {
        console.log(e);
        var row_id = e;
        if (confirm("Are you sure you want to remove this?")) {
            $.ajax({
                url: "<?php echo site_url('Cart_controller/cart_remove'); ?>",
                method: "POST",
                data: {item_id: row_id},
                success: function () {
                    alert("Product removed from Cart");
                }
            });
        }
        else {
            return false;
        }
    }
</script>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
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
                    <div class="woocommerce">
                        <h2 class="sidebar-title">Cart</h2>
                        <table cellspacing="0" class="shop_table cart">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price ($)</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($cart == null) { ?>
                                <tr>
                                    <td colspan="6">Cart is empty</td>
                                </tr>
                            <? } else {
                                foreach ($cart as $item) { ?>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <button title="Remove this item" class="btn btn-danger" id="remove<? echo $item->item_id; ?>" onclick="remove('<?= $item->item_id ?>')" > Remove </button>
                                        </td>

                                        <td class="product-thumbnail">
                                            <img src="<?php echo site_url('Main/image/item/' . $item->item_image); ?>">
                                        </td>

                                        <td class="product-name">
                                            <a href="<?php echo site_url('Customer_main/single/'.$item->item_id); ?>"><? echo $item->item_name; ?></a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount"><? echo $item->price ?></span>
                                        </td>

                                        <td class="product-quantity">
                                            <? echo $item->quantity; ?>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount"><? echo (int)$item->quantity * (float)$item->price ?></span>
                                        </td>
                                    </tr>
                                <? }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="">
                        <h2 class="sidebar-title">Cart Totals</h2>

                        <table cellspacing="0" class="shop_table cart">
                            <tbody>

                            <tr class="shipping">
                                <th>Shipping and Handling</th>
                                <td>Price ranges depending on delivery items and conditions</td>
                            </tr>

                            <tr class="order-total">
                                <th>Order Total</th>
                                <td><strong><span class="amount" id="cart_total_display_table"></span></strong> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function() {

    $('#cart_total_display').load("<?php echo site_url('Cart_controller/get_cart_total'); ?>");
    $('#cart_total_display_table').load("<?php echo site_url('Cart_controller/get_cart_total'); ?>");

});

</script>