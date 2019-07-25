@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Employees</h1>   
    <div>
    <a style="margin: 19px;" href="{{ route('employees.create')}}" class="btn btn-primary">New employee</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td></td>
          <td>Employee Name</td>
          <td>Email</td>
          <td>Logo</td>
          <td>Website</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @php
          $employeeId = 1;
        @endphp
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employeeId++ }}</td>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>{{$employee->phone_number}}</td>
            <td>{{$employee->email}}</td>
            <td>    <a href="/create/{{$employee->id}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('employees.destroy', $employee->id)}}" method="POST">
                {{ csrf_field() }}
                  <a href="/destroy/{{$employee->id}}" class="btn btn-danger">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection