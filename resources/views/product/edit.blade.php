@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data:</strong> not save <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row align-items-center justify-content-center h-100">
        <div class="col-12">
            <div class="card mt-md-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col text-left">Update Product</div>
                        <div class="col text-right">
                        <a href="/product" class="btn btn-xs btn-dark">
                            <i class="fa fa-backspace"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="/product/update" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="#">ID</label>
                        <input type="text" class="form-control" value="{{$data->id}}" name="id" readonly>
                      </div>
                    <div class="form-group">
                        <label for="#">Product</label>
                        <input type="text" name="product_title" class="form-control"
                            placeholder="Nama Product" value="{{ $data->product_title }}">
                    </div>
                    <div class="form-group">
                        <label for="#">Slug</label>
                        <input type="text" name="product_slug" class="form-control"
                            placeholder="Nama Merk" value="{{ $data->product_slug }}">
                    </div>
                    <div class="form-group">
                        <label for="#">Image</label>
                        <input type="text" name="product_image" class="form-control"
                            placeholder="Gambar Product" value="{{ $data->product_image }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>                    
            </div>
            </div>
        </div>
    </div>
@endsection