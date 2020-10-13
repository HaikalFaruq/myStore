@extends('layouts.app')


@section('content')
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <h2>{{ $data->product_title }}</h2>
                                    <a href="/product" class="btn btn-xm mt-1 btn-dark">
                                        <i class="fa fa-backspace"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="#">product_title</label>
                                        <div class="form-control">{{ $data->product_title }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="#">product_slug</label>
                                        <div class="form-control">{{ $data->product_slug }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="#">product_image</label>
                                        <div class="form-control">{{ $data->product_image }}</div>
                                    </div>             
                                </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection