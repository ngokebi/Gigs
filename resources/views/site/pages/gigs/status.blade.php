@extends('layouts.app')
@section('index')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Gigs</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Status</h4><br>
                        <form class="needs-validation" method="post" action="{{ route('update.status') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$edit_status->id}}">


                            <div class="col-md-6">
                                <select class="form-select" name="status">
                                    <option value="{{$edit_status->status}}">{{ucfirst($edit_status->status)}}</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="rejected">Rejected</option>
                                    </select>
                            </div>
                            <br>
                            <div>
                                <a href="{{ route('home.gigs') }}" class="btn btn-secondary">Back</a>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
    <!-- End Page-content -->

@endsection
