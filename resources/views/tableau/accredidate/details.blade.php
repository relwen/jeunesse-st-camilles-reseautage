@extends('tableau.partials.master')

@section('main-content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card detail-card p-3">
                <div class="detail-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Détails de la demande de badge #{{ $response['id'] }}</h3>
                        <span class="badge badge-primary">{{ $response['created_at'] }}</span>
                    </div>
                </div>

                <div class="detail-content mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <span class="info-label"><strong>Nom du média :</strong></span>
                                <span class="info-value">{{ $response['fields']['media_name'] ?? '-' }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="info-label"><strong>Type de média :</strong></span>
                                <span class="info-value">{{ $response['fields']['media_type'] ?? '-' }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="info-label"><strong>Email de contact :</strong></span>
                                <span class="info-value">{{ $response['fields']['contact_email'] ?? '-' }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="info-label"><strong>Téléphone de contact :</strong></span>
                                <span class="info-value">{{ $response['fields']['contact_phone'] ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <span class="info-label"><strong>Nombre de badges demandés :</strong></span>
                                <span class="info-value">{{ $response['fields']['badge_count'] ?? '-' }}</span>
                            </div>
                            <div class="detail-item mt-2">
                                <span class="info-label"><strong>Date de soumission :</strong></span>
                                <span class="info-value">{{ $response['created_at'] }}</span>
                            </div>
                        </div>
                    </div>

                    @if(isset($response['fields']['comments']) && !empty($response['fields']['comments']))
                        <div class="mt-3">
                            <h5 class="mb-2"><strong>Commentaires :</strong></h5>
                            <div class="comments-section">
                                {{ $response['fields']['comments'] }}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="detail-footer mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('accreditation.index') }}" class="btn btn-secondary">
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
