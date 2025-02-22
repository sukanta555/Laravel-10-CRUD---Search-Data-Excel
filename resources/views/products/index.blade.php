@extends('products.layout')

@section('content')
        
            <div class="row">
                <div class="pull-left mt-1">
                <h2>Laravel 10 CRUD - Search Data & Excel</h2>
            </div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-success" href="{{ route('products.create') }}" title="Create New Product">
                        <i class="fa fa-plus-square-o" style="font-size:28px;color:rgb(242, 235, 235)"></i></a>
                    <a class="btn btn-success" href="{{ route('products.download.all') }}" title="Download All Products (Excel)">
                        <i class="fa fa-file-excel-o" style="font-size:28px;color:rgb(244, 240, 240)"></i></a>
                </div>
            </div>
            <!-- Data Search Form -->
            <form action="{{ route('products.index') }}" method="GET" class="mb-3 mt-1">
                <div class="input-group" style="width: 73%;">
                    <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request()->query('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                    @if(request()->query('search'))
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Clear</a>
                    @endif
                </div>
            </form>

            <!-- Date Search Form -->
        <form action="{{ route('products.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="start_date" class="form-control" value="{{ request()->query('start_date') }}">
                </div>
                <div class="col-md-4">
                    <input type="date" name="end_date" class="form-control" value="{{ request()->query('end_date') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                    @if(request()->query('start_date') || request()->query('end_date'))
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Clear</a>
                    @endif
                </div>
            </div>
        </form>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Details</th>
            <th>Image</th>
            <th width="70px">Excel</th>
            <th width="240px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td class="truncate-text">{{ $product->detail }}</td> <!-- This's class are hide text here -->
            <td>
                @if($product->featured_image)
                    <img src="{{ asset('storage/' . $product->featured_image) }}" width="100px">
                @else
                    No Image
                @endif
            </td>
            <td>
                <a class="btn btn-success" href="{{ route('products.download', $product->id) }}" title="Download single Products (Excel)"><i class="fa fa-file-excel-o" style="font-size:28px;color:rgb(244, 240, 240)"></i></a>
            </td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>          
        </tr>
        @endforeach
    </table>
    <!----Pagination add on this line------->
		<div class="d-flex justify-content-center">
            {!! $products->links() !!}
        </div>
@endsection