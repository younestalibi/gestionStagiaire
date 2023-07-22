@extends('layouts.layout')

@section('list')
<style>
  #search-container{
    position: relative;
  }
  #searchResults{
    position: absolute;
    width: 100%;
  }
  #searchResults li{

    cursor: pointer;
    /* padding: ; */
  }
  #searchResults li:hover{
    background-color:rgb(218, 218, 218); 
  }
</style>
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
  <h2 class="my-3">List des Etudiants</h2>
  <div class="container">
    <h3 class="my-3 text-muted">Search</h3>
    <div class="input-group mb-3">
      <input type="text" id="searchInput" class="form-control" placeholder="Search students...">
      {{-- <button id="search" class="btn btn-primary">Search</button> --}}
    </div>
    <div id="search-container">
      <ul id="searchResults"  class="list-group">

      </ul>
    </div>
  </div>
  
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
          <tr>
            <th scope="row">{{$student->id}}</th>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>
              <a href={{route('student-notes',['user'=>$student->id])}} class="btn btn-outline-primary">Details</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $students->links('pagination::bootstrap-4') }}
      </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 
<script>
var searchInput = document.getElementById('searchInput');
var searchResults = document.getElementById('searchResults');

searchInput.addEventListener('input', function () {
  var query = searchInput.value;
  console.log(query);

  axios.get(`/search?name=${query}`)
    .then((response) => {
      searchResults.innerHTML = ''; // Clear previous results

      response.data.forEach((result) => {
        console.log(result)
        var listItem = document.createElement('li');
        // listItem.textContent = result.name;
        // searchResults.appendChild(listItem);

        listItem.classList.add('list-group-item'); // Add Bootstrap class


        var a=document.createElement('a');
        a.innerHTML=`${result.name} | Code Etudiant: ${result.id}`;
        a.setAttribute('href',`/home/note/${result.id}`);
        listItem.appendChild(a);

        searchResults.appendChild(listItem);

      });
    })
    .catch((error) => {
      console.log(error);
    });
});



</script>
<script>
  axios.get('/search?name=younes').then((dat)=>{
    console.log(dat)
  }).catch(ee=>console.log(ee))
//   alert('hello')
//     $(function(){
//       $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

      // alert('hel')



        // $('#search').on('click', function () {
          console.log('hel')
            var searchTerm = $(this).val();


        // $.ajax({
        //         url: '/search',
        //         method: 'get',
        //         data: { name: searchTerm },
        //         success: function (response) {
        //           console.log(response)
        //             // var resultsContainer = $('#searchResults');
        //             // resultsContainer.empty();
                    
        //             // $.each(response, function (index, product) {
        //             //     var listItem = $('<li>').text(product.name);
        //             //     resultsContainer.append(listItem);
        //             // });
        //         },
        //         error: function (xhr, status, error) {
        //             console.log(error);
        //         }
        //     });
        // });



    // });/
</script>
@endsection
