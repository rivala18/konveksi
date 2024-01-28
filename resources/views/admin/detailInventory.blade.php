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
      <!-- <button class="btn btn-primary btnModalQTY">Launch Modal</button> -->

        <div class="row">
          <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Data Barang Pemotong</a>
              <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Data Barang Penjahit</a>
              <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Data Barang Pengepak</a>
            </div>
          </div>
          <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <table class="table table-sm ">
                  <tr class="bg-primary text-white">
                    <td>#</td>
                    <td>Warna</td>
                    <td></td>
                    <td>Kuantiti</td>
                    <td></td>
                    <!-- <td>Aksi</td> -->
                  </tr>
                  @foreach ($pemotong as $row)
                      <tr >
                        <td> {{$loop->iteration}} </td>
                        <td> {{ $row->color }} </td>
                        <td>
                          <div class="ion-edit btnModalColor" data-id="{{$row->id}}"></div>
                        </td>
                        <td> {{ $row->qty }} </td>
                        <td> 
                          <div class="ion-edit btnModalQTY" data-id="{{$row->id}}"></div>
                        </td>
                        <!-- <td> {{$row->qty}} </td> -->
                        
                      </tr>
                      
                      
                  @endforeach
                  <tr>
                    @if ($pemotong[0])
                      <td colspan="3">{{$pemotong[0]->employe->role->role_name}} : {{$pemotong[0]->employe->name}} </td>
                        
                    @endif
                  </tr>
                  <tr>
                        <td>Total :</td>
                        <td colspan="2">
                          {{ $totalPemotong }}
                        </td>
                      </tr>
                </table>
              </div>
              <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <table class="table table-sm ">
                  <tr class="bg-primary text-white">
                    <td>#</td>
                    <td>Warna</td>
                    <td>Kuantiti</td>
                    <td>Aksi</td>
                  </tr>
                  @foreach ($penjahit as $row)
                      <tr >
                        <td> {{$loop->iteration}} </td>
                        <td> {{$row->color}} </td>
                        <td> {{$row->qty}} </td>
                        <td>
                          <a href="#" class="badge badge-success btnModalQTY" data-id=" {{$row->id}} ">Edit</a>
                          <!-- <a href=" {{route('inventoryEdit',$row->id)}} " class="badge badge-success">Edit</a> -->
                        </td>
                      </tr>
                  @endforeach
                  <tr>
                    @if ($penjahit[0])
                      <td colspan="3">{{$penjahit[0]->employe->role->role_name}} : {{$penjahit[0]->employe->name}} </td>
                        
                    @endif
                  </tr>
                  <tr>
                        <td>Total :</td>
                        <td colspan="2">
                          {{ $totalPenjahit }}
                        </td>
                      </tr>
                </table>
              </div>
              <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                <table class="table table-sm ">
                  <tr class="bg-primary text-white">
                    <td>#</td>
                    <td>Warna</td>
                    <td>Kuantiti</td>
                    <td>Aksi</td>
                  </tr>
                  @foreach ($pengepak as $row)
                      <tr >
                        <td> {{$loop->iteration}} </td>
                        <td> {{$row->color}} </td>
                        <td> {{$row->qty}} </td>
                        <td>
                          <a href="#" class="badge badge-success btnModalQTY" data-id=" {{$row->id}} ">Edit</a>
                          <!-- <a href=" {{route('inventoryEdit',$row->id)}} " class="badge badge-success">Edit</a> -->
                        </td>
                      </tr>
                  @endforeach
                  <tr>
                    @if ($pengepak[0])
                      <td colspan="3">{{$pengepak[0]->employe->role->role_name}} : {{$pengepak[0]->employe->name}} </td>
                        
                    @endif
                  </tr>
                  <tr>
                        <td>Total :</td>
                        <td colspan="2">
                          {{ $totalPengepak }}
                        </td>
                      </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        
        

        {{-- <table class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>#</th>
              <th>Warna</th>
              <th>Kuantiti</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <div class="tab-content">
            <div class="tab-pane active" id="pemotong" role="tabpanel">...</div>
            <tbody>
              @foreach ($pemotong as $row)
                  <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$row->color}} </td>
                    <td> {{$row->qty}} </td>
                    <td> {{$row->qty}} </td>
                  </tr>
              @endforeach
            </tbody>
            <div class="tab-pane active" id="penjahit" role="tabpanel">...</div>
            <tbody>
              @foreach ($penjahit as $row)
                  <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$row->color}} </td>
                    <td> {{$row->qty}} </td>
                    <td> {{$row->qty}} </td>
                  </tr>
              @endforeach
            </tbody>
            <div class="tab-pane active" id="pengepak" role="tabpanel">...</div>
            <tbody>
              @foreach ($pengepak as $row)
                  <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$row->color}} </td>
                    <td> {{$row->qty}} </td>
                    <td> {{$row->qty}} </td>
                  </tr>
              @endforeach
            </tbody>
          </div>
        </table> --}}
      </div>
    </div>
@endsection

@push('script')
<script src="{{asset('../assets/js/custom.js')}}"></script>
<!-- <script src="{{asset('../assets/js/page/bootstrap-modal.js')}}"></script> -->
<script>

$('.btnModalQTY').click(function (e) {
  e = $(this).data('id')
  $('#colorEdit').attr('readonly', true)
  $('#qtyEdit').attr('readonly', false)
  $('#updateDataQty').show()
  $('#updateDataColor').hide() 
  console.log('edit kuantiti')
  $('#modalEdit').modal('show')
  $.ajax({
    type:'GET',
    url: '/inventory/edit/'+e,
    success:function (response) {
      // console.log(response);
      $('[name="idEdit"]').val(response[0].id);
      $('[name="idInventoryEdit"]').val(response[0].inventory_id);
      $('#colorEdit').val(response[0].color);
      $('#qtyEdit').val(response[0].qty);
    }
  })
})
$('.btnModalColor').click(function (e) {
  e = $(this).data('id')
  $('#qtyEdit').attr('readonly', true)
  $('#colorEdit').attr('readonly', false)
  $('#updateDataQty').hide()
  $('#updateDataColor').show()
  console.log('edit warna')
  $('#modalEdit').modal('show')
  $.ajax({
    type:'GET',
    url: '/inventory/edit/'+e,
    success:function (response) {
      // console.log(response);
      $('[name="idEdit"]').val(response[0].id);
      $('[name="idInventoryEdit"]').val(response[0].inventory_id);
      $('#colorEdit').val(response[0].color);
      $('#qtyEdit').val(response[0].qty);
    }
  })
})

</script>
@endpush
@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">       
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">         
    <div class="modal-content">           
      <div class="modal-header">             
        <h5 class="modal-title">Edit Data</h5>             
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
          <span aria-hidden="true">×</span>             
        </button>           
      </div>           
      <div class="modal-body">  
        <div class="form-row">
          <div class="col-auto mb-3">
            <span for="colorEdit">Warna</span>
            @csrf
            <input type="hidden" name="idEdit">
            <input type="hidden" name="idInventoryEdit">
            <input type="text" id="colorEdit" class="form-control">
          </div>
          <div class="col-auto mb-3">
            <span for="qtyEdit">Kuantiti</span>
            <input type="number" id="qtyEdit" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary updateData" id="updateDataColor">Update Warna</button>
        <button type="button" class="btn btn-primary updateData" id="updateDataQty">Update</button>
      </div>         
    </div>       
  </div>    
</div>

@endsection
@push('scriptModal')
<script>
  $('#updateDataColor').click(function () {
    formData = {
      _token: $('[name="_token"]').val(),
      id: $('[name="idEdit"]').val(),
      inventoryid: $('[name="idInventoryEdit"]').val(),
      color: $('#colorEdit').val()
    };
    // color = $('#colorEdit').val()
    // qty = $('#qtyEdit').val()
    // console.log(formData);
    $.ajax({
      type:'POST',
      url: '/inventory/edit',
      data: formData,
      success: function (response) {
        console.log(response);
      }, 
      error : function (err) {
        console.log(err);
      }
    })
  })
  $('#updateDataQty').click(function () {
    // color = $('#colorEdit').val()
    formData = {
      _token: $('[name="_token"]').val(),
      id: $('[name="idEdit"]').val(),
      inventoryid: $('[name="idInventoryEdit"]').val(response[0].id);
      qty: $('#qtyEdit').val()
    }
    // qty = $('#qtyEdit').val()
    // console.log(formData);
    $.ajax({
      type:'POST',
      url: '/inventory/edit',
      data: formData,
      success: function (response) {
        console.log(response);
      }, 
      error : function (err) {
        console.log(err);
      }
    })
  })
</script>
@endpush