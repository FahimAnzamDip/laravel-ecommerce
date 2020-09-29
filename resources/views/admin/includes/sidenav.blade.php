<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand text-primary font-weight-bolder" href="{{ route('admin.home') }}">
                ECOMMERCE
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">
                            <i class="fa fas fa-home text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-category" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fa fas fa-list text-orange"></i>
                            <span class="nav-link-text">Category</span>
                        </a>
                        <div class="collapse" id="navbar-category">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subcategory.index') }}" class="nav-link">Sub Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('brand.index') }}" class="nav-link">Brand</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('coupon.index') }}">
                            <i class="fa fas fa-tags text-info"></i>
                            <span class="nav-link-text">Coupons</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('newsletter.index') }}">
                            <i class="fa fas fa-newspaper text-pink"></i>
                            <span class="nav-link-text">Newsletters</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-product" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fa fas fa-shopping-cart text-primary"></i>
                            <span class="nav-link-text">Products</span>
                        </a>
                        <div class="collapse" id="navbar-product">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('product.create') }}" class="nav-link">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('product.index') }}" class="nav-link">All Products</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('slider.index') }}">
                            <i class="fa fas fa-images text-success"></i>
                            <span class="nav-link-text">Slider</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-order" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-shopping-basket text-orange"></i>
                            <span class="nav-link-text">Orders <span class="badge badge-warning">{{ \App\Order::where('status', 0)->count() }}</span></span>
                        </a>
                        <div class="collapse" id="navbar-order">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('orders', ['status' => 0]) }}" class="nav-link">New Orders <span class="badge badge-warning"> {{ \App\Order::where('status', 0)->count() }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orders', ['status' => 1]) }}" class="nav-link">Processed Orders <span class="badge badge-info"> {{ \App\Order::where('status', 1)->count() }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orders', ['status' => 2]) }}" class="nav-link">Shipped Orders <span class="badge badge-primary"> {{ \App\Order::where('status', 2)->count() }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orders', ['status' => 3]) }}" class="nav-link">Delivered Orders <span class="badge badge-success"> {{ \App\Order::where('status', 3)->count() }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orders', ['status' => 4]) }}" class="nav-link">Canceled Orders <span class="badge badge-danger"> {{ \App\Order::where('status', 4)->count() }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
