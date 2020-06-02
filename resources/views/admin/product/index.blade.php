@extends('layouts.admin-auth');
@section('title', $title)

@section('page-content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <a class="btn btn-github" href="{{ route('products.create') }}">
                        <span class="btn-label"><i class="material-icons">add</i></span>Add Product<div class="ripple-container"></div>
                    </a>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if (count($products) > 0)

                                        <?php $inc = 1; ?>

                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $inc }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td><img src="{{ $product->image }}" alt="{{ $product->name }}" height="60px"></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ number_format($product->price, 2) }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                                                    <form class="displayinline" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-danger btn-just-icon like"><i class="material-icons">close</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $inc++; ?>
                                        @endforeach

                                    @else

                                        <tr>
                                            <td class="text-center" colspan="6">No Data Found</td>
                                        </tr>

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-scripts')

<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            processing: false,
            serverSide: false,
            pagingType: "full_numbers",
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
    });
</script>

@endsection