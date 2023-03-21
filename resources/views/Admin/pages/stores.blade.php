@extends('Admin.layout.adminlayout')

@section('content')



<div class="d-flex flex-column align-items-center pt-5 ps-5 mt-5" style="min-width:100%">
    <div class="d-flex mb-3 " style="width:100%">
        <a href="{{route('addstore')}}" class="btn btn-success me-3"> Add Store </a>

    </div>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>
                Id
                     </th>
              <th>
                   Name
                </th>
                <th>
                    Rate
                 </th>



            <th>
             Delete
            </th>


          </tr>
        </thead>
        <tbody>
@foreach ($stores as $user )
    <tr>
        <td>
            {{$user->id}}
        </td>
        <td>
{{$user->name}}
        </td>

        <td>
            {{$user->rate}}
                    </td>




<td>
    <form action="{{route('deletestore',$user->id)}}" method="post">
        @csrf
        @method('DELETE')
    <button type="submit" class="btn btn-outline-danger" >Remove</button>
</form>
</td>
<td>
    <button onclick="showrate({{$user->id}});" class="btn btn-outline-warning"  id="rate">SetRate</button>

</td>
    </tr>
@endforeach

    </tbody>
      </table>



</div>
<div class="pt-3" style="position: absolute;display:none;flex-direction:column;    transition-duration: 2s;
transition-timing-function: linear;
transition-delay: .3s;width:100vw;height:100vh;top:0;left:0;background-color:rgba(0, 0, 0, 0.8);align-items:center;justify-content:center;    " id="divcont" >

<div style="display:flex;align-items:center;justify-content:center;" >
    <form action="" method="POST" id="myDiv" >
        @csrf
        <h3 class="text-center" >Input Rate</h3>
<input type="text" id="myInput" style="display: none" name="id">
        <input type="text" class="search" name="rate" >
        <button type="submit" class="btn btn-success"> Set </button>
        </form>
</div>

</div>

<script>
    // Get the div element
    const myDiv = document.getElementById("myDiv");
    const rate = document.getElementById("rate");

    const divcont = document.getElementById("divcont");


    // Add a click event listener to the document
    document.addEventListener("click", (event) => {
      // Check if the clicked element is inside the div
      if (!myDiv.contains(event.target) && !rate.contains(event.target)) {
        // If not, hide the div
        divcont.style.display = "none";
      }
    });

    function showrate(id){

        myDiv.setAttribute("action", "{{route('setrate')}}");
        const myInput = document.getElementById("myInput");

// Set the value of the input field
myInput.value = id;
divcont.style.display = "flex";



    }
  </script>
@endsection
