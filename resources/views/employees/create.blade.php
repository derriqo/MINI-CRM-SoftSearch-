@extends ('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a employee</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="POST" action="/companies">
      {{ csrf_field() }}
          <div class="form-group">    
              <input type="text" class="form-control" name="first_name" placeholder="First Name"/>
          </div>
          <div class="form-group">    
              <input type="text" class="form-control" name="last_name" placeholder="Last Name"/>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="email"placeholder="Email"/>
          </div>
          <div class="form-group">
              <input type="integer" class="form-control" name="logo" placeholder="Phone Number"/>
          </div>
                          
          <button type="submit" class="btn btn-primary-outline">Add Employee</button>
      </form>
  </div>
</div>
</div>
@endsection