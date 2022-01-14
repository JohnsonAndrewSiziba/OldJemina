@extends('dashboard.layout')

@section('title')
    {{ $company->name }} Details
@endsection

@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('all_listings.index') }}">Listings</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $company->name }} Details</li>
            </ol>
        </nav>
    </div>

    <x-company-card :company="$company"></x-company-card>

@endsection
