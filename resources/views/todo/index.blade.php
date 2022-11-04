@extends('layouts.app')
@push('css')
    <style>
        .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #337ab7;
            border-color: #337ab7;
        }

        .pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }

        .pagination > li > a, .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
    </style>
@endpush
@section('content')
    {{ $test }}
    @foreach(Show::get() as $item)
        <a href="#">{{ $item['label'] }}</a>
    @endforeach
    <div class="content" ng-controller="todoController">
        <div class="card">
            <div class="card-header"><h5 class="card-title">Todo-List</h5></div>
            <div class="card-body">
                <div id="collections-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">
                                    Create</a>
                            </div>
                        </div>
                        <div class="col-sm-4 dataTables_filter"><label>
                                <input
                                    ng-model="search_name"
                                    ng-change="search_change()"
                                    type="search" class="form-control form-control-sm"
                                    placeholder="search"
                                    aria-controls="collections-table">
                            </label></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <form method="post" ng-submit="check_status()">
                                <select name="type" class="form-control form-control-select2"
                                        ng-model="check"
                                        data-close-on-select="true"
                                        data-allow-clear="true">
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Complete</option>
                                </select>
                                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 5px;">Submit</button>
                                </form>
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
                                    <th>
                                        Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="collections-table"
                                        rowspan="1">
                                        Name
                                    </th>
                                    <th class="sorting_disabled sorting_desc" rowspan="1" colspan="1"
                                        >Description
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
                                <tr dir-paginate="todo in todos | itemsPerPage:pageSize">
                                    <td>
                                        <input class="bg-gray-400 text-green-500" type="checkbox" value="<% todo.id %>"
                                               ng-model="checked"
                                               ng-init="todo.status != 0 ?  checked=true : ''"
                                               ng-click="check_complete(todo.id)">
                                    </td>
                                    <td><% todo.name %></td>
                                    <td><% todo.description %></td>
                                    <td><% todo.created_at %></td>
                                    <td class="dt-center noVis">
                                        <form action="" class="list-icons" method="post">
                                            <a href="#"
                                               data-toggle="modal" data-target="#editModal"
                                               ng-click="edit_todos(todo.id)"
                                               class="list-icons-item text-primary editor-edit"><i
                                                    class="icon-pencil7"></i></a>
                                            <a type="submit" class="list-icons-item text-danger editor-delete"
                                               ng-click="delete_todos(todo.id)"
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
                            <dir-pagination-controls></dir-pagination-controls>
                            <nav aria-label="Page navigation example">
                                <form style="float:right;">
                                    <select ng-model="pageSize" ng-options="num for num in [5, 10, 15,20]">
                                    </select>
                                </form>
                            </nav>
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
                                <label for="">Description</label>
                                <input type="display_name" class="form-control" id="" placeholder="Description"
                                       ng-model="description">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="add_todos()">Add</button>
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
                                       ng-model="todo.name">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" id="" placeholder="Description"
                                       ng-model="todo.description">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="update_todos(todo.id)">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
