@extends('tableau.partials.master')
@section('main-content')
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between align-items-center">
           
            <!-- Bouton Ajouter -->
            <div>
                <a href="{{ route('articles.create') }}" class="btn btn-gradient-primary">
                    <i class="mdi mdi-plus me-2"></i>Ajouter une actualité
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des actualités</h4>
                        <div id="table-search"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection

@push('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new gridjs.Grid({
                columns: [
                    { name: 'Titre' },
                    {
                        name: 'Image',
                        formatter: (cell) => gridjs.html(`<img src="${cell}" alt="Image" width="50" />`)
                    },
                    { name: 'Contenu' },
                    { name: 'Date de publication' },
                    {
                        name: 'Actions',
                        formatter: (cell, row) => gridjs.html(`
                            <div class="btn-group" role="group">
                                <a href="/articles/${row.cells[4].data}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye">Details</i></a>
                                <form method="POST" action="/articles/${row.cells[4].data}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm dltBtn" data-id="${row.cells[4].data}">
                                        <i class="mdi mdi-delete">Supprimer</i>
                                    </button>
                                </form>
                            </div>
                        `)
                    }
                ],
                pagination: {
                    limit: 5
                },
                search: true, // Activer la recherche
                data: {!! json_encode($articles->map(function($article) {
                    return [
                        $article->title,
                        asset('storage/' . $article->img),
                        $article->content,
                        $article->created_at->format('d M Y'),
                        $article->id 
                    ];
                })) !!}
            }).render(document.getElementById("table-search"));
        });
    
        $(document).ready(function() {
            $('.dltBtn').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: "Êtes-vous sûr ?",
                    text: "Une fois supprimé, vous ne pourrez pas récupérer cet article !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    </script>
    
@endpush
