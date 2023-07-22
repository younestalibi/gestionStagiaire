@extends('layouts.layout')

@section('list')
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href={{route('home')}}>Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href={{route('my-notes')}}>Notes</a>
    </li>
</ul>
@endsection
@section('content')
<div class="container">
    <h3>Inormations</h3>
    <div class="card my-3">
        <div class="card-body">
          <h5 class="card-title">{{ auth()->user()->name }}</h5>
          <p class="card-text">Number of Absents: <b>{{ auth()->user()->absence->status }}</b></p>
          <p class="card-text">Code Etudiant: <b>{{ auth()->user()->id }}</b></p>
          <p class="card-text">Email: {{ auth()->user()->email }}</p>
        </div>
      </div>
      
</div>
@endsection
