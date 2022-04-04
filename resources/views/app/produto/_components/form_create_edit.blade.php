@if (isset($produto->id))
    <form method="POST" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="POST" action="{{ route('produto.store') }}">
        @csrf
@endif

        <input type="text" value="{{ $produto->nome ?? old('nome')  }}" name="nome" placeholder="Nome" class="botda-preta">
        {{  $errors->has('nome') ? $errors->first('nome') : ''  }}

        <input type="text" value="{{ $produto->descricao ?? old('descricao')  }}" name="descricao" placeholder="Descrição" class="botda-preta">
        {{  $errors->has('descricao') ? $errors->first('descricao') : ''  }}

        <input type="text" value="{{ $produto->peso ?? old('peso')  }}" name="peso" placeholder="Peso" class="botda-preta">
        {{  $errors->has('peso') ? $errors->first('peso') : ''  }}

        <select name="unidade_id" class="botda-preta">
            <option value="">-- Selecione a Unidade de Medida --</option>
            @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>