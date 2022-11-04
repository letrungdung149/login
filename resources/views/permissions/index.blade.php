@extends('layouts.app')
@section('content')
    <div class="content" ng-controller="permissionController">
        <div class="card">
            <div class="card-header"><h5 class="card-title">Permissions</h5></div>
            <div class="card-body">
                <div id="collections-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal"> Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="collections-table_processing" class="dataTables_processing card"
                             style="display: none;">Đang xử lý...
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="collections-table"
                                   class="table dataTable no-footer dtr-inline dt-checkboxes-select"
                                   style="width: 100%;" aria-describedby="collections-table_info">
                                <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="collections-table"
                                        rowspan="1" colspan="1" aria-label="Tiêu đề: Sắp xếp thứ tự tăng dần">
                                        Name
                                    </th>
                                    <th class="sorting_disabled sorting_desc" rowspan="1" colspan="1"
                                        aria-label="Ảnh">Display_name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="collections-table"
                                        rowspan="1" colspan="1" aria-label="Ngày tạo: Sắp xếp thứ tự tăng dần">
                                        Created_at
                                    </th>
                                    <th class="dt-center noVis sorting_disabled" rowspan="1" colspan="1"
                                        aria-label=""></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="permission in permissions">
                                        <td><% permission.name %></td>
                                        <td><% permission.display_name %></td>
                                        <td><% permission.created_at %></td>
                                        <td class=" dt-center noVis">
                                            <form action="" class="list-icons" method="post">
                                                <a href="#"
                                                   data-toggle="modal" data-target="#editModal"
                                                   ng-click="edit_permissions(permission.id)"
                                                   class="list-icons-item text-primary editor-edit"><i
                                                        class="icon-pencil7"></i></a>
                                                <a type="submit" class="list-icons-item text-danger editor-delete"
                                                   ng-click="delete_permissions(permission.id)"
                                                >
                                                    <i
                                                        class="icon-trash">
                                                    </i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add -->
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
                            <input type="text" class="form-control" id="" placeholder="Name"
                                   ng-model="name">
                        </div>
                        <div class="form-group">
                            <label for="">Display_name</label>
                            <input type="display_name" class="form-control" id="" placeholder="Display_name"
                                   ng-model="display_name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="add_permissions()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" role="form">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="Name"
                                   ng-model="permission.name">
                        </div>
                        <div class="form-group">
                            <label for="">Display_name</label>
                            <input type="email" class="form-control" id="" placeholder="Display_name"
                                   ng-model="permission.display_name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="update_permissions(permission.id)">Edit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
