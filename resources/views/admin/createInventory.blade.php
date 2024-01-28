@extends('template.layout')

@section('title')
    Inventaris
@endsection

@push('style')
    
@endpush

@section('contentTitle')
    <h1>Data Inventaris</h1>
@endsection

@section('content')

    <div class="card">
      <div class="card-body">
        <button class="btn btn-primary" id="btnCreate">Tambah Data</button>
        <button class="btn btn-primary" id="btnCreateHide">Tambah Data</button>

        <table class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>#</th>
              <th>Tanggal</th>
              <th>Produk</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $row)
                <tr>
                  <td> {{$loop->iteration}} </td>
                  <td> {{$row->date}} </td>
                  <td> {{$row->product->productName}} </td>
                  <td>
                    <a href=" {{route('inventoryDetail',$row->inventory_id)}} " class="btn btn-primary">Detail</a>
                    <button class="btn btn-danger btnDelete" data-id="{{$row->id}}">Hapus</button>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
        <div class="card-body formCreate">
            {{-- <form action=" {{route('employeeStore')}} " method="post"> --}}
                <div class="form-row">
                  <div class="col-auto mb-3">
                    <input type="text" name="color" id="color" class="form-control" placeholder="Warna">
                  </div>
                  <div class="col-auto mb-3">
                    <input type="number" name="qty" id="qty" class="form-control" placeholder="Kuantiti">
                  </div>
                  <div class="col-auto mb-3">
                    <input type="date" name="date" id="date" class="form-control" value="">
                  </div>
                  <div class="col-auto mb-3">
                    <select name="product" id="product" class="form-control">
                      @foreach ($product as $row)
                        <option value="{{$row->id}}:{{$row->productName}}">{{$row->productName}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-auto mb-3">
                    <select name="employe" id="employe" class="form-control">
                      @foreach ($employe as $row)
                        <option value="{{$row->id}}:{{$row->name}}">{{$row->name}} | {{$row->role->role_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-auto mb-3">
                    <button class="btn btn-primary btn-sm" id="tambah">Tambah</button>
                  </div>
                </div>
            {{-- </form> --}}
            <form action="#" id="myForm" method="post">
              @csrf
            <table class="table table-responsive">
              <thead>
                <th>Warna</th>
                <th>Kuantiti</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Pegawai</th>
                <th>Opsi</th>
              </thead>
              <tbody class="dataAppend">
              </tbody >
              <tfoot>
                <tr>
                  <td colspan="6">
                    <button type="#" class="btn submit btn-primary btn-block">Simpan</button>
                  </td>
                </tr>
              </tfoot>
            </table>
            </form>
            
        </div>
    </div>
@endsection

@push('script')
<script>
  
  @if (session('errors'))
  Swal.fire(
    'Good job!',
    '{{session('errors')}}',
    'warning'
  );
  $('.formCreate').show()

  @endif
  $('#tambah').click(function () {
    myArr = Array();
    myObj = {
              color:$('#color').val(),
              qty:$('#qty').val(),
              date:$('#date').val(),
              product_id:$('#product').val(),
              employe_id:$('#employe').val()
            };
    data = myArr.push(myObj)
    // console.log(myArr);
    // console.log(myArr.product_id);
    $.map(myArr,function (val,i) {
      // console.log(val.color);
      product = val.product_id.split(':');
      employe = val.employe_id.split(':');
      console.log(employe);
      // product = product[1];
      $('.dataAppend').append(`
      <tr>
      <td>
        <input type="hidden" name="color[]" value="`+val.color+`">`+val.color+`
      </td>
      <td>
        <input type="hidden" name="qty[]" value="`+val.qty+`">`+val.qty+`
      </td>
      <td>
        <input type="hidden" name="date[]" value="`+val.date+`">`+val.date+`
      </td>
      <td>
        <input type="hidden" name="product[]" value="`+product[0]+`">`+product[1]+`
      </td>
      <td>
        <input type="hidden" name="employe[]" value="`+employe[0]+`">`+employe[1]+`
      </td>
      <td><button type="button" class="remove btn btn-danger">Hapus</button></td>
      </tr>
      `)
    })
  })
  $(document).on('click', '.remove', function(){
      // var harga = $(this).find(".asd");
      // $(this).parents('tr').val();
      $(this).parents('tr').remove();
      // console.log(harga);
  });
  $('.submit').click(function () {
    data = $('#myForm').serialize()
    console.log(data);
  })
  $('.formCreate').hide()
  $('#btnCreateHide').hide()
  $('#btnCreate').click(function () {
    $('.formCreate').show()
    $('#btnCreateHide').show()
    $('#btnCreate').hide()
  })
  $('#btnCreateHide').click(function () {
    $('.formCreate').hide()
    $('#btnCreateHide').hide()
    $('#btnCreate').show()
  })
  $('.btnDelete').click(function (e) {
    e = $(this).data('id');
    // console.log(e);
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
        window.location.href = "/inventory/delete/"+e;
      }
    })
  })

</script>
@endpush