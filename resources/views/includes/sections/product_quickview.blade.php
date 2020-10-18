<div class="modal modal-box fade" id="myModal" role="dialog">
    <!-- Modal Dialog Box Start -->
    <div class="modal-dialog max-width">
        <!-- Modal content Start -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Body Start -->
            <div class="modal-body">
                <div class="quiick-view-details">
                    <!-- Product Thumbnail Start -->
                    <div class="main-product-thumbnail">
                        <div class="container">
                            <div class="row">
                                <!-- Main Thumbnail Image Start -->
                                <div class="col-md-5 col-sm-6">
                                    <!-- Thumbnail Large Image start -->
                                    <div class="tab-content">
                                        <div id="thumb1" class="tab-pane fade in active">
                                            <img width="200" id="image_one" src="" alt="product-thumbnail"/>
                                        </div>
                                        <div id="thumb2" class="tab-pane fade">
                                            <img width="200" id="image_two" src="" alt="product-thumbnail"/>
                                        </div>
                                        <div id="thumb3" class="tab-pane fade">
                                            <img width="200" id="image_three" src="" alt="product-thumbnail"/>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Large Image End -->

                                    <!-- Thumbnail Image End -->
                                    <div class="product-thumbnail mt-15 mb-20">
                                        <div class="thumb-menu owl-carousel">
                                            <div class="active">
                                                <a data-toggle="tab" href="#thumb1"> <img id="image_one_one" src="" alt="product-thumbnail"></a>
                                            </div>
                                            <div>
                                                <a data-toggle="tab" href="#thumb2"> <img id="image_two_two" src="" alt="product-thumbnail"></a>
                                            </div>
                                            <div>
                                                <a data-toggle="tab" href="#thumb3"> <img id="image_three_three" src="" alt="product-thumbnail"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail image end -->
                                </div>
                                <!-- Main Thumbnail Image End -->
                                <!-- Thumbnail Description Start -->
                                <div class="col-md-7 col-sm-6">
                                    <div class="thubnail-desc fix">
                                        <h2 class="product-header" id="product_name"></h2>
                                        <!-- Product Rating Start -->
                                        <div class="rating-summary fix mtb-25">
                                            <div class="rating f-left mr-10">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-feedback f-left">
                                                <a href="#">0 reviews</a> /
                                                <a href="#">Write a review</a>
                                            </div>
                                        </div>
                                        <!-- Product Rating End -->
                                        <!-- Product Price Start -->
                                        <div class="pro-price mb-15">
                                            <ul class="pro-price-list">
                                                <li class="price" id="product_price"></li>
                                                <li class="tax">Tax: {{ config('cart.tax') }}%</li>
                                            </ul>
                                        </div>
                                        <!-- Product Price End -->
                                        <!-- Product Price Description Start -->
                                        <div class="product-price-desc mb-10">
                                            <ul class="pro-desc-list">
                                                <li>Product Code: <span id="product_code"></span></li>
                                                <li>Availability: <span id="stock"></span></li>
                                            </ul>
                                        </div>
                                        <!-- Product Price Description End -->
                                        <form action="{{ route('add.cart.post') }}" method="POST">
                                        @csrf
                                            <!-- Product Box Quantity Start -->
                                            <div class="box-quantity mtb-20">
                                                <div class="quantity-item">
                                                    <label>Qty: </label>
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" type="text" name="quantity" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Box Quantity End -->
                                            <input type="hidden" value="{{ $product->id ?? '' }}" name="id">
                                            <!-- Product Button Actions Start -->
                                            <div class="product-button-actions">
                                                <button class="add-to-cart" type="submit">add to cart</button>
                                                <a href="javascript:" data-toggle="tooltip" title="Add to Wishlist"
                                                   class="same-btn mr-15 addwishlist" data-id="{{ $product->id ?? ''}}"><i
                                                        class="pe-7s-like"></i></a>
                                            </div>
                                            <!-- Product Button Actions End -->
                                        </form>
                                        <!-- Product Social Link Share Start -->
                                        <div class="social-shared">
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </div>
                                        <!-- Product Social Link Share End -->
                                    </div>
                                </div>
                                <!-- Thumbnail Description End -->
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- Container End -->
                    </div>
                    <!-- Product Thumbnail End -->
                </div>
                <!-- Quick View Details End -->
            </div>
            <!-- Modal Body End -->
        </div>
        <!-- Modal Content End -->
    </div>
    <!-- Modal Dialog Box End -->
</div>
