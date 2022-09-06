@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header"><h5 class="card-title">Permissions</h5></div>
            <div class="card-body">
                <div id="collections-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create</a>
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
                                @foreach($permissions as $permission)
                                    <tr id="1" class="odd">
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        <td class=" dt-center noVis">
                                            <form action="{{ route('permissions.destroy',$permission->id) }}" class="list-icons" method="post">
                                                <a href="{{ route('permissions.edit',$permission->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
