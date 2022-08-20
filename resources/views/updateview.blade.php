@extends('product')
@section('content')
<br>
<h1 class="text-center text-success mt-3">Welcome to Product CRUD </h1>
<div class="col-md-4 m-auto border mt-3 p-2 border-info">
    <h2 class="text-center text-info">Update Product</h2>
    <form action="updatedata" method="get">
        <div class="mb-2">
            <label for="">Product Name</label>
            <input type="text" class="form-control" name="name" value="{{ $name }}">
        </div>

        <div class="mb-2">
            <label for="">Product Price</label>
            <input type="text" class="form-control" name="price" value="{{ $price }}">
        </div>

        <div class="mb-2">
            <label for="">Product Status</label>
            <select class="form-select form-control" aria-label="Product Status" name="status" value="{{ $status }}">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>

        <input type="hidden" class="form-control" name="name" value="{{ $id }}">

        <div class="mb-2">
            <button type="submit" class="btn btn-info">Update Products</button>
        </div>
    </form>
</div>
@endsection