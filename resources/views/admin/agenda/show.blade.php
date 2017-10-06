@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Evento - {{ $agenda->titulo }}</h3>
            {!!
             Button::normal('Listar eventos')
                    ->appendIcon(Icon::thList())
                    ->asLinkTo(route('admin.agenda.index'))
                    ->addAttributes([
                        'class' => 'hidden-print'
                    ])
             !!}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$agenda->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Titulo</th>
                    <td>{{$agenda->titulo}}</td>
                </tr>
                <tr>
                    <th scope="row">Descricao</th>
                    <td>{{$agenda->descricao}}</td>
                </tr>
                <tr>
                    <th scope="row">Data do evento</th>
                    <td>{{$agenda->dt_evento}}</td>
                </tr>
                <tr>
                    <th scope="row">Horário do evento</th>
                    <td>{{$agenda->hr_evento}}</td>
                </tr>
                <tr>
                    <th scope="row">Local do evento</th>
                    <td>{{$agenda->local}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection