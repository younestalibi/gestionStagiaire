@extends('layouts.layout')

@section('list')
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href={{route('home')}}>Mes-étudiants</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href={{route('absence')}}>List-Absences</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link active" href={{route('absence')}}>Profile</a>
    </li> --}}
</ul>
@endsection
@section('content')
<div class="container">

      <h3>List Etudiants</h3>
   
        {{-- @method('PUT') --}}
        <table class="table">
          <thead>
            <tr>
                <th scope="col">Code etudiant</th>
                <th scope="col">Name</th>
                <th scope="col">Date d'aujourd'hui</th>
                <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}} 
                    
                    {{-- @if($student->absence()->updated_at->format('Y-m-d')=='2023-07-15')
                    <b>hda</b>
                    @endif --}}
                </td>
                
                <td>{{ date('Y-m-d') }}</td>
                @if($student->absence)
                <td>
                    @if($student->absence->updated_at->format('Y-m-d')==date('Y-m-d')  && $student->absence->updated_at != $student->absence->created_at)
                    <button disabled  class="btn btn-success w-50 mx-auto">Déjà absent</button>
                    @else
                    <form action={{route('absent',['user'=>$student->id])}} method="POST">
                        @csrf 
                        <input type="submit" value="Absent" class="btn btn-outline-success w-50 mx-auto">
                    </form>
                    @endif
                    
                  {{-- <a href={{route('absent')}} class="btn btn-outline-warning">Absent</a> --}}
                </td>
                @else
                <td>
                    <form action={{route('absent',['user'=>$student->id])}} method="POST">
                        @csrf
                        <input type="submit" value="Absent" class="btn btn-outline-success w-50 mx-auto">
                    </form>
                </td>
                @endif
              </tr>
            @endforeach
         
          </tbody>
        </table>
      
</div>
@endsection
