@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @include('common.status')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create New Category
                </div>
                <div class="panel-body">
                    @include('categories.sub.create-category')
                </div>
                <div class="panel-footer">
                    <a href="{{ route('categories.index') }}"
                       class="btn btn-sm btn-info" type="button">
                        <span class="fa fa-reply" aria-hidden="true"></span>
                        Back to Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
