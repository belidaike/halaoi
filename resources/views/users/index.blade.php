@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-3" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Roles</th>
        <th width="280px" class="text-center">Action</th>
    </tr>
@foreach ($data as $key => $user)
    <tr>
        <td class="align-middle text-center">{{ ++$i }}</td>
        <td class="align-middle text-center">{{ $user->name }}</td>
        <td class="align-middle text-center">{{ $user->email }}</td>
        <td class="align-middle text-center">
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-dark ">{{ $v }}</span>
                @endforeach
            @endif
        </td>
        <td class="align-middle text-center">
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
        </td>
    </tr>
@endforeach
</table>
{!! $data->render() !!}
<p class="text-center text-primary mt-5"><small>Happy</small></p>
@endsection