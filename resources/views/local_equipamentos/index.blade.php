@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Cadastro de Local de Equipamento
                       <a href="local_equipamentos/create" class="pull-right" ><i class="fa fa-fw fa-plus"></i>Adicionar</a>
                    </div>
                    <div class="panel-body">
                        @if (count($local_equipamentos) > 0)
                        <table class="table table-striped local_equipamento-table">
                            <thead>
                                <th>Nome</th>
                                <th>Ativo</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($local_equipamentos as $local_equipamento)
                                    <tr>
                                        <td class="table-text"><div>{{ $local_equipamento->nome }}</div></td>
                                        <td class="table-text"><div>{{ $local_equipamento->active?'Sim':'Não' }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <a class="btn btn-small btn-info pull-left " href="{{ route('local_equipamentos.edit', $local_equipamento->id) }} "><i class="fa fa-pencil fa-btn"></i>Editar</a>
                                        </td>
                                        <td>
                                            @if ($local_equipamento->canDelete())
                                            <form action="/local_equipamentos/{{ $local_equipamento->id }}" method="POST" class="pull-left" >
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-local_equipamento-{{ $local_equipamento->id }}" class="btn btn-danger btn-delete">
                                                    <i class="fa fa-btn fa-trash"></i>Excluir
                                                </button>
                                                
                                            </form>
                                            @else
                                                <button type="button" class="btn btn-no-delete">
                                                    <i class="fa fa-btn fa-trash"></i>Excluir
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div>Não há registros</div>
                        @endif

                    </div>
                </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.btn-delete').on('click', function() {
             if(!confirm('Confirma a exclusão?')){
                 return false;
             }
        });
        $('.btn-no-delete').on('click', function() {
             alert("Esse registro já foi utilizado e não pode mais ser excluído.");
        });
});
</script>
@endpush