<h1>Fornecedor</h1>

{{-- Isso é um comentário do blade --}}

@php
   // comentário do PHP
   /* 
   comentário do PHP 
   */
@endphp  

{{-- @isset($fornecedores)
    @for ($i = 0; @isset($fornecedores[$i]); $i++)
        Nome: {{ $fornecedores[$i]['nome'] }} 
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'O dado não foi preenchido' }}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? ' ' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <br>
        @switch($fornecedores[$i]['ddd'])
            @case('11')
                Sao Paulo - SP
                @break
            @case('21')
                Rio de Janeiro - RJ
                @break
            @case('38')
                Montes Claros - MG
                @break
            @case('85')
                Fortaleza - CE
                @break
            @default
                Estado não identificado
        @endswitch
        <hr>
    @endfor
@endisset --}}

@isset($fornecedores)
    @forelse( $fornecedores as $indice => $fornecedor )
        Iteração atual: {{ ( $loop->iteration ) }} <br>
        Nome: {{ $fornecedor['nome'] }} 
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'O dado não foi preenchido' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ' ' }}) {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if ($loop->first)
            This is the first iteration
        @elseif($loop->last)
            This is the last iteration <br>
            Total: {{ $loop->count }}
        @endif
        <br>
        <hr>
        @empty
        O array é vazio!!!
    @endforelse
@endisset

    
