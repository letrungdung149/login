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
                            <a class="btn btn-success" href="#"> Create New Product</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div id="collections-table_filter" class="dataTables_filter"><label>Search:<input
                                    type="search" class="form-control form-control-sm" placeholder=""
                                    aria-controls="collections-table"></label></div>
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
                                <tr id="1" class="odd">
                                    <td>ten</td>
                                    <td>mail</td>
                                    <td>ngay</td>
                                    <td class=" dt-center noVis">
                                        <div class="list-icons"><a href="#"
                                                                   class="list-icons-item text-primary editor-edit"><i
                                                    class="icon-pencil7"></i></a><a href="#"
                                                                                    class="list-icons-item text-danger editor-delete"><i
                                                    class="icon-trash"></i></a></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="collections-table_info" role="status"
                             aria-live="polite">Hiển thị 1 tới 1 của 1 dữ liệu<span
                                class="select-info"><span
                                    class="select-item">0 dòng đang được chọn</span></span></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_full_numbers"
                             id="collections-table_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item first disabled"
                                    id="collections-table_first"><a href="#"
                                                                    aria-controls="collections-table"
                                                                    data-dt-idx="0" tabindex="0"
                                                                    class="page-link">Đầu tiên</a></li>
                                <li class="paginate_button page-item previous disabled"
                                    id="collections-table_previous"><a href="#"
                                                                       aria-controls="collections-table"
                                                                       data-dt-idx="1" tabindex="0"
                                                                       class="page-link">Trước</a></li>
                                <li class="paginate_button page-item active"><a href="#"
                                                                                aria-controls="collections-table"
                                                                                data-dt-idx="2" tabindex="0"
                                                                                class="page-link">1</a></li>
                                <li class="paginate_button page-item next disabled"
                                    id="collections-table_next"><a href="#"
                                                                   aria-controls="collections-table"
                                                                   data-dt-idx="3" tabindex="0"
                                                                   class="page-link">Sau</a></li>
                                <li class="paginate_button page-item last disabled"
                                    id="collections-table_last"><a href="#"
                                                                   aria-controls="collections-table"
                                                                   data-dt-idx="4" tabindex="0"
                                                                   class="page-link">Cuối cùng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
