@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header">Dashboard</div>
                <div class="card-header">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can('control')
                        <div class="row">
                            <div class="col-8">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Role</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\User::all() as $user)
                                        @foreach($user->roles as $role)
                                            <tr>
                                                <td>{{ $user->first_name . " " . $user->last_name }}</td>

                                                <td class="text-capitalize">{{ $role->name }}</td>

                                                <td>
                                                    <a class="btn btn-danger" href="{{ route('home.reassign', ['user_id' => $user->id,'role_id' => $role->id]) }}">Delete Role</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                @isset($reassignMessage)
                                    <div class="text-success text-lg-center text-capitalize">
                                        {{ $reassignMessage }}
                                    </div>
                                @endisset
                            </div>
                            <div class="col-4">
                                <h5 class="text-lg-center font-weight-bold text-uppercase">Assign Roles</h5>
                                <div class="form-group">
                                    <form action="{{ route('home.assign') }}" method="post">
                                        @csrf
                                        <label for="assignUser">Choose User</label>
                                        <select class="form-control text-capitalize mb-3" name="assignUser"
                                                id="assignUser">
                                            @foreach(\App\User::all() as $user)
                                                <option
                                                    value="{{ $user->id }}">{{ $user->first_name . " " . $user->last_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="assignRole">Choose Role</label>
                                        <select class="form-control text-capitalize mb-3" name="assignRole"
                                                id="assignRole">
                                            @foreach(\App\Role::all() as $role)
                                                <option class="text-capitalize"
                                                        value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <input class="btn btn-outline-primary mb-3" type="submit" value="Assign">
                                    </form>
                                    @isset($assignMessage)
                                        <div class="text-success text-lg-center text-capitalize">
                                            {{ $assignMessage }}
                                        </div>
                                    @endisset
                                </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
