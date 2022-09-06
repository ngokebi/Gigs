@extends('layouts.app')
@section('index')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Country</h4>

                        <div class="page-title-right">
                            <a href="{{ route('add.country') }}" type="button"
                                class="btn btn-secondary waves-effect waves-light">
                                Add Country <i class="ri-add-box-fill   align-middle me-2"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                @if (session('success'))
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
                        </div>
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Country List</h4><br>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach ($country as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span style="color: green;">Active</span>
                                                @else
                                                    <span style="color: red;">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td> <a href="{{ route('edit.country', $item->id) }}" title="Edit"><i
                                                        class="mdi mdi-file-document-edit" style="color: green;"></i></a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="{{ route('delete.country', $item->id) }}" title="Delete"
                                                    id="deleted"><i class="mdi mdi-delete"
                                                        style="color: red;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
