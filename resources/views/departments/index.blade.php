@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header"><h5 class="card-title">Department</h5></div>
            <div class="card-body">
                <div id="collections-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#createModal"> Create</a>
                            </div>
                        </div>
                        <div id="collections-table_filter" class="col-sm-4 dataTables_filter"><label>Search:<input
                                    type="search" class="form-control form-control-sm"
                                    placeholder="search"
                                    aria-controls="collections-table"></label></div>
                    </div>
                    <div class="row">
                        <div id="collections-table_processing" class="dataTables_processing card"
                             style="display: none;">Đang xử lý...
                        </div>
                    </div>
                    <div class="row mt-3">
                        <tree list="newList"></tree>
                        <script type="text/ng-template" id="tree.html">
                            <ul ng-if="list.length > 0">
                                <li ng-repeat="item in list">
                                    <span>
                                        <% item.name %>
                                    </span>
                                    <form action="" class="list-icons">
                                        <a href="#"
                                           class="list-icons-item text-primary editor-edit" ng-click="edit_department(item.id)" data-toggle="modal" data-target="#editModal"><i
                                                class="icon-pencil7"></i></a>
                                        <a type="button" class="list-icons-item text-danger editor-delete" ng-click="delete_department(item.id)">
                                            <i
                                                class="icon-trash">
                                            </i>
                                        </a>
                                    </form>
                                    <tree list="item.children"></tree>
                                </li>
                            </ul>

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" role="form">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="Name" ng-model="name"
                                   >
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" id="" placeholder="Description" ng-model="description"
                                   >
                        </div>
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select class="form-control" ng-model="parent_id">
                                <option value="0">0</option>
                                <option value="<% department.id %>" ng-repeat="department in departments"><% department.name %></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable for="">Status</lable>
                            <select class="form-control" ng-model="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="add_department()">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" role="form">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="Name" ng-model="department.name"
                            >
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" id="" placeholder="Description" ng-model="department.description"
                            >
                        </div>
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select class="form-control" ng-model="department.parent_id">
                                <option value="<% department.id %>" ng-repeat="department in departments"><% department.name %></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable for="">Status</lable>
                            <select class="form-control" ng-model="department.status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <input type="hidden" ng-model="department.id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
