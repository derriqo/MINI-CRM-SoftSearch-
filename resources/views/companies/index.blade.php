@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Companies</h1>   
    <div>
    <a style="margin: 19px;" href="{{ route('companies.create')}}" class="btn btn-primary">New company</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Company Name</td>
          <td>Email</td>
          <td>Logo</td>
          <td>Website</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->company_name}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->logo}}</td>
            <td>{{$company->website}}</td>
            <td>
                <a href="{{ route('companies.edit',$company->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
<div>
</div>
@endsection