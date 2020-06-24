<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Boulangerie| Administration</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="template/plugins/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="template/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="template/plugins/datatables/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="template/plugins/select2/select2.css">
</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        {{--  <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">{{ Auth::user()->name }} <i class="fa fa-chevron-down"></i></a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <p style="text-align: center">Mon profile</p><br>
                <div style="margin-left: 40px">
                    <button class="btn btn-primary">Enregistrer</button>
                    <button class="btn btn-primary">Enregistrer</button>
                </div>

                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Deconnexion </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>

            </div>
        </li>  --}}

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Administrateur</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{ route('addTypeProduit') }}" class="nav-link">
                <i class="nav-icon fa fa-cubes"></i>
                    <p>TYPE DE PRODUITS</p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-product-hunt "></i>
                    <p>
                        PRODUITS
                            <i class="fa fa-angle-left right"></i>
                    </p>
            </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('addProduit') }}" class="nav-link">
                            <i class="fa fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                        </a>
                        <a href="{{ route('listProduit') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                                <p>Liste</p>
                        </a>
                    </li>
                </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-file-text "></i>
                    <p>
                        COMMANDES
                            <i class="fa fa-angle-left right"></i>
                    </p>
            </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('listCommande') }}" class="nav-link">
                            <i class="fa fa-hourglass-start nav-icon"></i>
                                <p>En attente</p>
                        </a>
                        <a href="{{ route('listCommandeLiv') }}" class="nav-link">
                            <i class="fa fa-check nav-icon"></i>
                                <p>Livrer</p>
                        </a>
                    </li>
                </ul>
        </li>

        <li class="nav-item">
            <a href="{{ route('listClient') }}" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                    <p>CLIENTS</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('listLivraison') }}" class="nav-link">
                <i class="nav-icon fa fa-truck"></i>
                    <p>LIVRAISONS</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link">
                <i class="nav-icon fa fa-user-secret"></i>
                    <p>UTILISATEURS</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-credit-card"></i>
                    <p>REGLEMENT</p>
            </a>
        </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        @yield('content')

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
    <script src="template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
    <script src="template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
    <script src="template/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
    <script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
    <script src="template/dist/js/demo.js"></script>
<!-- DataTables -->
    <script src="template/plugins/datatables/jquery.dataTables.js"></script>
    <script src="template/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="template/plugins/select2/select2.full.min.js"></script>

<!-- page script -->
    <script>
        $(document).ready(function() {
            $('#example1').dataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            } );
        } );
    </script>
    <script>
$(function () {
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false
    });
});
    </script>
    <script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
            timePicker         : true,
            timePickerIncrement: 30,
            format             : 'MM/DD/YYYY h:mm A'
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
            )

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
            showInputs: false
            })
        })
        </script>

</body>
</html>
