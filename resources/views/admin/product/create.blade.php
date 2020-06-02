@extends('layouts.admin-auth');
@section('title', $title)


@section('page-content')

<div class="content">
    <div class="container-fluid">
        <form class="row" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="col-md-8 col-6 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        
                        @include('inc.errors')

                        <div class="form-group">
                            <label>Select Cateogy</label>
                            <select name="category_id" class="form-control singleSelect">
                                <option value="">-- select Category --</option>
                                @foreach ($categories as $cat)

                                <option
                                    value="{{ $cat->id }}"
                                    {{ ((old('category_id') == $cat->id) ? 'selected' : '')}}
                                    >
                                    {{ $cat->name }}
                                </option>

                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Product Name" />
                        </div>
                        
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" class="form-control" name="image" />
                        </div>

                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="120.99" step="0.01" />
                        </div>
                        
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea name="description" class="form-control" id="ckeditor" cols="30" rows="6"></textarea>
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

@section('page-scripts')

<link href="/assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<script src="/assets/admin/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="/assets/admin/plugins/ckeditor/ckeditor.js"></script>
<script>
    jQuery(document).ready(function() {
        // Select2
        $(".singleSelect").select2();
        $(".limitedMultiselect").select2({
            maximumSelectionLength: 10
        });
        $(".multi-tags").select2({
        
            tags: true,
            tokenSeparators: [',', ' ']
        });

        ClassicEditor
        .create( ckeditor, {
            toolbar: [
                'heading', '|', 'bold', 'italic', 'link', 'unlink', '|', 'bulletedList', 'numberedList', 'blockQuote', 'inserttable', '|', 'undo', 'redo'
            ]
        })
        .catch( error => {
            console.error( error );
        });
    });
</script>

@endsection