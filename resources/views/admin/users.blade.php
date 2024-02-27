@extends('include.master')
@section('style-area')
    <style>
        .main_content {
            padding-left: 283px;
            padding-bottom: 0% !important;
        }
    </style>
    <style>
        .main_content .main_content_iner {
            min-height: 68vh;
            transition: .5s;
            margin: 10px;
            margin-top: -10px;
            font-family: 'Poppins'
        }
    
        .container,
        .container-fluid,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            width: 100%;
            padding-right: 0;
            padding-left: 0;
            margin-right: 0;
            margin-left: 0;
            margin-bottom: 5px;
            margin-top: -10px;
            font-family: 'Poppins'
        }
    
        .single_element .quick_activity_wrap {
            grid-template-columns: repeat(3, 1fr);
        }
    
        .mt-3,
        .my-3 {
            margin-top: 1rem !important;
        }
    
        row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -0.75rem;
            margin-left: -0.75rem;
            font-family: 'Poppins'
        }
    
        .text-dark {
            color: #5a5c69 !important;
            font-family: 'Poppins'
        }
    
        p {
            margin-top: 0;
            margin-bottom: 1rem;
            font-family: 'Poppins'
        }
    
        .d-flex {
            display: flex !important;
            font-family: 'Poppins'
        }
    
        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
            font-family: 'Poppins'
        }
    
        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
    
        .bg-gradient-success {
            background-color: #ccd6ea;
            background-image: linear-gradient(180deg, #ccd6ea; 10%, ; 100%);
            background-size: cover;
            font-family: 'Poppins'
        }
    
        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
            font-family: 'Poppins'
        }
    
        element.style {
            OVERFLOW: scroll;
            font-family: 'Poppins'
        }
    
        div.dataTables_wrapper {
            position: relative;
            font-family: 'Poppins'
        }
    
        div.dt-buttons {
            float: left;
            font-family: 'Poppins'
        }
    
        div.dt-buttons {
            position: initial;
            font-family: 'Poppins'
        }
    
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            font-family: 'Poppins'
        }
    
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            font-family: 'Poppins'
        }
    
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #ccd6ea;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            color: inherit;
            font-family: 'Poppins'
                /* margin-left: 3px; */
        }
    
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #356ddc;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            color: inherit;
            font-family: 'Poppins'
                /* margin-left: 3px; */
        }
    
        [type=search] {
            outline-offset: -2px;
            -webkit-appearance: none;
            font-family: 'Poppins'
        }
    
        n,
        input,
        optgroup,
        select,
        textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            font-family: 'Poppins'
        }
    
        .dataTables_wrapper .dataTables_scroll {
            clear: both;
            font-family: 'Poppins'
        }
    
        element.style {
            overflow: hidden;
            position: relative;
            border: 0px;
            width: 100%;
            font-family: 'Poppins'
        }
    
        element.style {
            box-sizing: content-box;
            width: 996.854px;
            padding-right: 17px;
            font-family: 'Poppins'
        }
    
        div {
            display: block;
        }
    
        element.style {
            box-sizing: content-box;
            width: 996.854px;
            padding-right: 17px;
            font-family: 'Poppins'
        }
    
        .dataTables_wrapper.no-footer div.dataTables_scrollHead table.dataTable,
        .dataTables_wrapper.no-footer div.dataTables_scrollBody>table {
            border-bottom: none;
        }
    
        .dataTables_wrapper.no-footer div.dataTables_scrollHead table.dataTable,
        .dataTables_wrapper.no-footer div.dataTables_scrollBody>table {
            border-bottom: none;
        }
    
        element.style {
            position: relative;
            overflow: auto;
            width: 100%;
            font-family: 'Poppins'
        }
    
        .dataTable,
        .dataTables_wrapper.no-footer div.dataTables_scrollBody>table {
            border-bottom: none;
        }
    
        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }
    
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
            font-family: 'Poppins'
        }
    
        element.style {
            width: 39.3021px;
            padding-top: 0px;
            padding-bottom: 0px;
            border-top-width: 0px;
            border-bottom-width: 0px;
            height: 0px;
            font-family: 'Poppins'
        }
    
        div#example_wrapper th {
            color: #1356dc;
        }
    
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>th,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>td,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>th,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td {
            vertical-align: middle;
        }
    
        .dropdown-toggle {
            white-space: nowrap;
        }
    
        .btn-success {
            background-color: rgb(8, 103, 8);
        }
    
        .dropbtn {
            background-color: #066240;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            width: 90px;
            height: 40px;
            font-family: 'Poppins'
        }
    
        .dropdown {
            position: relative;
            display: inline-block;
            font-family: 'Poppins'
        }
    
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #e33030;
            min-width: 90px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            font-family: 'Poppins'
        }
    
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-family: 'Poppins'
        }
    
        .dropdown-content a:hover {
            background-color: #910606;
        }
    
        .dropdown:hover .dropdown-content {
            display: block;
        }
    
        .dropdown:hover .dropbtn {
            background-color: #035a06;
        }
    
        .action {
            margin-left: 10px;
        }
    
        .serach_field-area .search_inner input {
            color: #000;
            font-size: 17px;
            height: 60px;
            width: 50%;
            padding-left: 70px;
            border: 0;
            padding-right: 20px;
            border-bottom: 1px solid #f4f7fc;
            background: #f7faff;
            border-radius: 30px;
            font-family: 'Poppins'
        }
    
        n,
        input,
        optgroup,
        select,
        textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            font-family: 'Poppins'
        }
    
        .search_field {
            margin-left: 50px;
            font-family: 'Poppins'
        }
    
        .serach_field-area {
            margin-right: 100px;
            width: 400px;
            position: relative;
            font-family: 'Poppins';
        }
    
        .sidebar .logo {
            margin: 30px;
            background-color: #a0bbf3;
            padding: 5px 1px;
            border-radius: 7px;
            font-family: 'Poppins'
        }
    
        .header_iner {
            background-color: rgb(219, 219, 219);
            position: fixed;
            top: 0;
            z-index: 99;
            padding: 1px;
            position: relative;
            margin: 20px 10px;
            border-radius: 7px;
            color: #2a67e3;
            font-family: 'Poppins'
    
        }
    
        .dt-buttons {
            background-color: #2a67e3;
            font-family: 'Poppins'
        }
    
        .sidebar {
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 99;
            padding-bottom: 50px;
            position: fixed;
            width: 287px;
            z-index: 999;
            overflow: hidden;
            overflow-y: auto;
            transition: .5s;
            background-color: rgb(219, 219, 219);
            font-family: 'Poppins'
        }
    
        .fa fa-home {
            background-color: #000;
        }
    
        .icon-cog {
            color: #000;
        }
    
        .icon {
            color: #000;
        }
    
        .do {
            margin-left: 30px;
            margin-right: 30px;
        }
    
        .card-body {
            margin-left: -20px;
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
                        <br>

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
                                        style="color:#033496;">Search:<input type="search" class="" placeholder=""
                                            aria-controls="example"></label></div>
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
                                                            <th>
                                                                Phone number
                                                            </th>
                                                            <th>
                                                                Email
                                                            </th>
                                                            <th>
                                                                User id
                                                            </th>
                                                            <th>
                                                                Customer Profile
                                                            </th>
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td class="">1</td>
                                                            <td>24-04-24</td>
                                                            <td class="sorting_1">ABC </td>
                                                            <td>9454969296</td>
                                                            <td>BMDU@GMAIL.COM</td>
                                                            <td>108</td>
                                                            <td> <img
                                                                    src="https://qbacp.com/mediclear/public/images/1707739125.images (1).jpeg"
                                                                    width="100px" alt=""> </td>


                                                            <td class="action">
                                                                <i class="fa fa-trash-o"
                                                                    style="padding-right: -10px;font-size: 17px; color: #ea2121;"></i>

                                                                <div class="modal fade" id="myModal" role="dialog">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">

                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel"
                                                                                    style="font-size: x-large; margin-left:-200px; color: #000;">
                                                                                    <b>Edit</b></h5>
                                                                                <button type="button" class="close"
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
                                                                                        <label for="recipient-name"
                                                                                            class="col-form-label">Service
                                                                                            Name:</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="uername"
                                                                                            name="username"
                                                                                            required>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="recipient-name"
                                                                                            class="col-form-label">Name:</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="email" name="email"
                                                                                            required>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="recipient-name"
                                                                                            class="col-form-label">Phone
                                                                                            Number:</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="mobile_no"
                                                                                            name="mobile_no"
                                                                                            required>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="recipient-name"
                                                                                            class="col-form-label">Email:</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="post" name="post"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="recipient-name"
                                                                                            class="col-form-label">Customer
                                                                                            Profile Picture:</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="registration_number"
                                                                                            name="registration_number"
                                                                                            required>
                                                                                    </div>



                                                                                    <input type="hidden" name="id"
                                                                                        id="id" value="7">

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
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="footer_iner text-center">
                        <p style="color: #033496;">2024 © Solutions Key</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- section content  end --}}
@endsection
