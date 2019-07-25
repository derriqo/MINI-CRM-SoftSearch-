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
          <td>ID</td>
          <td>Company Name</td>
          <td>Email</td>
          <td>Logo</td>
          <td>Website</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @php
          $companyId = 1;
        @endphp
        @foreach($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{$company->company_name}}</td>
            <td>{{$company->email}}</td>
            <td><img src="{{ url('storage/app/public',$company->logo)}}"/></td>
            <td>{{$company->website}}</td>
            <td>    <a href="/companies/{{$company->id}}/edit" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('companies.destroy', $company->id)}}" method="POST">
                {{ csrf_field() }}
                  <a href="/destroy/{{$company->id}}" class="btn btn-danger">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection