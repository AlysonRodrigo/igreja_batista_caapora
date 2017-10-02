@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="span3 well">
        <center>
            <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" class="img-circle"></a>
            <h3>{{ $user->name  }}</h3>
            <em>Click na foto para ver detalhes</em>
        </center>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Detalhes sobre, {{ $user->name  }} </h4>
                </div>
                <div class="modal-body">
                    <center>

                        @if($user->images[0] !== null)
                            <img src="{{ url('/uploads/'.$user->images[0]->id.'.'.$user->images[0]->extension) }}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                        @else
                            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                        @endif
                        <h3 class="media-heading">{{ $user->name  }},<small>{{ $user->sexo }}</small></h3>
                        <span><strong>Data de nascimento: </strong></span>
                        <span class="label label-warning">{{ $user->data_nascimento->format('d/m/Y') }}</span>
                    </center>
                    <hr>
                    <center>
                        <p class="text-left"><strong>Informação de endereço: </strong><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                        <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-center">
            {!! Button::primary('Voltar')->asLinkTo(route('admin.users.index'))->block() !!}
        </div>

    </div>
</div>
@endsection
