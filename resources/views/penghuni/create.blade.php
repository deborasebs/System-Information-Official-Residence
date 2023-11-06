@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('penghuni.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Penghuni Baru</h4>
                      
                        <div class="form-group{{ $errors->has('namapemohon') ? ' has-error' : '' }}">
                            <label for="namapemohon" class="col-md-4 control-label">Nama Pemohon</label>
                            <div class="col-md-6">
                                <input id="namapemohon" type="text" class="form-control" name="namapemohon" value="{{ old('namapemohon') }}" required>
                                @if ($errors->has('namapemohon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namapemohon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('personalnumber') ? ' has-error' : '' }}">
                            <label for="personalnumber" class="col-md-4 control-label">Personal Number</label>
                            <div class="col-md-6">
                                <input id="personalnumber" type="text" class="form-control" name="personalnumber" value="{{ old('personalnumber') }}" required>
                                @if ($errors->has('personalnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('personalnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="jabatan" class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jabatan" required="">
                                <option value=""></option>
                                <option value="Asisten Manajer">Asisten Manajer</option>
                                <option value="Manajer">Manajer</option>
                                <option value="Deputi">Deputi</option>
                                <option value="Kepala Perwakilan">Kepala Perwakilan</option>
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('unitkerja') ? ' has-error' : '' }}">
                            <label for="unitkerja" class="col-md-4 control-label">Unit Kerja</label>
                            <div class="col-md-6">
                            <select class="form-control" name="unitkerja" required="">
                                <option value=""></option>
                                <option value="MI">MI</option>
                                <option value="Humas">Humas</option>
                                <option value="FPKP">FPKP</option>
                                <option value="FDSEK">FDSEK</option>
                                <option value="UIPUR">UIPUR</option>
                                <option value="FIKSP">FIKSP</option>
                                <option value="FPPUKIS">FPPUKIS</option>
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status" required="">
                                <option value=""></option>
                                <option value="sudahplotting">Sudah Plotting</option>
                                <option value="belumplotting">Belum Plotting</option>
                            </select>
                            </div>
                        </div>
                        

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('penghuni.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection