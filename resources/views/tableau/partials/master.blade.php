<!DOCTYPE html>
<html lang="en">
<head>
    @include('tableau.partials.title-meta', ['title' => 'Dashboard'])
    @include('tableau.partials.head-css')
</head>
<body>
    <!-- START Wrapper -->
    <div class="wrapper">
        @include('tableau.partials.topbar', ['title' => 'Welcome!'])
        @include('tableau.partials.main-nav')

        <div class="page-content">
            <div class="container-fluid">
                @yield('main-content')
             </div>

            @include('tableau.partials.footer')
        </div>
    </div>

    @include('tableau.partials.vendor-scripts')

    <!-- Section pour les scripts -->
    @stack('scripts')  <!-- C'est ici que les scripts seront poussés -->
</body>
</html>
