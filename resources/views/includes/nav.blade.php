 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('lstClts')}}" style="padding:20%">
    <img src="{{url('public/img/logo-w.png')}}" width="100%"/>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
@if(checkRole())
<li class="nav-item">
    <a class="nav-link" href="{{route('index')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
        
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">
@endif
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{route('lstClts')}}">
        <i class="fas fa-user-friends"></i>
        <span>Clients</span>
    </a>
</li>
@if(checkRole())
<!-- Divider -->
<hr class="sidebar-divider my-0">
 <!-- Nav Item - Dashboard -->
 <li class="nav-item">
    <a class="nav-link" href="{{route('lstService')}}">
        <i class="fas fa-boxes"></i>
        <span>Services</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">
 <!-- Nav Item - Dashboard -->
 <li class="nav-item">
    <a class="nav-link" href="{{route('lstUsers')}}">
        <i class="fas fa-users"></i>
        <span>Utilisateurs</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">
@endif

</ul>
<!-- End of Sidebar -->