@extends('layouts.app')
@section('index')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">State</h4>


                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add State</h4><br>
                        <form class="needs-validation" method="post" action="{{ route('save.state') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="state" class="form-label">Country</label>
                                        <select class="form-select" id="country_id" name="country_id">
                                            <option selected="" value="">
                                                Country</option>
                                            @foreach ($country as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                                style="margin-top: 10px;">
                                                @foreach ($errors->get('country_id') as $error)
                                                    {{ $error }}
                                                @endforeach
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="name">
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                                style="margin-top: 10px;">
                                                @foreach ($errors->get('name') as $error)
                                                    {{ $error }}
                                                @endforeach
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div>
                                <a href="{{ route('home.state') }}" class="btn btn-secondary">Back</a>
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
