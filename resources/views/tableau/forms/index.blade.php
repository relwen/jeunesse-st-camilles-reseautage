@extends('tableau.partials.master')

@section('main-content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Réponses des formulaires</h4>
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
<link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const data = {!! $formattedResponses !!};

    new gridjs.Grid({
        columns: [
            { id: 'id', name: 'N°', sort: true },
            { id: 'nom', name: 'Nom Prénom(s)', sort: true },
            { id: 'profession', name: 'Profession', sort: true },
            { id: 'besoin', name: 'Type de besoin', sort: true },
            { id: 'date', name: 'Date', sort: true },
            {
                name: 'Action',
                formatter: (_, row) => {
                    const url = `{{ route('form.show', '') }}/${row.cells[0].data}`;
                    const cvUrl = `{{ asset('storage') }}/${row.cells[5].data}`;
                    return gridjs.html(`
                        <div class="btn-group">
                          
                            
                            <a href="${cvUrl}" class="btn btn-sm btn-secondary" title="Télécharger CV" target="_blank">
                                CV
                            </a>
                        </div>
                    `);
                }
            }
        ],
        data: data.map(item => [
            item.id,
            item.fields.nom || '-',
            item.fields.profession || '-',
            item.fields.besoin || '-', 
            item.created_at,
            item.fields.cv_path || '-'
        ]),
        pagination: { limit: 10, enabled: true },
        search: { enabled: true, placeholder: 'Rechercher...' },
        sort: true,
        language: {
            search: { placeholder: 'Rechercher...' },
            pagination: {
                previous: 'Précédent',
                next: 'Suivant',
                showing: 'Affichage de',
                results: () => 'enregistrements',
                of: 'sur',
                to: 'à'
            }
        },
        style: {
            table: { 'white-space': 'normal' },
            td: { 'padding': '10px', 'vertical-align': 'top' }
        }
    }).render(document.getElementById("table-search"));

    

    document.getElementById('exportPDF').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Obtenir l'URL de base pour les CV
    const baseStorageUrl = "{{ url('storage') }}/";

    const tableData = data.map(item => [
        item.id,
        item.fields.nom || '-',
        item.fields.profession || '-',
        item.fields.besoin || '-',
        item.created_at,
        // Créer un lien complet pour le CV
        item.fields.cv_path ? baseStorageUrl + item.fields.cv_path : '-'
    ]);

    doc.text('Liste des candidatures', doc.internal.pageSize.getWidth() / 2, 15, { align: 'center' });

    doc.autoTable({
        head: [['N°', 'Nom complet', 'Profession', 'Type de besoin', 'Date', 'Lien CV']],
        body: tableData,
        startY: 25,
        theme: 'grid',
        styles: { fontSize: 8 },
        margin: { left: 5, right: 5 }, // Réduit les marges pour accueillir la colonne supplémentaire
        columnStyles: {
            0: { cellWidth: 10 },
            1: { cellWidth: 35 },
            2: { cellWidth: 35 },
            3: { cellWidth: 35 },
            4: { cellWidth: 20 },
            5: { cellWidth: 50 } // Colonne pour le lien du CV
        },
        // Configuration des liens cliquables dans le PDF
        didDrawCell: function(data) {
            // Vérifie si c'est une cellule de la colonne "Lien CV" (index 5) et contient une URL
            if (data.column.index === 5 && data.cell.raw && data.cell.raw !== '-') {
                const url = data.cell.raw;
                // Ajout d'un lien cliquable dans le PDF
                doc.link(
                    data.cell.x, 
                    data.cell.y, 
                    data.cell.width, 
                    data.cell.height, 
                    { url: url }
                );
            }
        }
    });

    // Ajouter une note au bas du document expliquant les liens
    const noteY = doc.internal.pageSize.getHeight() - 10;
    doc.setFontSize(8);
    doc.setTextColor(100, 100, 100);
    doc.text('Note: Cliquez sur les liens dans la colonne "Lien CV" pour ouvrir les CV directement', 10, noteY);

    doc.save('liste-candidatures.pdf');
});



});
</script>


@endpush