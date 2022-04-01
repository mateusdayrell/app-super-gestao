@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adcionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg }}
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <form method="POST" action="{{ route('app.fornecedor.adicionar') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    <input type="text" value="{{ $fornecedor->nome ?? old('nome')  }}" name="nome" placeholder="Nome" class="botda-preta">
                    {{  $errors->has('nome') ? $errors->first('nome') : ''  }}

                    <input type="text" value="{{ $fornecedor->site ?? old('site')  }}" name="site" placeholder="Site" class="botda-preta">
                    {{  $errors->has('site') ? $errors->first('site') : ''  }}

                    <input type="text" value="{{ $fornecedor->uf ?? old('uf')  }}" name="uf" placeholder="UF" class="botda-preta">
                    {{  $errors->has('uf') ? $errors->first('uf') : ''  }}

                    <input type="text" value="{{ $fornecedor->email ?? old('email')  }}" name="email" placeholder="Email" class="botda-preta">
                    {{  $errors->has('email') ? $errors->first('email') : ''  }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection