@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success mb-3" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{url('search_product')}}" method="GET">


        <input style="width: 300px;" type="text" name="search" placeholder="Search for something">

        <input type="submit" value="search">

     </form>
    <table class="table table-bordered">
        <tr>
            <th class="text-center">@sortablelink('id')</th>
            <th class="text-center">@sortablelink('Name')</th>
            <th class="text-center">@sortablelink('Details')</th>
            <th class="text-center">@sortablelink('Created At')</th>

            <th width="280px" class="text-center">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td class="align-middle text-center">{{ $product->id }}</td>
                <td class="align-middle text-center">{{ $product->name }}</td>
                <td class="align-middle text-center">{{$product->detail}}</td>
                <td class="align-middle text-center">{{ $product->created_at->format('d-m-Y') }}</td>
                <td class="" style="margin: auto">
                    <form class="text-center mt-2" action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                        @can('product-edit')
                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
    <p class="text-center text-primary mt-5"><small>Year!</small></p>
@endsection