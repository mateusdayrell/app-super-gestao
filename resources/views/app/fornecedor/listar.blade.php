@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <body>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></td>
                            </tr>
                        @endforeach
                    </body>
                </table>

                {{ $fornecedores->appends($request)->links() }}
                <br>
                {{ $fornecedores->count()  }} - total pagina
                <br>
                {{ $fornecedores->count() }} - total consulta
                <br>
                Exibindo {{$fornecedores->count()}} {{ $fornecedores->count() > 1 ? 'Fonecedores' : 'Fornecedor' }} de {{$fornecedores->total()}} ( {{$fornecedores->firstItem()}} - {{$fornecedores->lastItem()}})
            </div>
        </div>
    </div>

@endsection