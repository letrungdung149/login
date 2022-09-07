    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" role="form">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text"  class="form-control" id="" placeholder="Name"
                                   ng-model="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email"  class="form-control" id="" placeholder="Email"
                                   ng-model="email">
                        </div>
                        <select class="form-group" aria-label="Default select example" ng-model="display_name" multiple>
                            <option value="<% role.id %>" ng-repeat="role in roles">
                                <% role.display_name %>
                            </option>
                        </select>
                        <input type="hidden" ng-model="user.id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="add_user()">Add</button>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="container mt-2">--}}
{{--        <h1>Thêm</h1>--}}
{{--        <form action="{{ route('users.store') }}" method="POST">--}}
{{--            @csrf--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="sidebar-section-header">--}}
{{--                            <span class="font-weight-semibold">User</span>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Name:</label>--}}
{{--                                <input type="text" name="name" value="" class="form-control"--}}
{{--                                       placeholder="username">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Email:</label>--}}
{{--                                <input type="email" name="email" value="" class="form-control"--}}
{{--                                       placeholder="Email">--}}
{{--                            </div>--}}
{{--                            <select class="form-group" aria-label="Default select example" name="roles[]" multiple>--}}
{{--                                @foreach($roles as $role)--}}
{{--                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-12">--}}
{{--                <div id="form-action">--}}
{{--                    <div class="d-flex items-center justify-content-between"><a class="btn btn-secondary"--}}
{{--                                                                                href="{{ route('users.index') }}"><i--}}
{{--                                class="far fa-backward mr-2"></i>Quay lại</a>--}}
{{--                        <button class="btn btn-success" type="submit"><i class="far fa-save mr-2"></i>Create</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
