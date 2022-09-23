@extends('layouts.app')

@section('conteudo')
    <div class="container">

        <div class="row justify-content-sm-center">
            <div class="col-md-11">
                <div class="col-md-12">
                    <div class="row justify-content-between tituloListagem">
                        <span class="">Biblioteca(s) da {{ $unidade->nome }}</span>
                        <a href="{{ route('cadastro-biblioteca', ['unidade_id' => $unidade->id]) }}">
                            <img src="/images/botao_add.svg" width="37px" style="background-color: var(--textcolor); border-radius: 0.5rem">
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <table class="table table-borderless shadow table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
                    <thead>
                    <tr>
                        <th scope="col" class="titleColumn" >ID</th>
                        <th scope="col" class="titleColumn" style="cursor:pointer">Campus</th>
                        <th scope="col"  class="titleColumn text-center"
                            style="cursor:pointer">Ação</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach($bibliotecas as $biblioteca)
                        @if($biblioteca->unidade_id == $unidade->id)
                            <tr>
                                <td class="align-middle">
                                    {{ $biblioteca->id }}
                                </td>
                                <td class="align-middle">
                                    {{ $biblioteca->nome }}
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route("editar-biblioteca", ['biblioteca_id' => $biblioteca->id]) }}">
                                        <img src="images/botao_editar.svg" height="30px"
                                             title="Botão de Visualizar Ficha">
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>

        $('#table').DataTable({
            searching: true,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "zeroRecords": "Nenhum registro disponível",
                "search": "",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo",
                }
            },
            "dom": '<"top"f>rt<"bottom"p><"clear">',
            "order": [],
            "columnDefs": [{
                "targets": [2],
                "orderable": false
            }]
        });

        $('.dataTables_filter').addClass('here');
        $('.dataTables_filter').addClass('');
        $('.here').addClass('center');
        $('.here').removeClass('dataTables_filter');
        $('.table-hover').removeClass('dataTable');
        $('.here').find('input').addClass('search-input');
        $('.here').find('input').addClass('align-middle');
        $('.here').find('label').contents().unwrap();
        $('.here').find('input').wrap('<div class="col-md-12 my-3 py-1" style="background-color: #C2C2C2; border-radius: 1rem;"> <div class="col-md-7 my-2"> <div class="col-md-12 p-1 img-search" style="background-color: white; border-radius: 0.5rem;"> </div> </div> </div>');
        $('.img-search').prepend('<img src="{{asset('images/search.png')}}" width="25px">');

    </script>
@endsection
