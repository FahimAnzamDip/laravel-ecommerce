<!-- jquery 3.12.4 -->
<script src="{{ asset('frontend_assets') }}/js/vendor/jquery-1.12.4.min.js"></script>
<!-- mobile menu js  -->
<script src="{{ asset('frontend_assets') }}/js/jquery.meanmenu.min.js"></script>
<!-- scroll-up js -->
<script src="{{ asset('frontend_assets') }}/js/jquery.scrollUp.js"></script>
<!-- owl-carousel js -->
<script src="{{ asset('frontend_assets') }}/js/owl.carousel.min.js"></script>
<!-- wow js -->
<script src="{{ asset('frontend_assets') }}/js/wow.min.js"></script>
<!-- price slider js -->
<script src="{{ asset('frontend_assets') }}/js/jquery-ui.min.js"></script>
<!-- elevateZoom js -->
<script src="{{ asset('frontend_assets') }}/js/jquery.elevateZoom-3.0.8.min.js"></script>
<!-- nivo slider js -->
<script src="{{ asset('frontend_assets') }}/js/jquery.nivo.slider.js"></script>
<!-- bootstrap -->
<script src="{{ asset('frontend_assets') }}/js/bootstrap.min.js"></script>
<!-- plugins -->
<script src="{{ asset('frontend_assets') }}/js/plugins.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<!-- www.addthis.com -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f8c896b1c1f1e22"></script>
<!-- main js -->
<script src="{{ asset('frontend_assets') }}/js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.addwishlist').on('click', function () {
            var id = $(this).data('id');
            if (id) {
                $.ajax({
                    url: "{{ url('add/wishlist') }}/" + id,
                    type: "GET",
                    datType: "json",
                    success: function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }
                    },
                });

            } else {
                console.log('Something went wrong');
            }
        });

        $('.addcart').on('click', function () {
            var id = $(this).data('id');
            if (id) {
                $.ajax({
                    url: "{{ url('add/to/cart') }}/" + id,
                    type: "GET",
                    datType: "json",
                    success: function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }
                    },
                });

            } else {
                console.log('Something went wrong');
            }
        });
    });

    function quickView(id) {
        $.ajax({
            url: "{{ url('product/view') }}/" + id,
            type: "GET",
            datType: "json",
            success: function (data) {
                $('#product_name').text(data.product_name);
                $('#product_code').text(data.product_code);
                $('#image_one').attr('src', '{{ asset('uploads/product_images') . "/" }}' + data.image_one);
                $('#image_two').attr('src', '{{ asset('uploads/product_images') . "/" }}' + data.image_two);
                $('#image_three').attr('src', '{{ asset('uploads/product_images') . "/" }}' + data.image_three);
                $('#image_one_one').attr('src', '{{ asset('uploads/product_images') . "/" }}' + data.image_one);
                $('#image_two_two').attr('src', '{{ asset('uploads/product_images') . "/" }}' + data.image_two);
                $('#image_three_three').attr('src', '{{ asset('uploads/product_images') . "/" }}' + data.image_three);
                if (data.product_quantity > 0) {
                    $('#stock').text('In Stock')
                } else {
                    $('#stock').text('Out Of Stock')
                }
                $('.addcart').attr('data-id', data.id);
                $('.addwishlist').attr('data-id', data.id);
                if (data.discounted_price === null) {
                    var html = `<span>$${data.selling_price}</span>`;
                } else {
                    var html = `<span>$${data.discounted_price} <del class="text-danger">${data.selling_price}</del></span>`;
                }
                $('#product_price').html(html);
            }
        });
    }
</script>
