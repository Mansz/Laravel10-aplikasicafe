 <!--  BEGIN MAIN CONTAINER  -->
   <style> 
   .hidden {
    display: none;
} </style>

 <div class="main-container" id="container">
     <div class="overlay"></div>
     <div class="search-overlay"></div>

     <!--  BEGIN SIDEBAR  -->
     <div class="sidebar-wrapper sidebar-theme">
         <nav id="sidebar">
             <div class="navbar-nav theme-brand flex-row text-center">
                 <div class="nav-logo">
                     <div class="nav-item theme-logo">
                         <a href="/dashboard">
                             <img src="{{ asset('cork/html/src/assets/img/cu.jpg') }}" alt="logo" />
                         </a>
                     </div>
                     <div class="nav-item theme-text">
                         <a href="/dashboard" class="nav-link"> Cafe </a>
                     </div>
                 </div>
                 <div class="nav-item sidebar-toggle">
                     <div class="btn-toggle sidebarCollapse">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevrons-left">
                             <polyline points="11 17 6 12 11 7"></polyline>
                             <polyline points="18 17 13 12 18 7"></polyline>
                         </svg>
                     </div>
                 </div>
             </div>
             <div class="shadow-bottom"></div>
             <ul class="list-unstyled menu-categories" id="accordionExample">
                 <li class="menu active">
                     <a href="/dashboard-admin" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                         <div class="">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                 <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                 <polyline points="9 22 9 12 15 12 15 22"></polyline>
                             </svg>
                             <span>Dashboard</span>
                         </div>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                 <polyline points="9 18 15 12 9 6"></polyline>
                             </svg>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled show" id="dashboard" data-bs-parent="#accordionExample">
                         <li class="active">
                             <a href="/dashboard">Dashboard </a>
                         </li>
                     </ul>
                 </li>
                 <li class="menu menu-heading">
                     <div class="heading">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-minus">
                             <line x1="5" y1="12" x2="19" y2="12"></line>
                         </svg><span>APPLICATIONS</span>
                     </div>
                 </li>

                 <li class="menu" style="display: none;"> 
    <a href="/users" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round" class="feather feather-calendar">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            <span>User</span>
        </div>
    </a>
</li>


                 <li class="menu">
                     <a href="#invoice" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <div class="">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                 <line x1="12" y1="1" x2="12" y2="23"></line>
                                 <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                             </svg>
                             <span>Produk</span>
                         </div>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                 <polyline points="9 18 15 12 9 6"></polyline>
                             </svg>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled" id="invoice" data-bs-parent="#accordionExample">
                         <li>
                             <a href="/foods">Food </a>
                         </li>
                         <li>
                             <a href="/drinks"> Drink </a>
                         </li>
                         <li>
                             <a href="/non-foods"> Non Food</a>
                         </li>
                     </ul>
                 </li>


                 <li class="menu">
                     <a href="/penjualan" aria-expanded="false" class="dropdown-toggle">
                         <div class="">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                 <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                 </rect>
                                 <line x1="16" y1="2" x2="16" y2="6"></line>
                                 <line x1="8" y1="2" x2="8" y2="6"></line>
                                 <line x1="3" y1="10" x2="21" y2="10"></line>
                             </svg>
                             <span>Data Transaksi</span>
                         </div>
                     </a>
                 </li>


                 <li class="menu">
                     <a href="#blog" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <div class="">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool">
                                 <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                                 <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                                 <path d="M2 2l7.586 7.586"></path>
                                 <circle cx="11" cy="11" r="2"></circle>
                             </svg>
                             <span>Laporan</span>
                         </div>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                 <polyline points="9 18 15 12 9 6"></polyline>
                             </svg>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled" id="blog" data-bs-parent="#accordionExample">
                         <li>
                             <a href="/laporan"> Laporan Data Transaksi </a>
                         </li>
                         <li>
                             <a href="/laporan/food"> Laporan Produk Food</a>
                         </li>
                         <li>
                             <a href="/laporan/drink"> Laporan Produk Drink</a>
                         </li>
                         <li>
                             <a href="/laporan/non-food"> Laporan Produk Non Food </a>
                         </li>
                     </ul>
                 </li>

             </ul>
         </nav>
     </div>
     <!--  END SIDEBAR  -->

     <!--  BEGIN CONTENT AREA  -->
     <div id="content" class="main-content">
         <div>
             @yield('container')
         </div>
         <!--  BEGIN FOOTER  -->
         @include('admin.partials.footer')
         <!--  END FOOTER  -->
     </div>
     <!--  END CONTENT AREA  -->
 </div>
 <!-- END MAIN CONTAINER -->
