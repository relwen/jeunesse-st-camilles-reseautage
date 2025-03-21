@extends('tableau.partials.master')

@section('main-content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Réponses des formulaires de demande de badge</h4>
                        <button id="exportPDF" class="btn btn-primary">Exporter en PDF</button>
                    </div>
                    <div id="table-search"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

<script>
document.addEventListener("DOMContentLoaded", function () {
    const data = {!! $formattedResponses !!};
    
    const grid = new gridjs.Grid({
        columns: [
            'ID', 
            'Nom du média',
            'Type de média',
            'Email de contact',
            'Téléphone de contact',
            'Nombre de badges',
            'Date',
            {
                name: 'Action',
                formatter: (_, row) => {
                    const url = `{{ route('accreditation.responses.show', '') }}/${row.cells[0].data}`;
                    return gridjs.html(`
                        <a href="${url}" class="btn btn-sm btn-primary" title="Voir les détails">
                            Voir
                        </a>
                    `);
                }
            }
        ],
        data: data.map(item => [
            item.id,
            item.fields.media_name || '-',
            item.fields.media_type || '-',
            item.fields.contact_email || '-',
            item.fields.contact_phone || 'NA',
            item.fields.badge_count || '-',
            item.created_at
        ]),
        pagination: { limit: 10, enabled: true },
        search: { enabled: true },
        sort: true,
        language: {
            search: { placeholder: 'Rechercher...' },
            pagination: {
                previous: 'Précédent',
                next: 'Suivant',
                showing: 'Affichage de',
                results: () => 'enregistrements'
            }
        },
        style: {
            table: { 'white-space': 'normal' },
            td: { 'padding': '10px' }
        }
    }).render(document.getElementById("table-search"));

    document.getElementById('exportPDF').addEventListener('click', function() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const tableData = data.map(item => [
            item.id,
            item.fields.media_name || '-',
            item.fields.media_type || '-',
            item.fields.contact_email || '-',
            item.fields.contact_phone || 'NA',
            item.fields.badge_count || '-',
            item.created_at
        ]);

        doc.setFontSize(16);
        doc.text('Liste des demandes de badge', 14, 15);

        doc.autoTable({
            head: [['ID', 'Média', 'Type', 'Email', 'Téléphone', 'Badges', 'Date']],
            body: tableData,
            startY: 25,
            theme: 'grid',
            styles: { fontSize: 8 },
            columnStyles: {
                0: { cellWidth: 15 },
                1: { cellWidth: 35 },
                2: { cellWidth: 25 },
                3: { cellWidth: 40 },
                4: { cellWidth: 25 },
                5: { cellWidth: 15 },
                6: { cellWidth: 25 }
            },
            headStyles: { fillColor: [41, 128, 185] }
        });

        doc.save('demandes-badge.pdf');
    });
});
</script>
@endpush