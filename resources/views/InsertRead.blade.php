@extends('product');
@section('content')
<center>
    <h1 class="text-center text-success">Welcome to Product CRUD </h1>
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add Product to System
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="insertData" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="name" class="form-control" placeholder="Product Name">
                        </div>

                        <div class="mb-2">
                            <input type="price" name="price"class="form-control" placeholder="Product Price">
                        </div>

                        <div class="mb-2">
                            <input type="file" name="image"class="form-control" placeholder="Product Name">
                        </div>

                        <div class="mb-2">
                            <select class="form-select form-control" aria-label="Product Status" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-success">Add Products</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </center>

    <div class="container">
        <div class="table-responsive">
            <table class="table mt-5">
                <thead class="bg-success text-white fw-bold">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Status</th>
                        <th scope="col">Update Product</th>
                        <th scope="col">Delete Product</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <form action="updatedelete" method="get">
                            <td class="pt-5"><input type="hidden" name="id" value="{{ $item['id'] }}">{{ $item['id'] }}</td>
                            <td class="pt-5"><input type="hidden" name="name" value="{{ $item['name'] }}">{{ $item['name'] }}</td>
                            <td><img src="images/{{ $item['image'] }}" width="100px" height="100px"> </td>
                            <td class="pt-5"><input type="hidden" name="price" value="{{ $item['price'] }}">{{ $item['price'] }}</td>
                            <td class="pt-5"><input type="hidden" name="status" value="{{ $item['status'] }}">{{ $item['status'] }}</td>
                            <td class="pt-5"><input type="submit" class="btn btn-info" name="update" value="Update"></td>
                            <td class="pt-5"><input type="submit" class="btn btn-danger" name="delete" value="Delete"></td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection