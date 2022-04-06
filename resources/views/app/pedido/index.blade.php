@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente ID</th>
                            <th>Produto</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <body>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adcionar Produtos</a></td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" method="POST" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </body>
                </table>

                {{ $pedidos->appends($request)->links() }}
                <br>
                {{ $pedidos->count()  }} - total pagina
                <br>
                {{ $pedidos->count() }} - total consulta
                <br>
                Exibindo {{$pedidos->count()}} {{ $pedidos->count() > 1 ? 'Fonecedores' : 'Fornecedor' }} de {{$pedidos->total()}} ( {{$pedidos->firstItem()}} - {{$pedidos->lastItem()}})
            </div>
        </div>
    </div>

@endsection