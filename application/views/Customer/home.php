
<?php echo $this->session->flashdata('message'); ?>


<div class="slider-area">
    <div class="zigzag-bottom"></div>
    <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">

<!--        <div class="slide-bulletz">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <ol class="carousel-indicators slide-indicators">-->
<!--                            <li data-target="#slide-list" data-slide-to="0" class="active"></li>-->
<!--                            <li data-target="#slide-list" data-slide-to="1"></li>-->
<!--                            <li data-target="#slide-list" data-slide-to="2"></li>-->
<!--                        </ol>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="single-slide">
                    <div class="slide-bg slide-one"></div>
                    <div class="slide-text-wrapper">
                        <div class="slide-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <div class="slide-content">
                                            <h2>We are awesome</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, dolorem, excepturi. Dolore aliquam quibusdam ut quae iure vero exercitationem ratione!</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ab molestiae minus reiciendis! Pariatur ab rerum, sapiente ex nostrum laudantium.</p>
                                            <a href="" class="readmore">Learn more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="item">-->
<!--                <div class="single-slide">-->
<!--                    <div class="slide-bg slide-two"></div>-->
<!--                    <div class="slide-text-wrapper">-->
<!--                        <div class="slide-text">-->
<!--                            <div class="container">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-6 col-md-offset-6">-->
<!--                                        <div class="slide-content">-->
<!--                                            <h2>We are great</h2>-->
<!--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, dolorum harum molestias tempora deserunt voluptas possimus quos eveniet, vitae voluptatem accusantium atque deleniti inventore. Enim quam placeat expedita! Quibusdam!</p>-->
<!--                                            <a href="" class="readmore">Learn more</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <div class="single-slide">-->
<!--                    <div class="slide-bg slide-three"></div>-->
<!--                    <div class="slide-text-wrapper">-->
<!--                        <div class="slide-text">-->
<!--                            <div class="container">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-6 col-md-offset-6">-->
<!--                                        <div class="slide-content">-->
<!--                                            <h2>We are superb</h2>-->
<!--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eius?</p>-->
<!--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptates necessitatibus dicta recusandae quae amet nobis sapiente explicabo voluptatibus rerum nihil quas saepe, tempore error odio quam obcaecati suscipit sequi.</p>-->
<!--                                            <a href="" class="readmore">Learn more</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        </div>
    </div>
</div> <!-- End slider area -->

<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <i class="fa fa-refresh"></i>
                    <p>30 Days return</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <i class="fa fa-truck"></i>
                    <p>Fast Delivery</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <i class="fa fa-lock"></i>
                    <p>Secure payments</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <i class="fa fa-gift"></i>
                    <p>New products</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->


<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Latest Products</h2>
                    <div class="product-carousel">

                        <?php foreach ($items as $row) { ?>

                        <div class="col-md-3 col-sm-6">
                            <div class="single-shop-product">
                                <div class="product-upper">
                                    <img src="<?php echo site_url('Main/image/item/'.$row->image_id); ?>" alt="">
                                </div>
                                <h2><a href="<?php echo site_url('Customer_main/single/'.$row->id); ?>"><? echo $row->name; ?></a></h2>
                                <div class="product-carousel-price">
                                    <ins>$ <? echo $row->price; ?></ins>
                                </div>
                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow"
                                       href="<?php echo site_url('Customer_main/single/'.$row->id); ?>">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <? } ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->



