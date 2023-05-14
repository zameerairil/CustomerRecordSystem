@extends('admin.template')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Rekod</h2>
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
<form action="{{route('submitcust')}}" method="POST">
    @csrf
    @method('POST')
    <div class="row">
     <div class="col-xs-6 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Nama :</strong>
            <input type="text" name="name" class="form-control" placeholder="Nama" required="required" oninvalid="this.setCustomValidity('Sila masukkan nama!')"
            oninput="setCustomValidity('')" >
        </div>
     </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <strong>Contact :</strong>
                                <input type="text" class="form-control" name="contact" placeholder="Contact (Nombor sahaja)" required="required" oninvalid="this.setCustomValidity('Sila masukkan nombor contact!')"
                                        oninput="setCustomValidity('')" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <strong>Emel :</strong>
                                <input type="email" name="email" class="form-control" placeholder="Emel" required="required" oninvalid="this.setCustomValidity('Sila masukkan emel!')"
                                        oninput="setCustomValidity('')" >
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <strong>Nombor Pendaftaran Kenderaan :</strong>
                                <input type="text" name="noplate" class="form-control" placeholder="Nombor Plat" required="required" oninvalid="this.setCustomValidity('Sila Masukkan Nombor Plat!')"
                                        oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                    <select name="category" required oninvalid="this.setCustomValidity('Sila nyatakan kategori!')" oninput="setCustomValidity('')">
                                            <option value="" disabled selected>Kategori</option>
                                            <option value="1">Kereta</option>
                                            <option value="2">Motosikal</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <label for="kategori">Jenis Insurans</label>
                                <div class="new-select">
                                    <input type="checkbox" name="insutype" value="Etiqa" ><img src="etiqa.png" width="200" height="240">
                                
                                    &nbsp;<input type="checkbox" name="insutype" value="Liberity" >&nbsp;<img src="liberity.png" width="260" height="240">
                                
                                    &nbsp;&nbsp;<input type="checkbox" name="insutype" value="Allianz" >&nbsp;&nbsp;&nbsp;&nbsp;<img src="allianz.svg" width="260" height="240">
                                
                                    &nbsp;&nbsp;<input type="checkbox" name="insutype" value="Kurnia" >&nbsp;&nbsp;&nbsp;&nbsp;<img src="kurnia.png" width="160" height="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                                <strong>Tarikh Luput :</strong>
                                <input type="date" name="expiry" class="form-control" placeholder="Tarikh Luput" required="required" oninvalid="this.setCustomValidity('Sila Masukkan Tarikh Luput!')"
                                        oninput="setCustomValidity('')" >
                            </div>
                        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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