@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a company</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="POST" action="/companies/{{$company->id}}">
        {{ csrf_field() }}
            <div class="form-group">

                <label for="company_name">Company Name:</label>
                <input type="text" class="form-control" name="company_name" value={{ $company->company_name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $company->email }} />
            </div>
            <div class="form-group">
                <label for="logo">Logo:</label>
                <input type="file" accept="image/*" class="form-control" name="logo" value={{ $company->city }} />
            
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" name="website" value={{ $company->country }} />
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection