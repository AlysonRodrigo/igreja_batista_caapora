@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        {!! \Button::primary('Cadastrar agenda')->asLinkTo(route('admin.agenda.create')) !!}
        <?php $icon = Icon::create('floppy-disk') ?>
        {!! \Table::withContents($agendas->items())
            ->striped()
             ->callback('Ações', function ($field,$model){
                 $linkEdit = route('admin.agenda.edit',['agenda' => $model->id]);
                 $linkShow = route('admin.agenda.show',['agenda' => $model->id]);
                 return Button::link(Icon::create('pencil') .' Editar')->asLinkTo($linkEdit).'|'.
                           Button::link(Icon::create('folder-open') .'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
             }) !!}
    </div>
    <div class="text-center">
    {!! $agendas->links() !!}
    </div>
</div>
@endsection
