@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        {!! \Button::primary('Cadastrar noticia')->asLinkTo(route('admin.noticia.create')) !!}
        <?php $icon = Icon::create('floppy-disk') ?>
        {!! \Table::withContents($noticias->items())
            ->striped()
             ->callback('Ações', function ($field,$model){
                 $linkEdit = route('admin.noticia.edit',['noticia' => $model->id]);
                 $linkShow = route('admin.noticia.show',['noticia' => $model->id]);
                 return Button::link(Icon::create('pencil') .' Editar')->asLinkTo($linkEdit).'|'.
                           Button::link(Icon::create('folder-open') .'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
             }) !!}
    </div>
    <div class="text-center">
    {!! $noticias->links() !!}
    </div>
</div>
@endsection
