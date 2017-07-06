<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="base-url" content="{{ url('/') }}">
    <title>Admin | Dashboard</title>
    {{ Html::style('assets/css/admin.min.css') }}
    @yield('css')
    @stack('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    {!! Html::script('assets/plugins/toastr/toastr.min.js') !!}
    <script type="text/javascript">
        $('.form-add').submit(function (e){
            e.preventDefault();
            console.log($(this).attr('action'));
            $.ajax({
                url : $(this).attr('action'),
                data : $(this).serialize(),
                type : "POST",
                success : function(data){

                    $('#cart-sidebar').html(data.cartContent);
                    $('#cart-total').html(data.total);
                    $('.top-subtotal .price').html('$' + data.subTotal);

                    toastr["success"]("Complete bought product !")
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    /*toastr.success('You Bought Product');*/

                }
            });
        });

        $('.glyphicon-remove').click(function(event) {
            /* Act on the event */
            event.preventDefault();
                alert('oke');
        });

    </script>
</head>
<body>
    @include('admin.layout.section.nav_master')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('admin.layout.section.header_master')
        @yield('content')
    </div>
    {{--@include('admin.layout.section.right_sidebar_master')--}}

    {{ Html::script('assets/js/admin.min.js') }}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
