@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('common.status')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editing Category <strong>{{$category->name}}</strong>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($category,
                            [
                                'action' => ['CategoriesController@update', $category->id],
                                'method' => 'PUT'
                            ]
                        ) !!}
                        <div class="form-group row">
                            {!! Form::label(
                                'name',
                                'Category Name',
                                [
                                    'class' => 'col-sm-3 col-sm-offset-1 control-label text-right'
                                ]
                                ) !!}
                            <div class="col-sm-6">
                                {!! Form::text(
                                    'name',
                                    null,
                                    [
                                        'class' => 'form-control'
                                    ]
                                    ) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label(
                                'description',
                                'Category Description',
                                [
                                    'class' => 'col-sm-3 col-sm-offset-1 control-label text-right'
                                ]
                                ) !!}
                            <div class="col-sm-6">
                                {!! Form::textarea(
                                    'description',
                                    null,
                                    [
                                        'class' => 'form-control'
                                    ]
                                    ) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label(
                                'color',
                                'Color',
                                [
                                    'class' => 'col-sm-3 col-sm-offset-1 control-label text-right'
                                ]
                                ) !!}
                            <div class="col-sm-6">
                                {!! Form::select('color',
                                    [
                                        'Red' => 'Red',
                                        'Orange' => 'Orange',
                                        'Yellow' => 'Yellow',
                                        'Green' => 'Green',
                                        'Blue' => 'Blue',
                                        'Indigo' => 'Indigo',
                                        'Violet' => 'Violet'
                                    ],
                                    $category->color,
                                    [
                                        'class'  => 'form-control'
                                    ]
                                    ) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-offset-4 col-sm-6">
                                {{Form::button('<span class="fa fa-save fa-fw" aria-hidden="true"></span> <span class="hidden-xxs">Save</span> <span class="hidden-xs">Changes</span>', array('type' => 'submit', 'class' => 'btn btn-success btn-block'))}}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('categories.index') }}"
                           class="btn btn-sm btn-info" type="button">
                            <span class="fa fa-reply" aria-hidden="true"></span>
                            Back to Categories
                        </a>
                        {!! Form::open([
                            'class' => 'form-inline pull-right',
                            'method' => 'DELETE',
                            'route' => ['categories.destroy', $category->id]
                            ]) !!}
                        {{ method_field('DELETE') }}
                        {{Form::button('<span class="fa fa-trash fa-fw"
                        aria-hidden="true"></span> <span
                        class="hidden-xxs">Delete</span> <span
                        class="hidden-sm hidden-xs">Category</span>',
                        [
                            'type' => 'submit',
                            'class' => 'btn btn-danger'
                        ] )}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
