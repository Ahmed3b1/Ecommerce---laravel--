@extends('layouts.adminmaster')

@section('content')
<div class="container mt-5 mb-5">

    <a href="/adminadditem" class="btn btn-primary mt-5 mb-5">
        <i class="fas fa-plus"></i> Add Product 
    </a>

    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)    
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <img src="{{ asset($item->imagepath) }}" width="100" height="100" alt="Product Image">
                </td>
                <td>
                    <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete
                    </a>

                    <a href="/adminedititem/{{ $item->id }}" class="btn btn-success">
                        <i class="fas fa-pen"></i> Edit
                    </a>

                    <a href="/adminaddimages/{{ $item->id }}" class="btn btn-dark">
                        <i class="fas fa-image"></i> Add Image
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>   
@endsection

@push('scripts')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#myTable').DataTable();
});
</script>
@endpush
