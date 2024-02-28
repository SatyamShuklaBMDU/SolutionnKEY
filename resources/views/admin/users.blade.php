@extends('include.master')
@section('style-area')
    <style>
        .main_content {
            padding-left: 283px;
            padding-bottom: 0% !important;
        }
    </style>
@endsection
@section('content-area')
    {{-- section content --}}
    <section class="main_content dashboard_part">
        <div class="main_content_iner ">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="row justify-content-center">
                    <div class="col-lg-12 ">
                        <div class="row mb" style="margin-bottom: 30px; margin-left: 5px;">
                            <div class="col-sm-1">
                                <p class="text-dark">
                                    <b>
                                        <strong>Filters:</strong>
                                    </b>
                                </p>
                            </div>
                            <div class="col-sm-3 end-date">
                                <p class="text-dark">
                                    <strong>Date From:</strong>
                                <div class="input-group date d-flex" id="datepicker1">
                                    <input type="date" class="form-control" name="start" id="startdate" value=""
                                        placeholder="dd-mm-yyyy" max="2024-02-20">
                                </div>
                                </p>
                            </div>
                            <div class="col-sm-3 end-date">
                                <p class="text-dark">
                                    <strong>Date To:</strong>
                                </p>
                                <div class="input-group date d-flex" id="datepicker1">
                                    <input type="date" class="form-control" name="start" id="startdate" value=""
                                        placeholder="dd-mm-yyyy" max="2024-02-20">
                                </div>

                            </div>
                            <div class="col-md-1 text-end" style="margin-left: 10px; margin-top: 47px;">
                                <button class="btn text-white shadow-lg " type="submit"
                                    style="background-color:#033496;">Filter</button>
                            </div>
                            <div class="col-md-1 text-end" style="margin-left: 10px; margin-top: 47px;">
                                <button class="btn  text-white shadow-lg " type="submit"
                                    style="background-color:#033496;">Reset</button>
                            </div>
                            <div class="col-md-1 text-end" style="margin-left: 10px; margin-top: 47px;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#myModal">
                                    Add User
                                </button>
                            </div>
                            <br>
                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users-store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" id="name" name="name"
                                                        placeholder="Enter your name"
                                                        class=" form-control @error('name') is-invalid @enderror"
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email address:</label>
                                                    <input type="email" id="email" name="email"
                                                        placeholder="Enter email"
                                                        class=" form-control @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password:</label>
                                                    <input type="password" id="password" name="password"
                                                        placeholder="Enter password"
                                                        class=" form-control @error('password') is-invalid @enderror"
                                                        value="{{ old('password') }}">
                                                    @error('password')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Role:</label>
                                                    <input type="text" id="role" name="role"
                                                        placeholder="Enter your Role"
                                                        class=" form-control @error('role') is-invalid @enderror"
                                                        value="{{ old('role') }}">
                                                    @error('role')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="permission">Permission:</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="userRole"
                                                            name="permission[]" value="User Management">
                                                        <label class="form-check-label" for="userRole">User
                                                            Management</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="serviceRole"
                                                            name="permission[]" value="Service Management">
                                                        <label class="form-check-label" for="adminRole">Service
                                                            Management</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="customerRole"
                                                            name="permission[]" value="Customer Management">
                                                        <label class="form-check-label" for="customerRole">Customer
                                                            Management</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="bookingRole"
                                                            name="permission[]" value="bookingRole">
                                                        <label class="form-check-label" for="bookingRole">Booking &
                                                            Scheduling</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="paymentRole"
                                                            name="permission[]" value="paymentRole">
                                                        <label class="form-check-label" for="paymentRole">Payment &
                                                            Invoicing</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="feedbackRole"
                                                            name="permission[]" value="feedbackRole">
                                                        <label class="form-check-label" for="feedbackRole">Feedback &
                                                            Reviews</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="analyticsRole" name="permission[]" value="analyticsRole">
                                                        <label class="form-check-label" for="analyticsRole">Analytics &
                                                            Reporting</label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- the end MOdal --}}

                            <div class="card-body" style="overflow: scroll;">
                                <div id="example-wrapper" class="dataTables_wrapper no-footer">

                                    <button class="btn text-white shadow-lg " type="submit"
                                        style="background-color:#033496;">Copy</button>
                                    <button class="btn text-white shadow-lg " type="submit"
                                        style="background-color:#033496;">CSV</button>
                                    <button class="btn text-white shadow-lg " type="submit"
                                        style="background-color:#033496;">Excel</button>
                                    <button class="btn text-white shadow-lg " type="submit"
                                        style="background-color: #033496;">Print</button>
                                    <div id="example_filter" class="dataTables_filter"><label
                                            style="color:#033496;">Search:<input type="search" class=""
                                                placeholder="" aria-controls="example"></label></div>
                                </div>
                                <br>

                                <table>
                                    <thead>
                                        <div class="dataTables_scroll">
                                            <div class="dataTables_scrollHead"
                                                style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                <div class="dataTables_scrollHeadInner"
                                                    style="box-sizing: content-box; width: 996.854px; padding-right: 0px;">
                                                    <table class="display nowrap dataTable no-footer"
                                                        style="width: 996.854px; margin-left: 0px;">
                                                        <thead>
                                                </div>

                                                <div class="dataTables_scrollBody"
                                                    style="position: relative; overflow: auto; width: 100%;">
                                                    <table id="example" class="display nowrap dataTable no-footer"
                                                        style="width: 100%;" aria-describedby="example_info">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    S no.</th>
                                                                <th>
                                                                    Registration Date
                                                                </th>
                                                                <th>
                                                                    Name
                                                                </th>
                                                                {{-- <th>Phone number</th> --}}
                                                                <th> Email</th>
                                                                <th> User Role </th>
                                                                {{-- <th> Customer Profile</th> --}}
                                                                <th>Action</th>
                                                            </tr>

                                                        </thead>
                                                        @if ($users->isNotEmpty())
                                                            @foreach ($users as $user)
                                                                <tbody>
                                                                    <tr class="odd">
                                                                        <td class="">{{ $loop->iteration }}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M,Y') }}
                                                                        </td>
                                                                        <td class="sorting_1">{{ $user->name }} </td>
                                                                        {{-- <td>{{ $user->phone }}</td> --}}
                                                                        <td>{{ $user->email }}</td>
                                                                        <td>{{ $user->role }}</td>

                                                                        <td class="action">
                                                                            <i class="fa fa-trash-o"
                                                                                style="padding-right: -10px;font-size: 17px; color: #ea2121;"></i>
                                                                            <div class="modal fade" id="myModal"
                                                                                role="dialog">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">

                                                                                            <h5 class="modal-title"
                                                                                                id="exampleModalLabel"
                                                                                                style="font-size: x-large; margin-left:-200px; color: #000;">
                                                                                                <b>Edit</b>
                                                                                            </h5>
                                                                                            <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                                <span aria-hidden="true"
                                                                                                    style="margin-right: -350px;"><b>×</b></span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form
                                                                                                action="https://qbacp.com/mediclear/doctor/update"
                                                                                                method="post"
                                                                                                enctype="multipart/form-data">
                                                                                                <input type="hidden"
                                                                                                    name="_token"
                                                                                                    value="ieymBwjqpG7o9CAhaKGtdr7U7b0EUj6VMS9KTgH8">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        for="recipient-name"
                                                                                                        class="col-form-label">Service
                                                                                                        Name:</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="uername"
                                                                                                        name="username"
                                                                                                        required>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        for="recipient-name"
                                                                                                        class="col-form-label">Name:</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="email"
                                                                                                        name="email"
                                                                                                        required>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        for="recipient-name"
                                                                                                        class="col-form-label">Phone
                                                                                                        Number:</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="mobile_no"
                                                                                                        name="mobile_no"
                                                                                                        required>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        for="recipient-name"
                                                                                                        class="col-form-label">Email:</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="post"
                                                                                                        name="post"
                                                                                                        required>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        for="recipient-name"
                                                                                                        class="col-form-label">Customer
                                                                                                        Profile
                                                                                                        Picture:</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="registration_number"
                                                                                                        name="registration_number"
                                                                                                        required>
                                                                                                </div>
                                                                                                <input type="hidden"
                                                                                                    name="id"
                                                                                                    id="id"
                                                                                                    value="7">

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="Submit"
                                                                                                class="btn btn-default"
                                                                                                value="submit"
                                                                                                style="color: white; background-color: #2a67e3;">Submit</button>
                                                                                        </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            @endforeach
                                                        @endif

                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        </div>
        </div>
        </div>
        </div>
    </section>
    {{-- section content  end --}}
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- jQuery Validation plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


