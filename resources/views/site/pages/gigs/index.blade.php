@extends('layouts.app')
@section('index')
    <style>
        #center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Gigs</h4>

                        <div class="page-title-right">
                            <a href="{{ route('add.gigs') }}" type="button"
                                class="btn btn-secondary waves-effect waves-light">
                                New Gigs <i class="ri-add-box-fill   align-middle me-2"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if (session('success'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
            @endif

            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">

                                <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">All gigs
                                            <span style="background-color: grey; color:white;">
                                                {{ $gigs_count1 }}
                                            </span>

                                    </span>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">My gigs <span
                                            style="background-color: grey; color:white;">{{ $gigs_count2 }}</span></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab"
                                    aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">Rejected gigs <span
                                            style="background-color: grey; color:white;">{{ $gigs_count3 }}</span></span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">

                            <div class="tab-pane active" id="home1" role="tabpanel">

                                <div class="card-body">
                                    <div class="button-items" id="center">
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            Freelance
                                        </a>
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-outline-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-key"></i>
                                                Keywords <i class="mdi mdi-chevron-down"></i></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-outline-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="dripicons-location"></i> Location <i
                                                    class="mdi mdi-chevron-down"></i></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class="fas fa-globe  align-middle me-2"></i> Remote Friendly
                                        </a>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class="fas fa-palette  align-middle me-2"></i> Design
                                        </a>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class=" dripicons-suitcase  align-middle me-2"></i> Contract
                                        </a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Role</th>
                                                    <th>Company</th>
                                                    <th>Date Created</th>
                                                    <th>Salary</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php($i = 1)
                                                @foreach ($gigs_1 as $item)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->role }}</td>
                                                        <td>{{ $item->company }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>{{ $item->min_salary . ' - ' . $item->max_salary }}</td>
                                                        <td>
                                                            <a href="{{ route('edit.gigs', $item->id) }}"
                                                                title="Edit"><i class="mdi mdi-file-document-edit"
                                                                    style="color: green;"></i></a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="{{ route('status.gigs', $item->id) }}"
                                                                title="Status"><i class="fas fa-pen-alt"
                                                                    style="color: blue;"></i></a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="{{ route('delete.gigs', $item->id) }}"
                                                                title="Delete" id="deleted"><i
                                                                    class="mdi mdi-delete" style="color: red;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div> <!-- end col -->

                            </div>

                            <div class="tab-pane" id="profile1" role="tabpanel">

                                <div class="card-body">
                                    <div class="button-items" id="center">
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            Freelance
                                        </a>
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-outline-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fas fa-key"></i>
                                                Keywords <i class="mdi mdi-chevron-down"></i></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-outline-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="dripicons-location"></i> Location <i
                                                    class="mdi mdi-chevron-down"></i></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class="fas fa-globe  align-middle me-2"></i> Remote Friendly
                                        </a>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class="fas fa-palette  align-middle me-2"></i> Design
                                        </a>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class=" dripicons-suitcase  align-middle me-2"></i> Contract
                                        </a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card-body">
                                        <table id="state-saving-datatable"
                                            class="table table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Country</th>
                                                    <th>State</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @php($i = 1)
                                                @forelse ($gigs_2 as $item)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->role }}</td>
                                                        <td>{{ $item->company }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>{{ $item->min_salary . ' - ' . $item->max_salary }}</td>
                                                        <td>
                                                            <a href="{{ route('show.gigs', $item->id) }}"
                                                                title="Details"><i class=" fas fa-eye"
                                                                    style="color: green;"></i></a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="{{ route('delete.gigs', $item->id) }}"
                                                                title="Delete" id="delete_confirm"><i
                                                                    class="mdi mdi-delete" style="color: red;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                    </div>
                                </div> <!-- end col -->

                            </div>

                            <div class="tab-pane" id="messages1" role="tabpanel">

                                <div class="card-body">
                                    <div class="button-items" id="center">
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            Freelance
                                        </a>
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-outline-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fas fa-key"></i>
                                                Keywords <i class="mdi mdi-chevron-down"></i></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-outline-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="dripicons-location"></i> Location <i
                                                    class="mdi mdi-chevron-down"></i></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class="fas fa-globe  align-middle me-2"></i> Remote Friendly
                                        </a>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class="fas fa-palette  align-middle me-2"></i> Design
                                        </a>
                                        <a type="button"
                                            class="btn btn-outline-light waves-effect waves-effect waves-light">
                                            <i class=" dripicons-suitcase  align-middle me-2"></i> Contract
                                        </a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card-body">
                                        <table id="state-saving-datatable"
                                            class="table table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Country</th>
                                                    <th>State</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                            <tbody>
                                                @php($i = 1)
                                                @forelse ($gigs_3 as $item)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->role }}</td>
                                                        <td>{{ $item->company }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>{{ $item->min_salary . ' - ' . $item->max_salary }}</td>
                                                        <td>
                                                            <a href="{{ route('show.gigs', $item->id) }}"
                                                                title="Details"><i class=" fas fa-eye"
                                                                    style="color: green;"></i></a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="{{ route('delete.gigs', $item->id) }}"
                                                                title="Delete" id="deleted"><i class="mdi mdi-delete"
                                                                    style="color: red;"></i></a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            </tbody>
                                        </table>

                                    </div>
                                </div> <!-- end col -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->
@endsection
