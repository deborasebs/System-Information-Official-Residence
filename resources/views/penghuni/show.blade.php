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

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Detail <b>{{$data->namapemohon}}</b> </h4>
                      <form class="forms-sample">

                        <div class="form-group">
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->layout) src="{{ asset('images/rumah/'.$data->layout) }}" @endif />
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('namapemohon') ? ' has-error' : '' }}">
                            <label for="namapemohon" class="col-md-4 control-label">kode Rumah</label>
                            <div class="col-md-6">
                                <input id="namapemohon" type="text" class="form-control" name="namapemohon" value="{{ $data->namapemohon }}" readonly="">
                                @if ($errors->has('namapemohon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namapemohon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('personalnumber') ? ' has-error' : '' }}">
                            <label for="personalnumber" class="col-md-4 control-label">personalnumber</label>
                            <div class="col-md-6">
                                <input id="personalnumber" type="text" class="form-control" name="personalnumber" value="{{ $data->personalnumber }}" readonly="">
                                @if ($errors->has('personalnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('personalnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="form-group{{ $errors->has('personalnumber') ? ' has-error' : '' }}">
                            <label for="personalnumber" class="col-md-4 control-label">personalnumber</label>
                            <div class="col-md-6">
                            <select class="form-control" name="personalnumber" disabled="">
                                <option value="cipete" {{$data->komplek === "Cipete" ? "selected" : ""}}>Cipete</option>
                                <option value="rawasari" {{$data->komplek === "Rawasari" ? "selected" : ""}}>Rawasari</option>
                                <option value="luarkomplek" {{$data->komplek === "Luar Komplek" ? "selected" : ""}}>Luar Komplek</option>
                            </select>
                            </div>
                        </div> -->
                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="jabatan" class="col-md-4 control-label">jabatan</label>
                            <div class="col-md-6">
                                <input id="jabatan" type="text" class="form-control" name="jabatan" value="{{ $data->jabatan }}" readonly>
                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('unitkerja') ? ' has-error' : '' }}">
                            <label for="unitkerja" class="col-md-4 control-label">Unit Kerja</label>
                            <div class="col-md-6">
                            <select class="form-control" name="unitkerja" disabled="">
                                <option value="PLM" {{$data->unitkerja === "PLM" ? "selected" : ""}}>PLM</option>
                                <option value="PLO" {{$data->unitkerja === "PLO" ? "selected" : ""}}>PLO</option>
                                <option value="HCM" {{$data->unitkerja === "HCM" ? "selected" : ""}}>HCM</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status" disabled="">
                                <option value="sudahplotting" {{$data->status === "sudahplotting" ? "selected" : ""}}>Sudah Plotting</option>
                                <option value="belumplotting" {{$data->status === "belumplotting" ? "selected" : ""}}>Belum Plotting</option>
                            </select>
                            </div>
                        </div>
                        <!-- <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status" disabled="">
                                <option value="terisi" {{$data->status === "Terisi" ? "selected" : ""}}>Terisi</option>
                                <option value="siaphuni" {{$data->status === "Siap Huni" ? "selected" : ""}}>Siap Huni</option>
                                <option value="perapihan" {{$data->status === "Perapihan" ? "selected" : ""}}>Perapihan</option>
                                <option value="renovasi" {{$data->status === "Renovasi" ? "selected" : ""}}>Renovasi</option>
                            </select>
                            </div>
                        </div> -->
                        
                
                        <a href="{{route('rumah.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection