@extends('layouts.admin')

@section('content')

    <div class="container">


        <div class="row">
            <div class="col-md-9">
                <h3>
                    Aniversariante do Mês de {{ date('m') }}</h3>
            </div>
        </div>


        @foreach($users->items() as $user)

            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-3">
                        <div class="col-item">
                            <div class="photo">

                                @if(count($user->images))
                                    <img src="{{ url('/uploads/'.$user->images[0]->id.'.'.$user->images[0]->extension) }}"
                                         name="aboutme" class="img-responsive"></a>
                                @else
                                    <img src="{{ url('/uploads/profile.gif') }}"
                                         name="aboutme" class="img-responsive"></a>
                                @endif
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price col-md-6">
                                        <h5>
                                            {{ $user->name }}</h5>
                                        <h5 class="price-text-color">
                                            {{ $user->data_nascimento }}</h5>
                                    </div>
                                    <div class="rating hidden-sm col-md-6">
                                        <i class="price-text-color fa fa-star"></i><i
                                                class="price-text-color fa fa-star">
                                        </i><i class="price-text-color fa fa-star"></i><i
                                                class="price-text-color fa fa-star">
                                        </i><i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="separator clear-left">
                                    <p class="btn-add">
                                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com"
                                                                              class="hidden-sm">Add to cart</a></p>
                                    <p class="btn-details">
                                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com"
                                                                     class="hidden-sm">More
                                            details</a></p>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endsection
