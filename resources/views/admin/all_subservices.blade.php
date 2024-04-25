@extends('include.master')
@section('style-area')
<style>
    .main_content {
        padding-left: 283px;
        padding-bottom: 0% !important;
        margin: 0px !important;
    }

    .breadcrumb {
        font-size: 18px !important;
        background-color: transparent;
        margin-bottom: 0;
        padding: 10px 0;
    }

    .notification-form {
        padding: 12px;
        margin: 14px 0px 40px 0px;
    }

    .Modules {
        flex-wrap: wrap;
    }

    .breadcrumb-item a {
        color: #333 !important;
    }

    .breadcrumb-item.active {
        color: #007bff !important;
    }

    .main_content .main_content_iner {
        margin: 0px !important;
    }

    #customerTable {
        font-size: 16px;
        /* Adjust the font size as needed */
    }

    .dt-button {
        background-color: #033496 !important;
        color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-size: 14px;
        padding: 5px 10px;
        white-space: nowrap;
    }

    #customerTable_previous {
        transform: translateX(-20px);
    }

    /* For DataTable */
    #customerTable_wrapper, #customerTable th, #customerTable td {
        font-size: 15px;
    }

    /* For datepicker */
    .ui-datepicker {
        font-size: 15px;
    }
    /* For input placeholder */
    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        font-size: 15px;
    }
    ::-moz-placeholder { /* Firefox 19+ */
        font-size: 15px;
    }
    :-ms-input-placeholder { /* IE 10+ */
        font-size: 15px;
    }
    :-moz-placeholder { /* Firefox 18- */
        font-size: 15px;
    }
</style>
<style>
    #editModal {
        display: none;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection
@section('content-area')
    <section class="main_content dashboard_part">
        <nav aria-label="breadcrumb" class="mb-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" style="text-decoration: none;color:#0d9603 !important;font-weight:600;font-size:20px;">Services Management</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="text-decoration: none;color:#033496 !important;font-weight:600;font-size:18px;">All Sub Services</li>
            </ol>
        </nav>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="main_content_iner">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="row justify-content-center">
                    <div class="col-lg-12 ">
                        <div class="row mb" style="margin-bottom: 30px; margin-left: 5px;">
                            <form action="{{ route('service-filter') }}" method="post">
                                @csrf
                                @include('admin.date')
                                <div class="col-md-1 text-end" style="margin-left: 10px; margin-top: 47px;">
                                    <a class="btn text-white shadow-lg" href="{{ route('service') }}"
                                        style="background-color:#033496;font-size:15px;">Reset</a>
                                </div>
                                <div class="col-md-1 text-end float-end "  style="margin-right: 50px; margin-top: 47px;">
                                    <a class="btn text-white shadow-lg" href="{{ route('sub-service-create') }}"
                                        style="background-color:#0d9603;font-size:15px;">Create Sub Service</a>
                                </div>
                            </form>
                        </div>
                        <div id="editModal" class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Sub Service</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name">Name:</label>
                                            <input type="text" id="name" name="name" class="form-control" value="" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="description">Description:</label>
                                            <textarea id="description" name="description" class="form-control" readonly></textarea>
                                        </div>
                                        <!-- Add more fields here as needed -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- Add your save changes button here if needed -->
                                </div>
                            </div>
                        </div>  
                        <!-- Table -->
                        <div class="card">
                            <div class="card-body">
                                <table id="customerTable" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Services Name</th>
                                            <th>Sub Services Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr class="odd" data-user-id="{{ $service->id }}">
                                                <td class="sorting_1">{{ $loop->iteration }}</td>
                                                @if ($service->image)
                                                    <td><img class="rounded" src="{{ asset($service->image) }}"
                                                            alt="Service Image" style="width: 100px; height: 70px;"></td>
                                                @else
                                                    <td>
                                                        <p>No image available</p>
                                                    </td>
                                                @endif

                                                <td>{{ \Carbon\Carbon::parse($service->created_at)->format('d M,Y') }}
                                                </td>
                                                <td>{{ $service->services->services_name }}</td>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->description }}</td>
                                                <td>
                                                    @if ($service->status == 1)
                                                        <div class="job-status text-capitalize">Active</div>
                                                    @else
                                                        <div class="job-status text-capitalize">Block</div>
                                                    @endif
                                                </td>
                                                <td class="action">
                                                    <button type="button" class="btn btn-outline-danger">
                                                        <i class="fa fa-trash-o delete-location"
                                                            data-service-id="{{ $service->id }}"
                                                            style="padding-right: -10px; font-size: 17px;"></i>
                                                    </button>
                                                    
                                                    <button type="button" class="btn btn-outline-danger edit-button" data-service-id="{{ $service->id }}">
                                                        <i class="fa fa-pencil" style="padding-right: -10px;font-size: 17px;"></i>
                                                    </button>                                                    
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
    </section>  
@endsection
@section('script-area')
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
 <script>
    $(document).ready(function() {
        $('.edit-button').click(function() {
            var serviceId = $(this).data('service-id');
            var url = "{{ route('get-sub-service', ':id') }}";
            url = url.replace(':id', serviceId);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#name').val(response.name);
                    $('#description').val(response.description);
                    $('#editModal').modal('show');
                }
            });
        });
    });
</script>
@endsection