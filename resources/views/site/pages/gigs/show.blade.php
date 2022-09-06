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



            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Details</h4><br>
                        <form class="needs-validation" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <input type="text" class="form-control" id="role" name="role"
                                            value="{{ $show_gig->role }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Company" class="form-label">Company</label>
                                        <input type="text" class="form-control" id="Company" name="company"
                                            value="{{ $show_gig->company }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="location" class="form-label">Location</label>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <select class="form-select" id="country_id" name="country_id" disabled>
                                            <option selected="" value="">
                                                Country</option>
                                            @foreach ($country as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $show_gig->country_id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <select class="form-select" name="state_id" disabled>
                                            <option selected="" value="">
                                                State</option>
                                            @foreach ($state as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $show_gig->state_id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" value="{{ $show_gig->address }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for=""> Tags</label>
                                    <input type="text" class="form-control" name="tags"
                                        value="{{ $show_gig->tags }}" disabled>

                                </div>
                            </div>
                            <div class="row">
                                <label for="validationCustom03" class="form-label">Salary</label>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="min_salary" placeholder="Minimum"
                                            name="min_salary" value="{{ $show_gig->min_salary }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="max_salary" placeholder="Maximum"
                                            name="max_salary" value="{{ $show_gig->max_salary }}" disabled>

                                    </div>
                                </div>
                            </div>

                            <div style="float: right;">
                                <a class="btn btn-secondary" href="{{ route('home.gigs') }}">Back</a>
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
