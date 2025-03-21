@extends('tableau.partials.master')

@section('main-content')
    <div class="content-wrapper">
        

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des messages</h4>
                        <div id="table-search"></div> <!-- Div pour le tableau avec recherche -->
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
                    { name: 'Nom' },
                    { name: 'Email' },
                    { name: 'Message' },
                    { name: 'Date' },
                    {
                        name: 'Actions',
                        formatter: (cell, row) => gridjs.html(`
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-primary btn-sm"><i class="mdi mdi-eye">Détails</i></a>
                                <form method="POST" action="/messages/${row.cells[4].data}" class="d-inline">
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
                data: {!! json_encode($messages->map(function($message) {
                    return [
                        $message->username,
                        $message->email,
                        $message->message,
                        $message->created_at->format('d M Y'),
                        $message->id // Vous pouvez utiliser l'ID pour les actions
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
                    text: "Une fois supprimé, vous ne pourrez pas récupérer ce message !",
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
