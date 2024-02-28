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
    @if (session()->has('message'))
    <script>
        alert('{{ session()->get('message') }}');
    </script>
    {{ session()->forget('message') }}
@endif
<style>
    .dt-button{
        background-color: #1cc88a !important;
        background-image: linear-gradient(180deg,#1cc88a 10%,#13855c 100%) !important;
        background-size: cover !important;
        color: #fff !important;
        border: none !important;

    }
    </style>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h3 class="h3 mb-2 text-gray-800">Complaint</h3>
                    <form action="{{ url('/add-complaint') }}" method="POST">
                        @csrf
                        <div class="row dashboard-header">
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-12 boder-danger me-5 pe-5">
                                        <div class="row mb" style="margin-bottom: 30px;">
                                            <div class="col-sm-1">
                                                <p class="text-dark"><b><strong>Filters:</strong></b></p>
                                            </div>
                                            <div class="col-sm-3 end-date">
                                                <p class="text-dark"><strong>Date From:</strong></p>
                                                <div class="input-group date d-flex" id="datepicker1">
                                                    <input type="date" class="form-control" name="start" id="startdate"
                                                        value="{{ $start ?? '' }}" placeholder="dd-mm-yyyy" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3 end-date">
                                                <p class="text-dark"><strong>Date to:</strong></p>
                                                <div class="input-group date d-flex" id="datepicker2">
                                                    <input type="date" name="end" class="form-control" id="enddate"
                                                        value="{{ $end ?? '' }}" placeholder="dd-mm-yyyy" />
                                                </div>
                                            </div>
                                            <div class="col-md-1 text-end" style="margin-left: 10px; margin-top:47px;">
                                                <button class="btn   bg-gradient-success text-white shadow-lg "
                                                    type="submit">Filter</button>
                                            </div>
                                        </form>
                                        <div class="col-md-1 " style="margin-left: -12px;  margin-top:47px;">
                                            <a href="{{ url('/complaint') }}" class="btn bg-gradient-success text-white shadow-lg ">Reset</a>
                                        </div>
<div class="row">
</div>
<div class="card-body" style="width: -webkit-fill-available;">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Create Date</th>
                <th>Subject</th>
                <th>Complaint</th>
                <th>User Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($complaint as $complaint)
            <tr>
                <td>{{$i}}</td>
                <td>{{$complaint->created_at->format('d/m/Y')}}</td>
                <td>{{$complaint->subject}}</td>
                <td>{{$complaint->message}}</td>
                <td>{{ $name[$loop->index] }}</td>
                <!-- <td><img src="./images/avatar-1.png"></td> -->
                <td class="text-center"><i class="fa-solid fa-trash text-danger"  data-toggle="modal" data-target="#exampleModal" style="font-size:1rem; cursor: pointer;" onclick="{document.getElementById('id').value={{ $complaint->id }}}" ></i></td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
            {{-- <tr>
                <td>2</td>
                <td>Lorem Ipsum SImple dummy text</td>
                <td>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to .</td>
                <!-- <td><img src="./images/avatar-1.png"></td> -->
                <td class="text-center"><i class="fa-solid fa-trash text-dark"></i></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Lorem Ipsum SImple dummy text</td>
                <td>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to .</td>
                <!-- <td><img src="./images/avatar-1.png"></td> -->
                <td class="text-center"><i class="fa-solid fa-trash text-dark"></i></td>
            </tr> --}}
            </tbody>
        </table>
        <!--end table-->
    </div>
</div>
<!-- 4-blocks row end -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure want to delete?
                            <form action="{{ url('/complaint/delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" id="id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var currentDate = new Date().toISOString().split('T')[0];
                document.getElementById('enddate').setAttribute('max', currentDate);
                document.getElementById('startdate').setAttribute('max', currentDate);
            </script>
            {{-- end model  --}}
{{-- // start footer --}}
    {{-- section content end --}}
@endsection


