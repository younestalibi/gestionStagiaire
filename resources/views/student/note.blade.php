@extends('layouts.layout')

@section('list')
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href={{route('home')}}>Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href={{route('my-notes')}}>Notes</a>
    </li>
</ul>
@endsection
@section('content')
<div class="container">
    
      <h3>Notes</h3>
    
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Math</th>
              <th scope="col">English</th>
              <th scope="col">France</th>
              <th scope="col">Arabe</th>
              {{-- <th scope="col">Action</th> --}}
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>
                  {{ auth()->user()->note->math }}
                </td>
                <td>
                  {{ auth()->user()->note->english }}
                </td>
                <td>
                  {{ auth()->user()->note->france }}
                </td>
                <td>
                  {{ auth()->user()->note->arabe }}
                </td>
                {{-- <td>
                  <button type="submit" class="btn btn-primary">Update</button>
                </td> --}}
              </tr>
              <tr>
                <th>Moyeen</th>
                <td colspan="4" class="text-center text-primary">
                    <b class="">
                        {{$note=(auth()->user()->note->arabe+auth()->user()->note->france+auth()->user()->note->english+auth()->user()->note->math)/4}}
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
      {{-- </form> --}}
      
</div>
@endsection
