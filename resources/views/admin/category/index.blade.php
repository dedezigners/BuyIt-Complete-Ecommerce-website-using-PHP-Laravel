@extends('layouts.admin-auth');
@section('title', $title)

@section('page-content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <!-- <button class="btn btn-github" data-toggle="modal" data-target="#add__category">
                        <span class="btn-label"><i class="material-icons">add</i></span>Add Category<div class="ripple-container"></div>
                    </button> -->
                    <a class="btn btn-github" href="{{ route('categories.create') }}">
                        <span class="btn-label"><i class="material-icons">add</i></span>Add Category<div class="ripple-container"></div>
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
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if (count($categories) > 0)

                                        <?php $inc = 1; ?>

                                        @foreach ($categories as $cat)
                                            <tr>
                                                <td>{{ $inc }}</td>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->slug }}</td>
                                                <td>{{ date('M d, Y H:i A', strtotime($cat->created_at)) }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('categories.edit', ['category' => $cat->id]) }}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                                                    <form class="displayinline" action="{{ route('categories.destroy', ['category' => $cat->id]) }}" method="post">
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

<div class="modal fade" id="add__category" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderbottomlight pb15">
                <h4 class="modal-title fw6 textuppercase">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body">
                <form class="__form_js row" method="POST">
                    @csrf

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Category Name" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div id="form-message"></div>
                    </div>

                    <div class="col-md-12">
                        <div class="text-center mt20">
                            <button class="btn btn-round btn-github">Save</button>
                        </div>
                    </div>
                </form>
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
        
        $(document).on('submit', '.__form_js', function(event){
            formMessage = $('#form-message', this);
            event.preventDefault();

            $.ajax({
                url: "{{ route('categories.store') }}",
                method: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                data: new FormData(this),
                success: function(data)
                {
                    var html = '';
                    if (data.errors) {
                        
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++) {
                            html += '<p class="m0">' + data.errors[count] + '</p>';
                        }
                        
                        html += '</div>';

                    }

                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('.__form_js')[0].reset();
                        $('#datatables').DataTable().ajax.reload();
                    }

                    formMessage.html(html);
                },
                error: function(ts, error, e)
                {
                    alert(ts.responseText);
                    console.log(ts);
                }
            });

            return false;
        });
    });
</script>

@endsection