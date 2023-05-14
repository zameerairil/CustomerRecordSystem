@extends('admin.template')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Rekod</h2>
        </div>
       
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('adid')) 
<form action="{{ route('updatecustomer',$customer->id)}}" method="POST">
    @csrf
    @method('POST')
    <div class="row">
     <div class="col-xs-6 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Nama :</strong>
            <input type="text" name="name" class="form-control" placeholder="Nama" required="required" oninvalid="this.setCustomValidity('Sila masukkan nama!')"
            oninput="setCustomValidity('')" value="{{ $customer->name }}">
        </div>
     </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <strong>Contact :</strong>
                                <input type="text" class="form-control" name="contact" placeholder="Contact (Nombor sahaja)" required="required" oninvalid="this.setCustomValidity('Sila masukkan nombor contact!')"
                                        oninput="setCustomValidity('')" onkeypress="return isNumberKey(event)" value="{{ $customer->contact }}">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <strong>Emel :</strong>
                                <input type="email" name="email" class="form-control" placeholder="Emel" required="required" oninvalid="this.setCustomValidity('Sila masukkan emel!')"
                                        oninput="setCustomValidity('')" value="{{ $customer->email }}">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <strong>Nombor Pendaftaran Kenderaan :</strong>
                                <input type="text" name="noplate" class="form-control" placeholder="Nombor Plat" required="required" oninvalid="this.setCustomValidity('Sila Masukkan Nombor Plat!')"
                                        oninput="setCustomValidity('')" value="{{ $customer->noplate }}">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <label for="kategori">Kategori : 
                                    @if($customer->category=="1")
                                Kereta
                                @elseif($customer->category=="2")
                                Motosikal
                                @endif</label>
                                    <select name="category" required oninvalid="this.setCustomValidity('Sila nyatakan kategori!')" oninput="setCustomValidity('')">
                                            <option value="" disabled selected>Kategori</option>
                                            <option value="1">Kereta</option>
                                            <option value="2">Motosikal</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <label for="kategori">Jenis Insurans : {{ $customer->insutype }} Insurans</label>
                                <div class="new-select">
                                    <input type="checkbox" name="insutype" value="Etiqa" ><img src="{{ asset('etiqa.png') }}" width="200" height="240">
                                
                                    &nbsp;<input type="checkbox" name="insutype" value="Liberity" >&nbsp;<img src="{{ asset('liberity.png') }}" width="260" height="240">
                                
                                    &nbsp;&nbsp;<input type="checkbox" name="insutype" value="Allianz" >&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{ asset('allianz.svg') }}" width="260" height="240">
                                
                                    &nbsp;&nbsp;<input type="checkbox" name="insutype" value="Kurnia" >&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{ asset('kurnia.png') }}" width="160" height="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <strong>Tarikh Luput :</strong>
                                <input type="date" name="expiry" class="form-control" placeholder="Tarikh Luput" required="required" oninvalid="this.setCustomValidity('Sila Masukkan Tarikh Luput!')"
                                        oninput="setCustomValidity('')" value="{{ $customer->expiry }}">
                            </div>
                        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-primary" onclick="history.back()">Back</button>
                <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </div>
    
</form>
<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
    }
</script>
@endif
@endsection