<!-- Modal -->
<div class="modal fade" id="LoginModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login to your account</h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>

                <?php echo form_open('Customer_main/login','autocomplete = "on"'); ?>

                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email" style="width: 100%;padding: 5px;">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" style="width: 100%;padding: 5px;">
                </div>

                <button type="submit" class="button" name="submit">Login</button>

                <?php echo form_close(); ?>

            </div>
            <div class="modal-body">
                <h5>New here? <a href="<?php echo site_url('Customer_main/registration'); ?>">Register</a></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




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
                <div class="single-sidebar">
<!--                    <h2 class="sidebar-title">Products</h2>-->
<!--                    <div class="thubmnail-recent">-->
<!--                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">-->
<!--                        <h2><a href="">Sony Smart TV - 2015</a></h2>-->
<!--                        <div class="product-sidebar-price">-->
<!--                            <ins>$700.00</ins> <del>$800.00</del>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="thubmnail-recent">-->
<!--                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">-->
<!--                        <h2><a href="">Sony Smart TV - 2015</a></h2>-->
<!--                        <div class="product-sidebar-price">-->
<!--                            <ins>$700.00</ins> <del>$800.00</del>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="thubmnail-recent">-->
<!--                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">-->
<!--                        <h2><a href="">Sony Smart TV - 2015</a></h2>-->
<!--                        <div class="product-sidebar-price">-->
<!--                            <ins>$700.00</ins> <del>$800.00</del>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="thubmnail-recent">-->
<!--                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">-->
<!--                        <h2><a href="">Sony Smart TV - 2015</a></h2>-->
<!--                        <div class="product-sidebar-price">-->
<!--                            <ins>$700.00</ins> <del>$800.00</del>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>

                <div class="single-sidebar">
<!--                    <h2 class="sidebar-title">Recent Posts</h2>-->
                    <ul>
<!--                        <li><a href="">Sony Smart TV - 2015</a></li>-->
<!--                        <li><a href="">Sony Smart TV - 2015</a></li>-->
<!--                        <li><a href="">Sony Smart TV - 2015</a></li>-->
<!--                        <li><a href="">Sony Smart TV - 2015</a></li>-->
<!--                        <li><a href="">Sony Smart TV - 2015</a></li>-->
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
<!--                    <div class="product-breadcroumb">-->
<!--                        <a href="">Home</a>-->
<!--                        <a href="">Category Name</a>-->
<!--                        <a href="">Sony Smart TV - 2015</a>-->
<!--                    </div>-->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="<?php echo site_url('Main/image/item/'.$image); ?>" alt="">
                                </div>

<!--                                <div class="product-gallery">-->
<!--                                    <img src="img/product-thumb-1.jpg" alt="">-->
<!--                                    <img src="img/product-thumb-2.jpg" alt="">-->
<!--                                    <img src="img/product-thumb-3.jpg" alt="">-->
<!--                                    <img src="img/product-thumb-4.jpg" alt="">-->
<!--                                </div>-->
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><? echo $item->name; ?></h2>
                                <div class="product-inner-price">
                                    <ins style="font-size: x-large;">$ <? echo $item->price; ?></ins>
                                </div>

<!--                                <form action="" class="cart" id="add_to_cart_form">-->
                                <div class="woocommerce-info" style="font-size: medium;">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1" id="quantity">
                                    </div>
                                    <button type="button" name="add_cart" class="add_to_cart_button" data-productname="<? echo $item->name; ?>" data-price="<? echo $item->price; ?>"
                                            data-productid="<? echo $item->id; ?>">Add to Cart</button>                                </div>
<!--                                </form>-->

<!--                                <div class="product-inner-category">-->
<!--                                    <p>Category: <a href="">--><?// echo $item->category_id; ?><!--</a> </p>-->
<!--                                </div>-->

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Details</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Product Description</h2>
                                            <p><? echo $item->description; ?></p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Reviews</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Your rating</p>

                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                <p><input type="submit" value="Submit"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="related-products-wrapper">
<!--                        <h2 class="related-products-title">Related Products</h2>-->
                        <div class="related-products-carousel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function() {

    $('.add_to_cart_button').click(function() {
        console.log('click');
        <?php if(isset($this->session->customer)) { ?>
        var product_id = $(this).data("productid");
        var product_name = $(this).data("productname");
        var product_price = $(this).data("price");
        var product_image = <?php echo $image; ?>;
        var product_quantity = $('#quantity').val();
        console.log("quantity is " + product_quantity);
        if(product_quantity != '' && product_quantity > 0)
        {
            console.log("1");
            $.ajax({
                url:"<?php echo site_url('Cart_controller/add_item_to_cart'); ?>",
                method:"POST",
                data:{product_id:product_id, product_name:product_name, product_price:product_price,
                    product_image:product_image, product_quantity:product_quantity},
                success:function(data)
                {
                    console.log(data + " is data");
                    alert("Product Added into Cart");
//                    $('#cart_details').html(data);
//                    $('#' + product_id).val('');
                }
            });
        }
        else {
            alert("Please Enter quantity");
        }
        <?php } else { ?>
        $('#LoginModal').modal('show');
        <? } ?>
    })

})

</script>