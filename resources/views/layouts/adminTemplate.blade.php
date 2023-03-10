<!DOCTYPE html>
<html lang="en">

<head>

  <title> BENDJEDDOU ELECTROMENAGER </title>

  <link href="{{asset('css/site.css')}}" rel="stylesheet">

  @livewireStyles

</head>

<body id="page-top">
  @include('sweetalert::alert')

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center py-2" href="/">
        {{-- <div class="sidebar-brand-text mx-3 py-3">BENDJEDDOU ELECTROMENAGER</div> --}}
      {{-- </a> --} --}}

      <a href="" class="sidebar-brand d-flex align-items-center justify-content-center ">
          <img src="{{asset('img/logo.png')}}" alt="" height="100px">
      </a>

      <hr class="sidebar-divider">

      <li class="nav-item @if( Route::is('dashboard') ) active @endif">
        <a class="nav-link " href=" {{route('dashboard')}} " >
          <i class="far fa-chart-bar text-lg"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item @if( Route::is('vente.*') ) active @endif ">
         <a class="nav-link" href=" {{route('vente.gros')}} "  >
          <i class="fas fa-shopping-cart fa-2x"></i>
          <span>Vente</span></a>
       </li>
      <li class="nav-item @if( Route::is('facilite.*') ) active @endif ">
         <a class="nav-link" href=" {{route('facilite.index')}} "  >
            <i class="fas fa-coins fa-2x"></i>
          <span>Facilité</span></a>
       </li>
       <hr class="sidebar-divider">
       
       <li class="nav-item" style="z-index: 99">
         <a class="nav-link collapsed" style="z-index: 99" href="" data-toggle="collapse" data-target="#productCollapse" 
         aria-expanded="true" aria-controls="productCollapse">
           <i class="fas fa-laptop"></i>
           <span>Produits</span>
         </a>
         <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Products</h6>
             <a class="collapse-item" href="{{route('product.index')}}"><i class="fas fa-spinner mr-1"></i>Les Products</a>
             <a class="collapse-item" href=" {{route('product.remise')}} " ><i class="fas fa-percent mr-1"></i><span>Remise De Prix</span></a>
             <a class="collapse-item" href="{{route('product.removed')}}"><i class="far fa-trash-alt mr-1"></i>Produits Supprimé</a>
           </div>
         </div>
       </li>
       <hr class="sidebar-divider">
       <li class="nav-item @if( Route::is('marque.*') ) active @endif">
         <a class="nav-link collapsed" href="{{route('marque.index')}}">
           <i class="fab fa-envira"></i>
           <span>Marque</span>
         </a>
       </li>
       <hr class="sidebar-divider">
 
       <li class="nav-item @if( Route::is('category.*') ) active @endif">
         <a class="nav-link collapsed" href="{{route('category.index')}}">
           <i class="fas fa-copy"></i>
           <span>Categories</span>
         </a>
       </li>
 
 
 
       <hr class="sidebar-divider">
      <li class="nav-item @if( Route::is('bonVente.*') ) active @endif">
        <a class="nav-link" href=" {{route('bonVente.index')}} " >
          <i class="fas fa-file-invoice"></i>
          <span>Facturation</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item @if( Route::is('client.*') ) active @endif">
        <a class="nav-link collapsed" href="{{route('client.index')}}" >
          <i class="fas fa-users"></i>
          <span>Clients</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item @if( Route::is('fournisseur.*') ) active @endif">
        <a class="nav-link collapsed" href="{{route('fournisseur.index')}}" >
          <i class="fas fa-user-friends"></i>
          <span>Fournisseur</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item @if( Route::is('stock.*') ) active @endif">
        <a class="nav-link collapsed" href="{{route('stock.index')}}" >
          <i class="fas fa-cubes"></i>
          <span>Stock</span>
        </a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item @if( Route::is('magazin.*') ) active @endif" style="z-index: 99">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#magazinCollapse" aria-expanded="true" aria-controls="magazinCollapse">
            <i class="fas fa-store"></i>
            <span>Magazin</span>
         </a>
         <div id="magazinCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Magazin</h6>
             <a class="collapse-item" href=" {{route('magazin.profile')}} "><i class="fas fa-address-card mr-1"></i>Profile</a>
             <a class="collapse-item" href=" {{route('employee.index')}} " ><i class="fas fa-user-friends mr-1"></i>Employées</a>
             <a class="collapse-item" href=" {{route('users.index')}} " ><i class="fas fa-user mr-1"></i>Utilisateurs</a>
             <a class="collapse-item" href=" {{route('frais.index')}} " ><i class="fas fa-hand-holding-usd mr-1"></i>Les Charges</a>
           </div>
         </div>
       </li>

      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <img src=" {{asset('img/logo.png')}} " alt="" class="img-fluid" width="100" height="50">


          <li class="nav-item">
                <h6 style="font-weight: 600 ; color:gray"> <a href="https://www.facebook.com/m.amine.bendahma/" target="_blank">
                    LaraGest V 1.0 <span style="font-size: 0.8rem"> <i class="fas fa-phone-alt mr-1"></i> \ </span> <i class="fab fa-whatsapp mx-1"></i> 06.66.93.01.03 </a></h6>
          </li>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->username . ' | '. auth()->user()->role }}</span>
                <img class="img-profile rounded-circle" src=" {{asset('img/p.png')}} ">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('magazin.profile')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <div class="dropdown-divider"></div>
                  <form action="{{route('logout')}}" method="POST">
                    @csrf

                      <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Se déconnecté
                      </button>

                  </form>
              </div>
            </li>

          </ul>

        </nav>

        <div class="container-fluid">

            @yield('content')
            @yield('list')
            @yield('productList')
            @yield('stat')

        </div>

      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy;   LaraGest V 1.0 <span style="font-size: 0.8rem"> <i class="fas fa-phone-alt mr-1"></i> \ </span> <i class="fab fa-whatsapp mx-1"></i> 06.66.93.01.03 </span>
          </div>
        </div>
      </footer>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <input type="submit" class="btn btn-primary" value="Logout">
          </form>
        </div>
      </div>
    </div>
  </div>

  @livewireScripts
  <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{ asset('js/app.js')}}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('js/sweetalert2.min.js')}} "></script>
  <script src="{{ asset('js/Chart.min.js')}} "></script>
  <script src="{{ asset('js/Chartisan.min.js')}} "></script>
  <script src="{{ asset('js/Chartisan.min.js')}} "></script>
  <script src="{{ asset('js/site.js')}} "></script>

  @yield('scripts');

  {{-- <script type="text/javascript">
         var dateDebut = "{{date('Y-m').'-01'}}'" ;
         var dateFin = "{{date('Y-m').'-31'}}" ;
         const chart = new Chartisan({
                        el: '#chart',
                        url : "/api/chart/sales_chart?dateDebut="+dateDebut+"&dateFin="+dateFin,
                        hooks: new ChartisanHooks()
                                    .colors()
                                    .datasets([{type:'line',fill:false}])
                                    .beginAtZero()

         });
         function changeChart(){
            dateDebut = document.getElementById('dateDebutChart').value;
            dateFin = document.getElementById('dateFinChart').value;
            document.getElementById('chart').classList.add("d-none");
            document.getElementById('customChart').classList.remove("d-none");
            const chart = new Chartisan({
                           el: '#customChart',
                           url : "/api/chart/sales_chart?dateDebut="+dateDebut+"&dateFin="+dateFin,
                           hooks: new ChartisanHooks()
                                       .colors()
                                       .datasets([{type:'line',fill:false}])
                                       .beginAtZero()

               });
            }



         const detteChart = new Chartisan({
                              el: '#detteChart',
                              url : "/api/chart/dette_chart?dateDebut="+dateDebut+"&dateFin="+dateFin,
                              hooks: new ChartisanHooks()
                                          .colors()
                                          .datasets([{type:'line',fill:false}])
                                          .beginAtZero()

             });

</script> --}}

  <script type="text/javascript">
        $(document).ready( function () {
                    $(document).keypress(
                    function(event){
                        if (event.which == '13') {
                        event.preventDefault();
                        }
                    });
                    window.livewire.on('productoutOfSTock', () => {
                        Swal.fire({
                            icon: 'warning',
                            text: 'La quantité du produit selectioné n\'exist pas dans le stock',
                            }).then(() => {});
                        });

                    $('#Table').DataTable();

                    $('#TableSelectedProduct').DataTable({
                        "columnDefs": [
                                { "width": "80%", "targets": 1 }
                        ]
                    });

                    $('#TableRemise').DataTable({
                        "columnDefs": [
                            { "width": "40%", "targets": 1 },
                            { "width": "30%", "targets": 2 },
                            { "width": "30%", "targets": 3 },
                            { "width": "10%", "targets": 5 },
                            { "width": "10%", "targets": 6 },

                        ]
                    });

                    $('#selectProductTable').DataTable({
                        "columnDefs": [
                        { "width": "5%", "targets": 0 },
                        { "width": "25%", "targets": 1 },
                        null,
                        { "width": "5%", "targets": 3 },
                        ]
                    });

                    window.livewire.on('closeModel', () => {
                        $('.modal').modal('hide');
                    });

                    $('#showProductsTable').DataTable({
                            "columnDefs": [
                                { "width": "20%", "targets": 1 },
                            ]
                    });


                    $('#selectProductTable').DataTable({
                        "columnDefs": [
                            { "width": "10%", "targets": 0 },
                            { "width": "15%", "targets": 3 }
                        ]
                    });
        });
  </script>
</body>

</html>
