@extends('layouts.app')

@section('content')

<div class="box-header with-border">
	<h3 class="box-title"><strong> Users manage</strong></h3>
	<div class="add">
	<a href="/adduser" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-plus"></i> New user</a>
    </div>
<!-- форма список ролей для фильтрации пользователей-->
    <div class="pull-right">	
        <form class="form-inline" action="{{ url('userByrole') }}" method="POST">
            @csrf			        
            <div class="form-group">
            <label>Role:</label>
            <select class="form-control input-sm" name="role" onChange=submit();  >	
                    <option value="0">All</option>
                    @foreach ($roles as $role) 						
                        <option value="{{$role}}"
                        @if(isset($selectRole) && $role==$selectRole)
                            selected
                        @endif
                    >{{$role}}</option>						
                    @endforeach
                        
                </select>
            </div>        	
        </form>    
    </div>
</div>
<div class="box-body">
    @if(count($users ?? '') > 0)
    <table class="table table-bordered">
        <thead>
            <th width=3%>N/#</th>
            <th width="20%">email</th>
            <th>Role</th>
            <th>Name</th>
            <th>Date Update</th>
            <th>Tools</th>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->updated_at->format('d.m.Y') }}</td>
                <td>
                    <a href="{{url('edituser/'. $user->id)}}" class='btn btn-success btn-sm edit btn-flat'><i class="fa fa-edit"></i>Edit</a>
                    <!-- <a href="{{url('deleteuser/'. $user->id)}}" class='btn btn-danger btn-sm delete btn-flat'><i class="fa fa-trash"></i>Delete</a> -->
                </td>                        
            </tr>

        @endforeach
        </tbody>
    </table>
    @else
        <p>Data not found </p>
    @endif
</div>
@endsection