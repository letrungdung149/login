@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <h1>Sửa</h1>
        <form action="{{ route('roles.update',$role->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="sidebar-section-header">
                            <span class="font-weight-semibold">Roles</span>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control"
                                       placeholder="username">
                            </div>
                            <div class="form-group">
                                <label>Display_name:</label>
                                <input type="text" name="display_name" value="{{ $role->display_name }}" class="form-control"
                                       placeholder="Display_name">
                            </div>
                            @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input
                                        {{ $permissionOfRole->contains($permission->id) ? 'checked' : ''}}
                                        type="checkbox" class="form-check-input" name="permission[]" id="exampleCheck1" value="{{ $permission->id }}">
                                    <label class="form-check-label" for="exampleCheck1">{{ $permission->display_name }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div id="form-action">
                    <div class="d-flex items-center justify-content-between"><a class="btn btn-secondary"
                                                                                href="{{ route('roles.index') }}"><i
                                class="far fa-backward mr-2"></i>Quay lại</a>
                        <button class="btn btn-success" type="submit"><i class="far fa-save mr-2"></i>Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
