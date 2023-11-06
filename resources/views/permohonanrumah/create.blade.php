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

<form method="POST" action="{{ route('permohonanrumah.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Permohonan Rumah</h4>
                      
                        <div class="form-group{{ $errors->has('notadinas') ? ' has-error' : '' }}">
                            <label for="notadinas" class="col-md-4 control-label">Nota Dinas</label>
                            <div class="col-md-6">
                                <input id="notadinas" type="text" class="form-control" name="notadinas" value="{{ old('notadinas') }}" required>
                                @if ($errors->has('notadinas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notadinas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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
                                <input id="personalnumber" type="number" class="form-control" name="personalnumber" value="{{ old('personalnumber') }}" required>
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
                                <input id="jabatan" type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}" required>
                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tmtjabatan') ? ' has-error' : '' }}">
                            <label for="tmtjabatan" class="col-md-4 control-label">TMT Jabatan</label>
                            <div class="col-md-6">
                                <input id="tmtjabatan" type="date" class="form-control" name="tmtjabatan" value="{{ old('tmtjabatan') }}" required>
                                @if ($errors->has('tmtjabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tmtjabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('unitkerja') ? ' has-error' : '' }}">
                            <label for="unitkerja" class="col-md-4 control-label">Unit Kerja</label>
                            <div class="col-md-6">
                                <input id="unitkerja" type="text" class="form-control" name="unitkerja" value="{{ old('unitkerja') }}" required>
                                @if ($errors->has('unitkerja'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unitkerja') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="uploadsk" class="col-md-4 control-label">Upload SK</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="uploadsk">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('permohonanrumah.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection