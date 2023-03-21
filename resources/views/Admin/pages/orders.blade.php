@extends('Admin.layout.adminlayout')

@section('content')
<div class="d-flex flex-column align-items-center pt-5 ps-5 mt-5" style="min-width:100%">

<table class="table table-striped">
    <thead>
      <tr>
          <th>
               Name
            </th>

            <th>
        description
             </th>


        <th>
amount        </th>
<th>
   state       </th>

      </tr>
    </thead>
    <tbody>
@foreach ($orders as $order )
<tr>
    <td>
{{$order->name}}
    </td>

    <td>
        {{$order->description}}
    </td>

    <td>
        {{$order->amount}}
    </td>


<td>
<form action="{{route('changestate',$order->id)}}" method="post">
    @csrf
  @if($order->State=='pending')
  <button type="submit" class="btn btn-outline-warning" >pending</button>

  @else
  <button type="submit" class="btn btn-outline-success" >Completed</button>

  @endif
</form>
</td>
</tr>
@endforeach

</tbody>
  </table>



</div>


@endsection
