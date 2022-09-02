@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <h1>Thêm</h1>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="sidebar-section-header">
                            <span class="font-weight-semibold">Roles</span>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" value="" class="form-control"
                                       placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Display_Name:</label>
                                <input type="text" name="display_name" value="" class="form-control"
                                       placeholder="Display_Name">
                            </div>
                            @foreach($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="permission[]" id="exampleCheck1" value="{{ $permission->id }}">
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
                        <button class="btn btn-success" type="submit"><i class="far fa-save mr-2"></i>Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
