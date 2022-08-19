@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header"><h5 class="card-title">User</h5></div>
            <div class="card-body">
                <div id="collections-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Product</a>
                            </div>
                        </div>
                        <form action="" class="col-sm-4">
                            <div id="collections-table_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="form-control form-control-sm" placeholder="search" name="key"
                                        aria-controls="collections-table"></label></div>
                        </form>
                        <form method="GET">
                            <select name="per_page">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <input type="submit" name="submit" value="Submit">
                        </form>
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
                                @foreach($users as $user)
                                <tr id="1" class="odd">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class=" dt-center noVis">
                                        <form action="{{ route('users.destroy',$user->id) }}" class="list-icons" method="post">
                                            <a href="{{ route('users.edit',$user->id) }}"
                                                                   class="list-icons-item text-primary editor-edit"><i
                                                    class="icon-pencil7"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="list-icons-item text-danger editor-delete">
                                                <i
                                                    class="icon-trash">
                                                </i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $users->fragment('foo')->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

