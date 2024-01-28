@extends('template.layout')

@section('title')
    Inventaris
@endsection

@push('style')
    
@endpush

@section('contentTitle')
    <h1>Data Pegawai</h1>
@endsection

@section('content')
    <div class="card">
      <div class="card-body">
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
        window.location.href = "/employee/delete/"+e;
      }
    })
  })



</script>
@endpush