@extends('Admin.layout.adminlayout')

@section('content')
<div class="d-flex justify-content-center flex-column" style="min-width:80vw">

<div class="container ps-5 mt-5" style="max-width:80%">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Store</h4>
          <p class="card-description">
            fill form fields
          </p>
          <form class="forms-sample" method="POST" action="{{ route('storestore') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Rate</label>
              <input type="text" name="rate" class="form-control" id="exampleInputEmail3" placeholder="Rate">
            </div>



            <button type="submit" class="btn btn-primary me-2">Submit</button>
          </form>
        </div>
      </div>

    </div>
</div>
@endsection
