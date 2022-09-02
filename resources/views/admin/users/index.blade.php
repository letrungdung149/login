@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endpush
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header"><h5 class="card-title">User</h5></div>
            <div class="card-body">
                <div id="collections-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a class="btn btn-success" data-toggle="modal" data-target="#addModal" href="#">
                                    Create</a>
                            </div>
                        </div>
                            <div id="collections-table_filter" class="dataTables_filter"><label>Search:<input
                                      ng-model="search"  type="search" class="form-control form-control-sm" placeholder="search"
                                        aria-controls="collections-table"></label></div>
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
                                        aria-label="Ảnh">Email
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
                                <tr dir-paginate="u in datas | itemsPerPage:pageSize | filter:search">
                                    <td><% u.name %></td>
                                    <td><% u.email %></td>
                                    <td><% u.created_at %></td>
                                    <td></td>
                                    <td class=" dt-center noVis">
                                        <form action="" class="list-icons" method="post">
                                            <a href="#"
                                               data-toggle="modal" data-target="#editModal"
                                               ng-click="edit_user(u.id)"
                                               class="list-icons-item text-primary editor-edit"><i
                                                    class="icon-pencil7"></i></a>
                                            <a type="submit" ng-click="remove_user(u.id)"
                                               class="list-icons-item text-danger editor-delete">
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
                                <form style="float:right ;">
                                    <select ng-model="pageSize" ng-options="num for num in [5, 10, 15,20]">
                                    </select>
                                </form>
                            </nav>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" role="form">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Name"
                                   ng-model="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Email"
                                   ng-model="email">
                        </div>
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
                            <input type="text" name="name" class="form-control" id="" placeholder="Name"
                                   ng-model="user.name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Email"
                                   ng-model="user.email">
                        </div>
                        <input type="hidden" ng-model="user.id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="update(user.id)">Edit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

