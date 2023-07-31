<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{__('lang.title')}} | {{__('lang.dashboard')}}</title>
  <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}"/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/flag-icon-css/css/flag-icon.min.css')}}">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  

  <!-- summernote
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
  -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
  <!-- Bootstrap CSS 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->

  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">

  <!-- flag-icon-css -->
  <link rel="stylesheet" href="{{asset('admin/plugins/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">

  <style>
    nav svg{
      height: 20px;
    }

    @font-face{
      font-family: Phetsarath OT;
      src: url('{{asset('fonts/PhetsarathOT.ttf')}}');
    }
  </style>

  @livewireStyles

</head>
<body class="hold-transition layout-top-nav" style="font-family: 'Phetsarath OT'">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.app.navmenuapp')
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Version 1.0.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2009 - @php
        echo date('Y')
    @endphp <a href="https://citgroup.la" target="_blank">{{__('lang.title')}}</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- AdminLTE App -->

<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>

<!--File manager -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/money.format.js')}}"></script>
<script>
    function editTerm(id)
    {
      $.get('/term/'+id+'/show', function(term){
        $("#term_id").val(term.id);
        $("#edit_name").val(term.name);
        $("#edit_note").val(term.note);
        $("#editTermModal").modal('toggle');
      })
    }

    function editBookType(id)
    {
      $.get('/booktype/'+id+'/show', function(booktype){
        $("#book_type_id").val(booktype.id);
        $("#edit_name").val(booktype.name);
        $("#editBookTypeModal").modal('toggle');
      })
    }

    function editClassRoom(id)
    {
      $.get('/classroom/'+id+'/show', function(classroom){
        $("#class_room_id").val(classroom.id);
        $("#edit_name").val(classroom.name);
        $("#editClassRoomModal").modal('toggle');
      })
    }

  </script>
<script>
  $(function () {

    // Summernote
    //$('.summernote').summernote()

    $('.select2').select2()

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "print"]
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
  @if(Session::has('success'))
      toastr.options.positionClass = 'toast-bottom-right';
      toastr.success("{{Session::get('success') }}")
  @elseif(Session::has('warning'))
      toastr.options.positionClass = 'toast-bottom-right';
      toastr.warning("{{Session::get('warning')}}")
  @elseif(Session::has('error'))
      toastr.options.positionClass = 'toast-bottom-right';
      toastr.error("{{Session::get('error')}}")
  @endif
</script>

<!--
<script>
  window.livewire.on('alert', param => {
        toastr[param['type']](param['message'],param['type']);
  });
</script>
-->

<script>
  $(document).ready(function(){
    const FMButton = function(context) {
      const ui = $.summernote.ui;
      const button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'File Manager',
        click: function() {
          window.open('/file-manager/summernote', 'fm', 'width=1024,height=800');
        }
      });
      return button.render();
    };
    $('.summernote').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['link', 'picture', 'video']],
        ['fm-button', ['fm']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ],
      buttons: {
        fm: FMButton
      }
    });
  });

  function fmSetLink(url) {
    $('.summernote').summernote('insertImage', url);
  }
</script>


@yield('scripts')


</body>
</html>
