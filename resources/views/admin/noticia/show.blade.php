@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Titulo - {{ $noticia->titulo }}</h3>
            {!!
             Button::normal('Listar noticias')
                    ->appendIcon(Icon::thList())
                    ->asLinkTo(route('admin.noticia.index'))
                    ->addAttributes([
                        'class' => 'hidden-print'
                    ])
             !!}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $noticia->id }} </td>
                </tr>
                <tr>
                    <th scope="row">Titulo</th>
                    <td>{{ $noticia->titulo }}</td>
                </tr>
                <tr>
                    <th scope="row">Descricao</th>
                    <td>{{ $noticia->descricao }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection