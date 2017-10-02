@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            {!!
            \Panel::primary()->withHeader('Aniversariantes do mês')
                            ->withBody('Panel body')

         !!}
        </div>

        <div class="col-md-4">
            {!!
            \Panel::primary()->withHeader('Quantidade de membros')
                            ->withBody('Panel body')

         !!}
        </div>

        <div class="col-md-4">
            {!!
            \Panel::primary()->withHeader('Eventos')
                            ->withBody('Panel body')

         !!}
        </div>

    </div>
</div>
@endsection
