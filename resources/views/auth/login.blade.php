<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta tags requises -->
    <meta charset="utf-8">
    <title>RÉSEAUTAGE</title>

    <meta name="author" content="Relwendé Jacob ZOUNDI" />
w
    <meta property="og:type" content="website">
    <meta property="og:image" content="">
    <meta property="og:url" content="https://kuilinga.tech/">

    <meta name="twitter:card" content="summary_large_image">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <!-- Fin des styles de mise en page -->
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}" />
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <h4 style="font-family: 'aller_displayregular', cursive;  text-transform:uppercase; color: #5a87cc;">ST CAMILLE</h4>
                        </div>
                        <h6 class="font-weight-light">Connectez-vous pour continuer.</h6>

                        <!-- Formulaire de connexion -->
                        <form method="POST" action="{{ route('login') }}" class="pt-3">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Mot de passe" required>
                            </div>
                            <div class="mt-3 d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SE CONNECTER</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" name="remember" class="form-check-input"> Rester connecté
                                    </label>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper se termine -->
    </div>
    <!-- page-body-wrapper se termine -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('backend/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- inject:js -->
<script src="{{ asset('backend/js/off-canvas.js') }}"></script>
<script src="{{ asset('backend/js/misc.js') }}"></script>
<!-- endinject -->
</body>
</html>
