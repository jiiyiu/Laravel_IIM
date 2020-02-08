<!-- TODO Etendre le layout "app" -->
@extends('layouts.app')
<!-- TODO Dans la séction "content", ajouter un container, et dans ce container faire une liste des users et de leur nombre de contacts-->
@section('content')

    <div class="container">

         @if(count($users)>0)

        @foreach($users as $user)

        <p>L'utilisateur {{ $user->name }} à {{ $user->contacts->count() }} contact</p>

         @endforeach

        @else
        <!-- OU -->
        <p>Il n'y a pas encore d'utilisateur</p>
     @endif
    </div>
@endsection
