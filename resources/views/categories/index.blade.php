@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            @include('common.status')
            @if (count($categories) > 0)
                <div id="content">
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active">
                            <h1>Your categories</h1>
                            <div class="table-responsive">
                                <table class="table table-striped task-table table-condensed">
                                    <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        @include('categories.sub.category-row')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a type="button" class="btn btn-primary"
                       href="{{ route('categories.create') }}">
                        Add new
                    </a>
                </div>
            @else
                <h3>You don't have any categories yet.</h3>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create New Category
                    </div>
                    <div class="panel-body">
                        @include('categories.sub.create-category')
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
