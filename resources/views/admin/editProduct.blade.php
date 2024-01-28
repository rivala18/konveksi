@extends('template.layout')

@section('title')
    Inventaris
@endsection

@push('style')
    
@endpush

@section('contentTitle')
    <h1>Ubah Produk</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action=" {{route('productUpdate')}} " method="post">
                @csrf
                <div class="form-group">
                    <span for="productName">Nama Product</span>
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input class="form-control 
                    @error('productName')
                        is-invalid
                    @enderror" type="text" name="productName" id="productName" value="{{old('productName',$data->productName)}}">
                    <div class="invalid-feedback">
                        @error('productName')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <span for="price">Harga Product</span>
                    <input class="form-control 
                    @error('price')
                        is-invalid
                    @enderror" type="text" name="price" id="price" value="{{old('price', $data->price)}}">
                    <div class="invalid-feedback">
                        @error('price')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('script')
    
@endpush