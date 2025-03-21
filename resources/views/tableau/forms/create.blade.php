@extends('tableau.partials.master')
@section('main-content')
    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-plus-circle me-2"></i> Ajouter une nouvelle ligne de formulaire
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Titre -->
                    <div class="mb-3">
                        <label for="title" class="form-label">
                            <i class="fas fa-heading text-blue-500 me-2"></i>Titre
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Boutons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-undo me-2"></i>Réinitialiser
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus,
        .form-select:focus {
            border-color: #4169E1;
            box-shadow: 0 0 0 0.25rem rgba(65, 105, 225, 0.25);
        }

        .card {
            border-radius: 10px;
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .btn {
            border-radius: 20px;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .btn-primary {
            background-color: #4169E1;
            border-color: #4169E1;
        }

        .btn-primary:hover {
            background-color: #1E90FF;
            border-color: #1E90FF;
        }

        .form-label {
            font-weight: 500;
            color: #4169E1;
        }

        /* Animation des icônes */
        .form-label i {
            transition: transform 0.3s ease;
        }

        .form-label:hover i {
            transform: scale(1.2);
        }
    </style>


@stop
