@extends('layouts.app')
@section('content')
    <div class="content" ng-controller="departmentController">
        <div class="card">
            <div class="card-header"><h5 class="card-title">Department</h5></div>
            <div class="card-body">
                <div id="collections-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#createModal">
                                    Create</a>
                            </div>
                        </div>
                        <div id="collections-table_filter" class="col-sm-4 dataTables_filter"><label>Search:<input
                                    ng-model="search_dept"
                                    ng-change="search()"
                                    type="search" class="form-control form-control-sm"
                                    placeholder="search"
                                    aria-controls="collections-table"></label></div>
                    </div>
                    <div class="row">
                        <div id="collections-table_processing" class="dataTables_processing card"
                             style="display: none;">Đang xử lý...
                        </div>
                    </div>
                    <div class="row mt-3" style="display: block;">
                        <span ng-repeat="item in result_search">
                            <% item.name %> <p>(<% item.src %>)</p>
                        </span>
                        <ul  ng-repeat="item in result">
                            <li>
                                <span>
                                  <% item.src %>
                                    <form action="" class="list-icons" method="post">
                                            <a href="#"
                                               data-toggle="modal" data-target="#editModal"
                                               ng-click="edit_department(item.id)"
                                               class="list-icons-item text-primary editor-edit"><i
                                                    class="icon-pencil7"></i></a>
                                            <a type="submit" ng-click="delete_department(item.id)"
                                               class="list-icons-item text-danger editor-delete">
                                                <i
                                                    class="icon-trash">
                                                </i>
                                            </a>
                                    </form>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                                <input type="text" class="form-control" id="" placeholder="Description"
                                       ng-model="description"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Parent</label>
                                <select class="form-control" ng-model="root">
                                    <option value="0">0</option>
                                    <option value="<% item.root %>" ng-repeat="item in result">
                                       <% item.src %>
                                    </option>
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
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                                <input type="text" class="form-control" id="" placeholder="Name"
                                       ng-model="department.name"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" id="" placeholder="Description"
                                       ng-model="department.description"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Parent</label>
                                <select class="form-control" ng-model="department.parent_id">
                                    <option value="0">0</option>
                                    <option value="<% item.id %>" ng-repeat="item in result">
                                        <% item.src %>
                                    </option>
                                </select>
                            </div>
                            <input type="hidden" ng-model="department.id">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="update_department(department.id)">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
