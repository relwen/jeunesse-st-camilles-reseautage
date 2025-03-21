@extends('tableau.partials.master')


@push('styles')
    <!-- Ajoutez ici vos styles si nécessaire -->
@endpush

@section('main-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account-circle"></i>
                </span> Détails de l'Article
            </h3>
           
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $article->nom_artiste }}</h4>
                        <p><strong>Nom:</strong> {{ $article->nom }}</p>
                        <p><strong>Contact Manageur:</strong> {{ $article->contact_manageur }}</p>
                        <p><strong>Type de prestation:</strong> {{ $article->prestation }}</p>
                        <p><strong>Lien de la prestation:</strong> {{ $article->link }}</p>

                        <p><strong>Date d'Enregistrement:</strong> {{ $article->created_at->format('d M Y') }}</p>

                        <a href="{{route('articles.index')}}" class="btn btn-secondary btn-sm">Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Ajoutez ici vos scripts si nécessaire -->
@endpush
