@extends('tableau.partials.master')
@section('main-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span> <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Cards avec icônes d'utilisateur -->
        <div class="container mt-4">
            <div class="row">
                <!-- Card 1 -->
      
                
                
                ^
                <!-- Card 3 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-cog fa-3x text-blue-700 mb-3"></i>
                            <h5 class="card-title">Soumissions</h5>
                            <p class="card-text">{{ count($submissions) }}</p>
                           <a href="{{route('form.index')}}"> <button class="btn btn-primary">
                            <i class="fas fa-wrench mr-2"></i> Détails
                        </button></a>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>

        <style>
            .card {
                transition: transform 0.2s ease-in-out;
            }

            .card:hover {
                transform: translateY(-5px);
            }

            .btn {
                border-radius: 20px;
            }

            .card-body i {
                transition: transform 0.3s ease;
            }

            .card:hover i {
                transform: scale(1.1);
            }

            /* Couleurs personnalisées pour les boutons */
            .btn-outline-primary {
                border-color: #1E90FF;
                color: #1E90FF;
            }

            .btn-outline-primary:hover {
                background-color: #1E90FF;
                color: white;
            }

            .btn-outline-info {
                border-color: #4169E1;
                color: #4169E1;
            }

            .btn-outline-info:hover {
                background-color: #4169E1;
                color: white;
            }

            /* Ombre portée améliorée */
            .shadow-sm {
                box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            }

            /* Animation sur le survol */
            .card {
                transition: all 0.3s ease;
            }

            .card:hover {
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }
        </style>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
@endsection

@push('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dltBtn').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                swal({
                        title: "Êtes-vous sûr ?",
                        text: "Une fois supprimé, vous ne pourrez pas récupérer cet artiste !",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        });
    </script>
@endpush
