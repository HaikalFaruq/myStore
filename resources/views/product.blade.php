@extends('layouts.app')

@section('content')
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <a href="product/create" class="btn btn-success mb-3 float-right">CREATE</a>

    <table class="table table-hover table-bordered">
      <tr class="bg-light">
        <th class="text-md-center">NO</th>
        <th class="text-md-center">Product</th>
        <th class="text-md-center">Slug</th>
        <th class="text-md-center">Image Name</th>
        <th width="280px" class="text-md-center">Action</th>
      </tr>
      @forelse ($product as $pr)
      <tr>
          <td class="text-md-center">{{ $loop->iteration }}</td>
          <td class="text-md-center">{{ $pr->product_title }}</td>
          <td class="text-md-center">{{ $pr->product_slug }}</td> 
          <td class="text-md-center">{{ $pr->product_image }}</td>
          <td class="text-md-center">
            <form action="/product/delete/{{ $pr->product_slug }}" method="post">
              @csrf
              @method('delete')
              <a href="{{'product/detail/' . $pr->product_slug}}" class="btn btn-dark">
              DETAIL
              </a>
              <a href="{{'product/edit/' . $pr->product_slug}}" class="btn btn-warning">
              EDIT
              </a>
              <button type="submit" class="btn btn-danger">
              <i class="fas fa-trash"></i></button>
            </form>
          </td>
      </tr>    
      @empty
        <tr>
          <td colspan="8" class="text-center">No Data</td>
        </tr>
      @endforelse
    </table>
    {{ $product->links() }} 
@endsection