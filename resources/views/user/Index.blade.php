@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('user.create') }}" title="Create a user"> Add User</i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  <div  class="col-sm-12">
    <table class="table table-bordered table-responsive-lg" width='50px'>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile Number</th>
            <th>Action</th>
        </tr>
        @foreach ($user as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->mobile_number }}</td>
                     <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
							@csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:red;">
                            DELETE

                        </button>
                    </form>
                </td>
                
            </tr>
        @endforeach
    </table>

  </div>

@endsection
