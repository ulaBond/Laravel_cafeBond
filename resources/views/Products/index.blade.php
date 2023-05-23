@extends('layouts.app')

@section('content')
<!-- content categories list-->
<div class="box-header with-border">
    <h3 class="box-title"><strong>Product List manage</strong></h3>
    <div class="add">
    <a href="addproduct" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>New</a>
    </div>
<!--  форма список категорий для фильтрации данных -->
    <div class="pull-right">
        <form class="form-inline" action="{{ url('productBycategory') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Category:</label>
                <select class="form-control input-sm" name="category_id" onChange=submit();>

                    <option value="0">All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id}}"
                        @if(isset($selectCategory) && $category->id==$selectCategory) selected @endif
                        >{{$category->name}}</option>
                    @endforeach 
                </select>
            </div> 
        </form>
    </div>
</div>

<div class="box-body">
    @if(count($products ?? '') > 0)
    <table class="table table-bordered">
        <thead>
            <th width=3%>N/#</th>
            <th width="15%">Title</th>
            <th width="5%">Price</th>
            <th>Category</th>
            <th>Date Update</th>
            <th>Tools</th>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category_id }} - {{$product->category->name}}</td>
                <td>{{ $product->updated_at->format('d.m.Y') }}</td>
                <td>
                    <a href="{{url('editproduct/'. $product->id)}}" class='btn btn-success btn-sm edit btn-flat'><i class="fa fa-edit"></i>Edit</a>
                    <a href="{{url('deleteproduct/'. $product->id)}}" class='btn btn-danger btn-sm delete btn-flat'><i class="fa fa-trash"></i>Delete</a>
                </td>                        
            </tr>
            <tr>
                <th>Description</th>
                <td colspan=4>
                    {{ $product->description}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>Data not found </p>
    @endif
</div>
    
@endsection