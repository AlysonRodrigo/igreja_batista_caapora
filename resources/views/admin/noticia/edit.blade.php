@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-12">
                <h3>Editar noticia</h3>
                {!!
                form($form->add('edit','submit',[
                   'attr' => ['class' => 'btn btn-primary btn-block'],
                   'label' => Icon::create('floppy-disk') .'&nbsp;&nbsp;Editar noticia'
                ]))
                 !!}
            </div>
    </div>
</div>
@endsection
