@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <form method="POST" action="{{ route('app.fornecedor.listar') }}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="botda-preta">
                    <input type="text" name="site" placeholder="Site" class="botda-preta">
                    <input type="text" name="uf" placeholder="UF" class="botda-preta">
                    <input type="text" name="email" placeholder="Email" class="botda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

@endsection