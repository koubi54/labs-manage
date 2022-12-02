<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | LaboDentare</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('public/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('public/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('includes/nav')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nom_complet }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{url('public/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website {{date('Y')}}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <form action="{{route('logout')}}" method="post">
                      @csrf
                    <button class="btn btn-primary">Déconnexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('public/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('public/js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{url('public/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="{{url('public/js/demo/datatables-demo.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#services").change(function(){
                $('#prix').val($("#services option:selected").attr('data-price'))
            });
            $("#file-browser").click(function(e) {
               e.preventDefault();
               $("#file-upload").trigger("click");
            });

            $('#dataTableCLt').on('search.dt', function() {
                var value = $('.dataTables_filter input').val();
                console.log(value.length);
                if(value.length>3){
                    $('tbody tr').removeClass('d-none')
                }else{
                    $('tbody tr').addClass('d-none')
                }
            }); 
            
        });
        function converHTMLFileToPDF() {
                $('#table').hide()
                const { jsPDF } = window.jspdf;
                var doc = new jsPDF('l', 'mm', [1200, 1210]);

                var pdfjs = document.querySelector('#temp-target');

                // Convert HTML to PDF in JavaScript
                doc.html(pdfjs, {
                    callback: function(doc) {
                        doc.save("reçu-"+Math.floor(Math.random() * 1000)+".pdf");
                        $('#table').show()
                    },
                    x: 10,
                    y: 10
                });
            }
            
    </script>
</body>

</html>