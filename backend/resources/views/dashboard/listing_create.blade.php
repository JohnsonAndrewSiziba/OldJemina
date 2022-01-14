@extends('dashboard.layout')

@section('title')
    Listings | Create
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Registration-Form.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endsection

@section('main')

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('listings.index') }}">Listings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create New</li>
            </ol>
        </nav>
    </div>

    <div class="container text-dark">
        <div class="row register-form">
            <div class="col-md-8 offset-md-2">
                <form class="custom-form" action="{{ route('listings.store') }}" method="post">
                    {{ csrf_field() }}
                    <h1>Create New Listing</h1>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Company Name</label></div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" autofocus required name="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Sector</label></div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" required name="sector">
                            @error('sector')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <input class="btn btn-light submit-button" type="submit" value="Submit Form">
                </form>
            </div>
        </div>
    </div>

@endsection
