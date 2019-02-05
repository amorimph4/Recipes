@component('admin.layout.elements.body')
    @slot('title')   Criar Receita <a href="{{ route('recipe.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>  @endslot
    @slot('description') Administração de computadores @endslot
    
    @if(Session::has('sucess'))
        <p class="alert alert-info">{{ Session::get('sucess') }}</p>
    @elseif (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif

    <table id="recipes-table" >
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Ingredientes</th>
            <th>Método de Preparo</th>
            <th class="text-right" style="width: -100px !important;">ações</th>
        </tr>

        </thead>
        <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{ $page->title ?? '' }}</td>
            <td>{{ $page->ingredients ?? '' }}</td>
            <td>{{ $page->method_preparation ?? '' }}</td>
            <td class="">
                <a href="{{ route('recipe.edit', $page->id) }}" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a class="btn btn-danger" href="#" onclick="event.preventDefault();if(confirm('Deseja mesmo excluir ?')){document.getElementById('delete-form').submit();}">
                        X
                </a>

                <form id="delete-form" action="{{ route('recipe.delete', $page->id) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form></li>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

<script type="text/javascript">
	$(document).ready(function () {
		var options = {
		    "searching": true,
		    "pagingType": "full_numbers",
		    "pageLength": 10,
		    "lengthChange": false,
		    "language": {
		        "sEmptyTable": "Nenhum registro encontrado",
		        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
		        "sInfoPostFix": "",
		        "sInfoThousands": ".",
		        "sLengthMenu": "_MENU_ resultados por página",
		        "sLoadingRecords": "Carregando...",
		        "sProcessing": "Processando...",
		        "sZeroRecords": "Nenhum registro encontrado",
		        "sSearch": "Pesquisar",
		        "oPaginate": {
		            "sNext": "Próximo",
		            "sPrevious": "Anterior",
		            "sFirst": "Primeiro",
		            "sLast": "Último"
		        },
		        "oAria": {
		            "sSortAscending": ": Ordenar colunas de forma ascendente",
		            "sSortDescending": ": Ordenar colunas de forma descendente"
		        }
		    },
		    "ordering": true
		};

	    $('#recipes-table').DataTable(options);
    });
</script>
@endcomponent
