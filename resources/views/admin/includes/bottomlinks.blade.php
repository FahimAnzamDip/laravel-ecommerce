<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('admin_assets') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Plugin JS -->
<script src="{{ asset('admin_assets') }}/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<!-- Argon JS -->
<script src="{{ asset('admin_assets') }}/assets/js/argon.js?v=1.1.0"></script>

<script>
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonClass: "btn btn-secondary",
            allowOutsideClick: false
        }).then((willDelete) => {
                if (willDelete.value) {
                    document.location.href = link;
                } else {
                    swal({
                        title: "Cancelled!",
                        type: "error",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-danger",
                    });
                }
            });
    });
    $(document).ready(function() {
        $('#product_details').summernote({
            height : '250'
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if (category_id) {

                $.ajax({
                    url: "{{ url('/get/subcategory/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value){

                            $('select[name="sub_category_id"]').append('<option value="'+ value.id + '">' + value.sub_category_name + '</option>');

                        });
                    },
                });

            }else{
                alert('danger');
            }
        });
    });
</script>

<script>
    function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#two')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL3(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#three')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
