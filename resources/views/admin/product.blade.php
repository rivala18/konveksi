@extends('template.layout')

@section('title')
    Inventaris
@endsection

@push('style')
    
@endpush

@section('contentTitle')
    <h1>Data Product</h1>
@endsection

@section('content')
    <div class="card">
      <div class="card-body">
        {{-- <button id="hehe" type="button" class="btn btn-primary">loh</button> --}}
        <a href="{{route('productCreate')}}" class= "btn btn-primary">Buat Produk</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Harga Produk</th>
              <th>Opsi
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $row)
              <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$row->productName}} </td>
                <td> {{$row->price}} </td>
                <td>
                  <a href=" {{route('productEdit',$row->id)}} " class="btn btn-sm btn-success ">Edit</a>
                  <a href="#" data-id="{{$row->id}}" class="btn delete btn-sm btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection


@push('script')

<script>
  @if (session('message'))
  Swal.fire(
    'Good job!',
    '{{session('message')}}',
    'success'
  );
  @endif

  $('.delete').click(function (e) {
    e = $(this).data('id');
    console.log(e);
    Swal.fire({
      title: 'Kamu yakin ingin menghapus?',
      text: "Data yang sudah di hapus tidak akan kembali!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "/product/delete/"+e;
      }
    })
  })



  </script>
@endpush