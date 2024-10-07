@extends('layouts.app')
@section('title', 'Search')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Search</h1>
                <form action="{{ route('search') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" name="query" placeholder="Search for movies">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
    @endsection