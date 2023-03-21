@extends('Admin.layout.adminlayout')

@section('content')




<div class="d-flex flex-column align-items-center pt-5 ps-5 mt-5" style="min-width:100%">
    <div class="d-flex mb-3 " style="width:100%">
        <a href="{{route('adduser')}}" class="btn btn-success me-3"> Add User</a>

    </div>
    <table class="table table-striped">
        <thead>
          <tr>
              <th>
                   Name
                </th>

                <th>
            Email
                 </th>


            <th>
             Delete
            </th>


          </tr>
        </thead>
        <tbody>
@foreach ($users as $user )
    <tr>
        <td>
{{$user->name}}
        </td>

        <td>
            {{$user->email}}
        </td>




<td>
    <form action="{{route('deleteuser',$user->id)}}" method="post">
        @csrf
        @method('DELETE')
    <button type="submit" class="btn btn-outline-danger" >Delete</button>
</form>
</td>
    </tr>
@endforeach

    </tbody>
      </table>



</div>
@endsection
