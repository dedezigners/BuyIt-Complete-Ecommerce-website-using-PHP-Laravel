@extends('layouts.admin-auth');
@section('title', $title)


@section('page-content')

<div class="content">
    <div class="container-fluid">
        <form class="row" method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
            @method('PUT')
            @csrf
            
            <div class="col-md-8 col-6 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        
                        @include('inc.errors')

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Category Name" />
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-github">{{ $title }}</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection