<button id="menu-toggle" class="menu-button d-lg-none" aria-label="Toggle menu">
     <iconify-icon icon="mdi:menu" style="font-size: 24px;"></iconify-icon>
 </button>
 
 <div class="main-nav">
     <!-- Sidebar Logo -->
     <p class="nav-item nav-logo">
         <a href="{{ route('home') }}" class="nav-link">
             <div class="logo-box">
                 <div class="nav-logo-text d-flex flex-column">
                     <span class="font-weight-bold" style="font-size: 24px; color: #ff6c2f;">
                         {{ Auth::user()->name }}
                     </span>
                 </div>
                 <i class="mdi mdi-bookmark-check text-success nav-logo-badge"></i>
             </div>
         </a>
     </p>
 
     <div class="scrollbar" data-simplebar>
         <ul class="navbar-nav" id="navbar-nav">
             <li class="menu-title">General</li>
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('home') }}">
                     <span class="nav-icon">
                         <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                     </span>
                     <span class="nav-text">Dashboard</span>
                 </a>
             </li>
           
             
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('form.index') }}">
                     <span class="nav-icon">
                         <iconify-icon icon="solar:chat-round-bold-duotone"></iconify-icon>
                     </span>
                     <span class="nav-text">Formulaires</span>
                 </a>
             </li>
             
         </ul>
     </div>
 </div>
 
 <style>
     .main-nav {
         position: fixed;
         top: 0;
         left: 0;
         height: 100%;
         width: 250px;
         background-color: #fff;
         box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
         z-index: 1000;
         transition: transform 0.3s ease-in-out;
     }
 
     .main-nav.closed {
         transform: translateX(-100%);
     }
 
     .menu-button {
         position: fixed;
         top: 10px;
         left: 10px;
         background: none;
         border: none;
         font-size: 24px;
         cursor: pointer;
         z-index: 1100;
     }
 
     @media (min-width: 992px) {
         .menu-button {
             display: none;
         }
 
         .main-nav {
             transform: translateX(0); 
         }
     }
 
     @media (max-width: 991px) {
         .main-nav.closed {
             transform: translateX(-100%);
         }
     }
 </style>
 
 <script>
     document.addEventListener('DOMContentLoaded', function () {
         const menuToggle = document.getElementById('menu-toggle');
         const mainNav = document.querySelector('.main-nav');
         const body = document.body;
 
         menuToggle.addEventListener('click', function () {
             mainNav.classList.toggle('closed');
             body.classList.toggle('menu-open');
         });

          const navLinks = document.querySelectorAll('.nav-link');
         navLinks.forEach(link => {
             link.addEventListener('click', function () {
                 if (window.innerWidth < 992) { 
                     mainNav.classList.add('closed');
                     body.classList.remove('menu-open');
                 }
             });
         });
     });
 </script>
 