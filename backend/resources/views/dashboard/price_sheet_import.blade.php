@extends('dashboard.layout')

@section('title')
    Price Sheet | Upload Data
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Drag-Drop-File-Input-Upload.css') }}">
@endsection

@section('main')
<div class="container">
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center">Upload ZSE Sheet</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Download Example
                <a href="" class="btn btn-outline-info btn-sm mb-2">Download</a>
            </h6>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('price_sheet_import.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="files color form-group mb-3">
                    <input type="file"  name="file" required>
                </div>
                <p>
                    <input type="submit" class="btn btn-outline-success" value="Upload">
                </p>
            </form>
        </div>
    </div>



    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center">ZSE Indices</h5>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('zse_index.store') }}" method="post">
                {{ csrf_field() }}
                <div>
                    <table class="table table-hover table-bordered table-striped">

                        <tbody>

                        <tr>
                            <th>ZSE All Share</th>
                            <td>
                                <input type="text" name="all_share_open" class="form-control" required placeholder="Open">
                            </td>
                            <td>
                                <input type="text" name="all_share_close" class="form-control" required placeholder="Close">
                            </td>
                        </tr>

                        <tr>
                            <th>ZSE Top 10</th>
                            <td>
                                <input type="text" name="top_ten_open" class="form-control" required placeholder="Open">
                            </td>
                            <td>
                                <input type="text" name="top_ten_close" class="form-control" required placeholder="Close">
                            </td>
                        </tr>

                        <tr>
                            <th>ZSE Top 15</th>
                            <td>
                                <input type="text" name="top_15_open" class="form-control" required placeholder="Open">
                            </td>
                            <td>
                                <input type="text" name="top_15_close" class="form-control" required placeholder="Close">
                            </td>
                        </tr>

                        <tr>
                            <th>ZSE Medium Cap</th>
                            <td>
                                <input type="text" name="medium_cap_open" class="form-control" required placeholder="Open">
                            </td>
                            <td>
                                <input type="text" name="medium_cap_close" class="form-control" required placeholder="Close">
                            </td>
                        </tr>

                        <tr>
                            <th>ZSE Small Cap</th>
                            <td>
                                <input type="text" name="small_cap_open" class="form-control" required placeholder="Open">
                            </td>
                            <td>
                                <input type="text" name="small_cap_close" class="form-control" required placeholder="Close">
                            </td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td colspan="2">
                                <input required class="form-control" type="date" id="datePicker" name="date">
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>

                <p>
                    <input type="submit" class="btn btn-outline-success" value="Upload">
                </p>
            </form>
        </div>
    </div>




    <div class="card mt-5" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center">Upload VFEX Sheet</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Download Example
                <a href="" class="btn btn-outline-info btn-sm mb-2">Download</a>
            </h6>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('price_sheet_vfx_import.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="files color form-group mb-3">
                    <input type="file"  name="file" required>
                </div>
                <p>
                    <input type="submit" class="btn btn-outline-success" value="Upload">
                </p>
            </form>
        </div>
    </div>


    <div class="card mt-5" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center">Upload ETF Sheet</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Download Example
                <a href="" class="btn btn-outline-info btn-sm mb-2">Download</a>
            </h6>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('price_sheet_etf_import.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="files color form-group mb-3">
                    <input type="file"  name="file" required>
                </div>
                <p>
                    <input type="submit" class="btn btn-outline-success" value="Upload">
                </p>
            </form>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script>
        document.getElementById('datePicker').valueAsDate = new Date();
    </script>
@endsection
