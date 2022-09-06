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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                        aria-selected="false">Basic Data</a>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="card-body">
                                            <form class="needs-validation" method="post" action="{{ route('update.gigs') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$edit_gigs->id}}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="role" class="form-label">Role</label>
                                                            <input type="text" class="form-control" id="role"
                                                                name="role" value="{{$edit_gigs->role}}">
                                                            @if ($errors->has('role'))
                                                                <div class="alert alert-danger alert-dismissible fade show"
                                                                    role="alert" style="margin-top: 10px;">
                                                                    @foreach ($errors->get('role') as $error)
                                                                        {{ $error }}
                                                                    @endforeach
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="Company" class="form-label">Company</label>
                                                            <input type="text" class="form-control" id="Company"
                                                                name="company" value="{{$edit_gigs->company}}">
                                                            @if ($errors->has('company'))
                                                                <div class="alert alert-danger alert-dismissible fade show"
                                                                    role="alert" style="margin-top: 10px;">
                                                                    @foreach ($errors->get('company') as $error)
                                                                        {{ $error }}
                                                                    @endforeach
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="location" class="form-label">Location</label>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <select class="form-select" id="country_id" name="country_id">
                                                                <option selected="" value="">
                                                                    Country</option>
                                                                    @foreach ($country as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ $item->id == $edit_gigs->country_id ? 'selected' : '' }}>
                                                                        {{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('country_id'))
                                                                <div class="alert alert-danger alert-dismissible fade show"
                                                                    role="alert" style="margin-top: 10px;">
                                                                    @foreach ($errors->get('country_id') as $error)
                                                                        {{ $error }}
                                                                    @endforeach
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <select class="form-select" name="state_id">
                                                                <option selected="" value="">
                                                                    State</option>
                                                                    @foreach ($state as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ $item->id == $edit_gigs->state_id ? 'selected' : '' }}>
                                                                        {{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('state_id'))
                                                                <div class="alert alert-danger alert-dismissible fade show"
                                                                    role="alert" style="margin-top: 10px;">
                                                                    @foreach ($errors->get('state_id') as $error)
                                                                        {{ $error }}
                                                                    @endforeach
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" placeholder="Address" value="{{$edit_gigs->address}}">
                                                            @if ($errors->has('address'))
                                                            <div class="alert alert-danger alert-dismissible fade show"
                                                                role="alert" style="margin-top: 10px;">
                                                                @foreach ($errors->get('address') as $error)
                                                                    {{ $error }}
                                                                @endforeach
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for=""> Add tags</label>
                                                        <input type="text" class="form-control" name="tags" value="{{$edit_gigs->tags}}">
                                                        @if ($errors->has('tags'))
                                                            <div class="alert alert-danger alert-dismissible fade show"
                                                                role="alert" style="margin-top: 10px;">
                                                                @foreach ($errors->get('tags') as $error)
                                                                    {{ $error }}
                                                                @endforeach
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        @endif
                                                        <br>
                                                        <p>Suggested tags: <u>full-time</u>, <u>Contract</u>,
                                                            <u>freelance</u>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="validationCustom03" class="form-label">Salary</label>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" id="min_salary"
                                                                placeholder="Minimum" name="min_salary" value="{{$edit_gigs->min_salary}}">
                                                            @if ($errors->has('min_salary'))
                                                                <div class="alert alert-danger alert-dismissible fade show"
                                                                    role="alert" style="margin-top: 10px;">
                                                                    @foreach ($errors->get('min_salary') as $error)
                                                                        {{ $error }}
                                                                    @endforeach
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" id="max_salary"
                                                                placeholder="Maximum" name="max_salary" value="{{$edit_gigs->max_salary}}">
                                                            @if ($errors->has('max_salary'))
                                                                <div class="alert alert-danger alert-dismissible fade show"
                                                                    role="alert" style="margin-top: 10px;">
                                                                    @foreach ($errors->get('max_salary') as $error)
                                                                        {{ $error }}
                                                                    @endforeach
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div style="float: right;">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <a class="btn btn-secondary" href="{{ route('home.gigs') }}">Back</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
    <!-- End Page-content -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        url: "{{ url('/states/country/ajax') }}/" + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="state_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="state_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
