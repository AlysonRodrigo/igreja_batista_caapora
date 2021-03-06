@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="span3 well">
            <center>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                    @if(count($user->images))
                        <img src="{{ url('/uploads/'.$user->images[0]->id.'.'.$user->images[0]->extension) }}"
                             name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                @else
                    <img src="{{ url('/uploads/profile.gif') }}"
                         name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    @endif
                    </a>
                    <h3>{{ $user->name  }}</h3>
                    <em>Click na foto para ver detalhes</em>
            </center>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="myModalLabel">Detalhes sobre, {{ $user->name  }} </h4>
                    </div>
                    <div class="modal-body">
                        <center>
                            @if(count($user->images))
                                <img src="{{ url('/uploads/'.$user->images[0]->id.'.'.$user->images[0]->extension) }}"
                                     name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                            @else
                                <img src="{{ url('/uploads/profile.gif') }}"
                                     name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                            @endif
                            <h3 class="media-heading">{{ $user->name  }},
                                <small>{{ $user->sexo }}</small>
                            </h3>
                            <span><strong>Data de nascimento: </strong></span>
                            <span class="label label-warning">{{ $user->data_nascimento->format('d/m/Y') }}</span>
                        </center>
                        <hr>
                        <center>
                            <p class="text-left"><strong>Informação de endereço: </strong><br>
                                @if($user->profile == null)
                                    {{ "Nenhum registro de endereço encontrado!" }}
                                @else
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th scope="row">UF</th>
                                            <td>{{$user->profile->uf}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">CEP</th>
                                            <td>{{$user->profile->cep}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">CIDADE</th>
                                            <td>{{$user->profile->cidade}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">RUA</th>
                                            <td>{{$user->profile->rua}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NUMERO</th>
                                            <td>{{$user->profile->numero}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif

                                </p>
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
            <br/>
            <div class="text-center">
                {!!
                    Button::danger('Remover')
                     ->asLinkTo(route('admin.users.destroy', ['user' => $user->id]))
                     ->block()->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])

                !!}
            </div>
            <?php

              $formDelete = FormBuilder::plain([
                  'id' => 'form-delete',
                  'route' => ['admin.users.destroy','user' => $user->id],
                  'method' => 'DELETE',
                  'style' => 'display:none'
              ]) ?>
            {!! form($formDelete) !!}
        </div>
    </div>
@endsection
