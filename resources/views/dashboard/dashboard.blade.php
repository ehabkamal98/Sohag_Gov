<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-free/css/all.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <!-- Owl Carousel Default CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.min.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/rtl.css')}}">
    <!-- Data table -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/scroller.bootstrap4.min.css')}}">

    <title>@yield('title') - لوحة التحكم </title>

    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
</head>

<body >

<!-- Start Preloader -->
@include('inc.loader')
<!-- End Preloader -->

@include('dashboard.navbar')


@yield('content')


<!-- Start Go Top Area -->
<div class="go-top">
    <i class='bx bx-up-arrow-alt'></i>
</div>
<!-- End Go Top Area -->

<!-- Jquery Slim JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Meanmenu JS -->
<script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{asset('assets/js/nice-select.min.js')}}"></script>
<!-- Ajaxchimp JS -->
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator JS -->
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<!-- Contact JS -->
<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
<!-- Wow JS -->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('assets/js/jquery-3.5.1.js')}}" ></script>

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

<script>
    $(document).ready(function(){
        $(".alert").fadeTo(5000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
        $('#posts').DataTable();
    });
</script>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
  <script>
    CKEDITOR.replace('description',{
        toolbarGroups : [
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection',  'editing' ] },
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align',  'paragraph' ] },
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'tools', groups: [ 'tools' ] },
        ],
        contentsLangDirection : 'rtl',
        removePlugins : 'save,elementspath,floatingspace,resize',
        removeButtons: 'RemoveFormat,Format,Font,Templates,ShowBlocks,SpecialChar,PageBreak,Iframe,HorizontalRule,language,About,Smiley,Table,Flash,Image,Link,Unlink,CreateDiv,Blockquote,Indent,Outdent,BulletedList,NumberedList,Source,NewPage,ExportPdf,Preview,Print,Find,Replace,Form,Checkbox,Radio,Select,TextField,Textarea,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
    });
  </script>
</body>
</html>
