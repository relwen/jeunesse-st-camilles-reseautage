@extends('tableau.partials.master')


@section('main-content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card detail-card p-3">
                <div class="detail-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Détails de la réponse #{{ $response['id'] }}</h3>
                        <span class="badge badge-primary">{{ $response['created_at'] }}</span>
                    </div>
                </div>

                <div class="detail-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <span class="info-label"><strong>Nom & Prénom(s) :</strong></span>
                                <span class="info-value">{{ $response['fields']['name'] ?? '-' }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="info-label"><strong>Email :</strong></span>
                                <span class="info-value">{{ $response['fields']['email'] ?? '-' }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="info-label"><strong>Téléphone :</strong></span>
                                <span class="info-value">{{ $response['fields']['phone'] ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <span class="info-label"><strong>Ville:</strong></span>
                                <span class="info-value">{{ $response['fields']['city'] ?? '-' }}</span>
                            </div>
                            <div class="detail-item mt-2">
                                <span class="info-label"><strong>Catégories:</strong></span>
                                <div class="mt-1">
                                    @if(isset($response['fields']['categories']) && is_array($response['fields']['categories']))
                                        <ul style="list-style-type: disc; padding-left: 20px;">
                                            @foreach($response['fields']['categories'] as $category)
                                                <li>{{ $category }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="info-value">-</span>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    @if(isset($response['fields']['comments']) && !empty($response['fields']['comments']))
                        <div class="mt-1">
                            <h5 class="mb-2"><strong>Commentaires :</strong></h5>
                            <div class="comments-section mb-3">
                                {{ $response['fields']['comments'] }}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="detail-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('form.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
                        </a>
                        <div>
                            <button class="btn btn-primary" onclick="window.print()">
                                <i class="fas fa-print mr-2"></i>Imprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection