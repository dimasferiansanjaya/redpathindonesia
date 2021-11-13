@extends('layouts/contentLayoutMaster')

@section('title', 'SOP Management')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('content')
    <!-- Card Information -->
    <div class="row match-height">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $submitted }}</h3>
                        <p class="card-text">Submitted</p>
                    </div>
                    <div class="avatar bg-light-danger p-50 m-0">
                        <span class="avatar-content">
                            <i data-feather="upload" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $ureview }}</h3>
                        <p class="card-text">Under Review</p>
                    </div>
                    <div class="avatar bg-light-warning p-50 m-0">
                        <span class="avatar-content">
                            <i data-feather="file-text" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $wra }}</h3>
                        <p class="card-text">Waiting Round Approval</p>
                    </div>
                    <div class="avatar bg-light-success p-50 m-0">
                        <span class="avatar-content">
                            <i data-feather="edit-3" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $completed }}</h3>
                        <p class="card-text">Completed</p>
                    </div>
                    <div class="avatar bg-light-primary p-50 m-0">
                        <span class="avatar-content">
                            <i data-feather="check-circle" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Information -->

    <!-- Basic table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>id</th>
                                <th>Title</th>
                                <th>Department</th>
                                <th>Submitter</th>
                                <th>Submission Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
                <form class="add-new-record modal-content pt-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                            <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                placeholder="John Doe" aria-label="John Doe" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-post">Post</label>
                            <input type="text" id="basic-icon-default-post" class="form-control dt-post"
                                placeholder="Web Developer" aria-label="Web Developer" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                            <small class="form-text"> You can use letters, numbers & periods </small>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                            <input type="text" class="form-control dt-date" id="basic-icon-default-date"
                                placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="basic-icon-default-salary">Salary</label>
                            <input type="text" id="basic-icon-default-salary" class="form-control dt-salary"
                                placeholder="$12000" aria-label="$12000" />
                        </div>
                        <button type="button" class="btn btn-primary data-submit me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--/ Basic table -->

@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script>
@endsection
