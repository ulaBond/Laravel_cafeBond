@extends('layouts.app')

@section('content')
<!-- content categories list-->
<div class="box-header with-border">
    <h3 class="box-title"><strong>Categories manage</strong></h3>
</div>
    <div class="box-body">
        <div class="add">
        <a href="addcategory" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>New</a>
        </div>
        <div class="container">
            <table id="example1" class="table table-bordered">
                <thead>
                <th>Category Name</th>
                <th>Tools</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                        <!--форма отправит на маршрут удаления записи-->
                        <form action="{{ url('deletecategory/'.$category->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!--ссылка на маршрут редактирования-->
                            <a href="{{url('editcategory/'. $category->id)}}" title="edit" type="button" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i>Edit</a>
                            <button type="submit" class='btn btn-danger btn-sm delete btn-flat'><i class='fa fa-trash'></i> Delete</button>
                        </form>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection