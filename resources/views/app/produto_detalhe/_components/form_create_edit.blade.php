@if (isset($produtoDetalhe->id))
    <form method="POST" action="{{ route('produto-detalhe.update', ['produtoDetalhe' => $produtoDetalhe->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="POST" action="{{ route('produto-detalhe.store') }}">
        @csrf
@endif

        <input type="text" value="{{ $produtoDetalhe->produto_id ?? old('produto_id')  }}" name="produto_id" placeholder="ID do produto" class="botda-preta">
        {{  $errors->has('produto_id') ? $errors->first('produto_id') : ''  }}

        <input type="text" value="{{ $produtoDetalhe->comprimento ?? old('comprimento')  }}" name="comprimento" placeholder="Comprimento" class="botda-preta">
        {{  $errors->has('comprimento') ? $errors->first('comprimento') : ''  }}

        <input type="text" value="{{ $produtoDetalhe->altura ?? old('altura')  }}" name="altura" placeholder="Altura" class="botda-preta">
        {{  $errors->has('altura') ? $errors->first('altura') : ''  }}

        <input type="text" value="{{ $produtoDetalhe->largura ?? old('largura')  }}" name="largura" placeholder="Largura" class="botda-preta">
        {{  $errors->has('largura') ? $errors->first('largura') : ''  }}

        <select name="unidade_id" class="botda-preta">
            <option value="">-- Selecione a Unidade de Medida --</option>
            @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ $produtoDetalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>