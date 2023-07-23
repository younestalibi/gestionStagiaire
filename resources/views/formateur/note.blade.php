@extends('layouts.layout')

@section('list')
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href={{route('home')}}>Mes-étudiants</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href={{route('absence')}}>List-Absences</a>
    </li>
</ul>
@endsection
@section('content')
<div class="container">
    <h3>Inormations</h3>

    <div class="card my-3">
        <div class="card-body">
          <h5 class="card-title">{{ $user->name }}</h5>
          <p class="card-text">Number of Absents: <b>
            
            @if($user->absence)
            {{ $user->absence->status }}
            @else
            0
            @endif
          </b></p>
          <p class="card-text">Code Etudiant: <b>{{ $user->id }}</b></p>
          <p class="card-text">Email: {{ $user->email }}</p>
        </div>
      </div>
      <h3>Notes</h3>
      <form method="POST" action="{{ route('update-notes',['user'=>$user->id]) }}">
        @csrf
        @method('PUT')
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Math</th>
              <th scope="col">English</th>
              <th scope="col">France</th>
              <th scope="col">Arabe</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>
                  <input type="number" name="math" class="form-control" value="{{ $user->note->math }}" min="0" max="20">
                </td>
                <td>
                  <input type="number" name="english" class="form-control" value="{{ $user->note->english }}" min="0" max="20">
                </td>
                <td>
                  <input type="number" name="france" class="form-control" value="{{ $user->note->france }}" min="0" max="20">
                </td>
                <td>
                  <input type="number" name="arabe" class="form-control" value="{{ $user->note->arabe }}" min="0" max="20">
                </td>
                <td>
                  <button type="submit" class="btn btn-primary">Update</button>
                </td>
              </tr>
              <tr>
                <th>Moyeen</th>
                <td colspan="4" class="text-center text-primary">
                    <b class="">
                        {{$note=($user->note->arabe+$user->note->france+$user->note->english+$user->note->math)/4}}
                        {{-- @if ($note < 10)
                        <p>Failed</p>
                        @elseif ($note == 10)
                            <p>Passable</p>
                        @elseif ($note > 10 && $note <= 14)
                            <p>Assez bien</p>
                        @elseif ($note > 14)
                            <p>Très bien</p>
                        @endif --}}

                    </b>
                </td>
              </tr>
              <tr>
                <td colspan="5" class="text-center ">
                    {{-- <b class=""> --}}
                        @if ($note < 10)
                        <b class="text-danger">Failed</b>
                        @elseif ($note == 10)
                            <b class="text-warning">Passable</b>
                        @elseif ($note > 10 && $note <= 14)
                            <b class="text-primary">Assez bien</b>
                        @elseif ($note > 14)
                            <b class="text-success">Très bien</b>
                        @endif
{{--  --}}
                    {{-- </b> --}}
                </td>
              </tr>
          </tbody>
        </table>
      </form>
      
</div>
@endsection
