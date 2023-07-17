@extends('layouts.index')

@section('content')
@if (Route::has('login'))
    <b class="lead my-4">Bienvenue sur votre plateforme de gestion et de suivi de vos stagiaires</b>
    @auth
        <a href="{{ url('/home') }}" class="button text-center bg-white">Home</a>
    @else
        <a href="{{ route('login') }}" class="button text-center bg-white">Connexion</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="button text-center bg-white">S'inscrire</a>
        @endif
        @if(request()->is('/'))
            <a href="{{ url('/formateur') }}" class="underline text-primary"><b>Formateur</b></a>
        @endif
    @endauth  

@endif           
@endsection