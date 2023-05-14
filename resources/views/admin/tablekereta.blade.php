@extends('admin.template')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
@if(Session::get('adid'))
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Senarai Pelanggan(Kereta)</h2>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Contact</th>
                                    <th>Emel</th>
                                    <th>No Plat</th>
                                    <th>Jenis Insurans</th>
                                    <th>Kadar Komisen(%)</th>
                                    <th>Tarikh Luput</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($customer as $index => $l)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $l->name }}</td>
                                    <td>{{ $l->contact }}</td>
                                    <td>{{ $l->email }}</td>
                                    <td>{{ $l->noplate }}</td>
                                    <td>{{ $l->insutype }}</td>
                                    <td>{{ $l->commrate }}</td>
                                    <td>{{date("d-m-Y",strtotime($l->expiry))}}</td>
                                    <td>
                                    <form action="{{ route('kereta.destroy',$l->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('editcustomer',$l->id) }}'">Edit</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#popup-btn').click(function() {
            // Display the pop-up window
            $('#myModal').modal('show');
        });
    </script>
    <script>
        function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
    }
</script>

@else
        <div class="alert alert-danger">
            <p>{{ $message }}<button onclick="location.href='{{ route('index') }}'">Login</button></p>
        </div>
@endif 
@endsection 
