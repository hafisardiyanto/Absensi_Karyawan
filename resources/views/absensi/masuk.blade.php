@extends('layouts.app-admin')
@section('content')
<h2 class="mt-3">Jam Masuk Kerja</h2>

<ol class="breadcrumb mb-3">
  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
  <li class="breadcrumb-item active">Jam Masuk Kerja</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-plus"></i> Tambah Baru</button>
  </div>

  <div class="card-body">

    {!! Form::open(['url' => 'hapus-jam/{id}']) !!}

    <div class="table table-responsive">
      <table class="table table-sm table-bordered">
        <tbody>
          <tr>
            <th colspan="2">PILIHAN AKSI</th>
          </tr>
          <tr>
            <td align="center">
              <button type="submit" class="btn btn-danger" name="delete_submit" onClick="return check();"><i class="fas fa-trash"></i> HAPUS</button>
              <div class="text-muted small">
                <strong>Keterangan:</strong> Tandai data yang akan di hapus kemudian klik tombol hapus
              </div>
            </td>
            <td align="center">
              <button class="btn btn-primary" name="update_keterangan"><i class="fas fa-save"></i> UPDATE</button>
              <div class="text-muted small">
                <strong>Keterangan:</strong> Edit di kolom input kemudian klik tombol update
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="2%" class="text-center"><input type="checkbox" name="select_all" id="select_all" value="" /></th>
            <th class="text-center">No</th>
            <th class="text-center" width="10%">NIK</th>
            <th class="text-center" width="15%">Nama</th>
            <th class="text-center" width="20%">Berangkat</th>
            <th class="text-center" width="20%">Pulang</th>
            <th class="text-center" width="20%">Keterangan Kerja</th>
            <!-- <th class="text-center">Aksi</th> -->
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach($data as $row)
          <tr>
            <td align="center"><label class="checkbox-inline"><input type="checkbox" name="checked_id[]" class="checkbox" value="{{$row->id}}" /></label></td>
            <td align="center">{{$no}}
              <input type="hidden" class="form-control" name="id_user[]" value="{{$row->id_user}}">
            </td>
            <td align="center">{{$row->nik}}</td>
            <td>{{$row->nama}}</td>
            <td align="center" class="bg-success">
              <table class="table table-bordered" style="color: white;">
                <tr>
                  <td>Senin</td>
                  <td><input type="text" class="form-control" name="masuk_senin[]" value="{{$row->masuk_senin}}"></td>
                </tr>
                <tr>
                  <td>Selasa</td>
                  <td><input type="text" class="form-control" name="masuk_selasa[]" value="{{$row->masuk_selasa}}"></td>
                </tr>
                <tr>
                  <td>Rabu</td>
                  <td><input type="text" class="form-control" name="masuk_rabu[]" value="{{$row->masuk_rabu}}"></td>
                </tr>
                <tr>
                  <td>Kamis</td>
                  <td><input type="text" class="form-control" name="masuk_kamis[]" value="{{$row->masuk_kamis}}"></td>
                </tr>
                <tr>
                  <td>Jumat</td>
                  <td><input type="text" class="form-control" name="masuk_jumat[]" value="{{$row->masuk_jumat}}"></td>
                </tr>
                <tr>
                  <td>Sabtu</td>
                  <td><input type="text" class="form-control" name="masuk_sabtu[]" value="{{$row->masuk_sabtu}}"></td>
                </tr>
                <tr>
                  <td>Minggu</td>
                  <td><input type="text" class="form-control" name="masuk_minggu[]" value="{{$row->masuk_minggu}}"></td>
                </tr>
              </table>
            </td>
            <td align="center" class="bg-danger">
              <table class="table table-bordered" style="color: white;">
                <tr>
                  <td>Senin</td>
                  <td><input type="text" class="form-control" name="keluar_senin[]" value="{{$row->keluar_senin}}"></td>
                </tr>
                <tr>
                  <td>Selasa</td>
                  <td><input type="text" class="form-control" name="keluar_selasa[]" value="{{$row->keluar_selasa}}"></td>
                </tr>
                <tr>
                  <td>Rabu</td>
                  <td><input type="text" class="form-control" name="keluar_rabu[]" value="{{$row->keluar_rabu}}"></td>
                </tr>
                <tr>
                  <td>Kamis</td>
                  <td><input type="text" class="form-control" name="keluar_kamis[]" value="{{$row->keluar_kamis}}"></td>
                </tr>
                <tr>
                  <td>Jumat</td>
                  <td><input type="text" class="form-control" name="keluar_jumat[]" value="{{$row->keluar_jumat}}"></td>
                </tr>
                <tr>
                  <td>Sabtu</td>
                  <td><input type="text" class="form-control" name="keluar_sabtu[]" value="{{$row->keluar_sabtu}}"></td>
                </tr>
                <tr>
                  <td>Minggu</td>
                  <td><input type="text" class="form-control" name="keluar_minggu[]" value="{{$row->keluar_minggu}}"></td>
                </tr>
              </table>
            </td>
            <td align="center">
              <table class="table table-bordered">
                <tr>
                  <td>Senin</td>
                  <td> @if($row->wf1 == 'WFO')
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf1[]" value="WFO" checked=""> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf1[]" value="OFF"> Off
                    </label>
                    @else
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf1[]" value="WFO"> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf1[]" value="OFF" checked=""> Off
                    </label>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Selasa</td>
                  <td>@if($row->wf2 == 'WFO')
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf2[]" value="WFO" checked=""> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf2[]" value="OFF"> Off
                    </label>
                    @else
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf2[]" value="WFO"> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf2[]" value="OFF" checked=""> Off
                    </label>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Rabu</td>
                  <td>@if($row->wf3 == 'WFO')
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf3[]" value="WFO" checked=""> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf3[]" value="OFF"> Off
                    </label>
                    @else
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf3[]" value="WFO"> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf3[]" value="OFF" checked=""> Off
                    </label>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Kamis</td>
                  <td>@if($row->wf4 == 'WFO')
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf4[]" value="WFO" checked=""> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf4[]" value="OFF"> Off
                    </label>
                    @else
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf4[]" value="WFO"> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf4[]" value="OFF" checked=""> Off
                    </label>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Jumat</td>
                  <td>@if($row->wf5 == 'WFO')
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf5[]" value="WFO" checked=""> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf5[]" value="OFF"> Off
                    </label>
                    @else
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf5[]" value="WFO"> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf5[]" value="OFF" checked=""> Off
                    </label>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Sabtu</td>
                  <td>@if($row->wf6 == 'WFO')
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf6[]" value="WFO" checked=""> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf6[]" value="OFF"> Off
                    </label>
                    @else
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf6[]" value="WFO"> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf6[]" value="OFF" checked=""> Off
                    </label>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Minggu</td>
                  <td>@if($row->wf7 == 'WFO')
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf7[]" value="WFO" checked=""> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf7[]" value="OFF"> Off
                    </label>
                    @else
                    <label class="radio-inline">
                      <input type="checkbox" title="WFO" name="wf7[]" value="WFO"> O
                    </label>
                    <label class="radio-inline">
                      <input type="checkbox" title="Libur" name="wf7[]" value="OFF" checked=""> Off
                    </label>
                    @endif
                  </td>
                </tr>
              </table>
              <div class="text-muted small">
                <strong>Keterangan:</strong> Centang <i class="fas fa-check-square"></i> pada salah satu checkbox diatas
              </div>
            </td>
            <!-- <td align="center">
            <input type="button" title="Edit Jam Berangkat" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#yourModal1{{$row->id}}" value="Edit">
          </td> -->
          </tr>
          <?php $no++; ?>
          @endforeach
        </tbody>
      </table>
    </div>

    {{Form::close()}}

  </div>
</div>

<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Input Jam Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        {!! Form::open(['url' => 'simpan-jam']) !!}
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group row mb-2">
              <label for="nama" class="col-md-4 col-form-label">{{ __('Nama *') }}</label>
              <div class="col-md-8">
                <select name="id_user" id="choices-select" class="form-select">
                  <option value="">- Pilih -</option>
                  @foreach($nama as $row)
                  <option value="{{$row->id}}">{{$row->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="wf1" class="col-md-4 col-form-label">{{ __('Senin/wf1 *') }}</label>
              <div class="col-md-5">
                <select id="wf1" type="text" class="form-select{{ $errors->has('wf1') ? ' is-invalid' : '' }}" name="wf1" value="{{ old('wf1')}}" required autofocus>
                  <option value="">- Pilih -</option>
                  <option>WFO</option>
                  <option>OFF</option>
                </select>
                @if ($errors->has('wf1'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('wf1') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="wf2" class="col-md-4 col-form-label">{{ __('Selasa/wf2 *') }}</label>
              <div class="col-md-5">
                <select id="wf2" type="text" class="form-select{{ $errors->has('wf2') ? ' is-invalid' : '' }}" name="wf2" value="{{ old('wf2')}}" required autofocus>
                  <option value="">- Pilih -</option>
                  <option>WFO</option>
                  <option>OFF</option>
                </select>
                @if ($errors->has('wf2'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('wf2') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="wf3" class="col-md-4 col-form-label">{{ __('Rabu/wf3 *') }}</label>
              <div class="col-md-5">
                <select id="wf3" type="text" class="form-select{{ $errors->has('wf3') ? ' is-invalid' : '' }}" name="wf3" value="{{ old('wf3')}}" required autofocus>
                  <option value="">- Pilih -</option>
                  <option>WFO</option>
                  <option>OFF</option>
                </select>
                @if ($errors->has('wf3'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('wf3') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="wf4" class="col-md-4 col-form-label">{{ __('Kamis/wf4 *') }}</label>
              <div class="col-md-5">
                <select id="wf4" type="text" class="form-select{{ $errors->has('wf4') ? ' is-invalid' : '' }}" name="wf4" value="{{ old('wf4')}}" required autofocus>
                  <option value="">- Pilih -</option>
                  <option>WFO</option>
                  <option>OFF</option>
                </select>
                @if ($errors->has('wf4'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('wf4') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="wf5" class="col-md-4 col-form-label">{{ __('Jumat/wf5 *') }}</label>
              <div class="col-md-5">
                <select id="wf5" type="text" class="form-select{{ $errors->has('wf5') ? ' is-invalid' : '' }}" name="wf5" value="{{ old('wf5')}}" required autofocus>
                  <option value="">- Pilih -</option>
                  <option>WFO</option>
                  <option>OFF</option>
                </select>
                @if ($errors->has('wf5'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('wf5') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="wf6" class="col-md-4 col-form-label">{{ __('Sabtu/wf6 *') }}</label>
              <div class="col-md-5">
                <select id="wf6" type="text" class="form-select{{ $errors->has('wf6') ? ' is-invalid' : '' }}" name="wf6" value="{{ old('wf6')}}" required autofocus>
                  <option value="">- Pilih -</option>
                  <option>WFO</option>
                  <option>OFF</option>
                </select>
                @if ($errors->has('wf6'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('wf6') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="wf7" class="col-md-4 col-form-label">{{ __('Minggu/wf7 *') }}</label>
              <div class="col-md-5">
                <select id="wf7" type="text" class="form-select{{ $errors->has('wf7') ? ' is-invalid' : '' }}" name="wf7" value="{{ old('wf7')}}" required autofocus>
                  <option value="">- Pilih -</option>
                  <option>WFO</option>
                  <option>OFF</option>
                </select>
                @if ($errors->has('wf7'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('wf7') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group row mb-2">
              <label for="masuk_senin" class="col-md-4 col-form-label">{{ __('Masuk Senin*') }}</label>
              <div class="col-md-5">
                <input id="masuk_senin" type="text" class="form-control{{ $errors->has('masuk_senin') ? ' is-invalid' : '' }}" name="masuk_senin" value="00:00:00" required autofocus>

                @if ($errors->has('masuk_senin'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('masuk_senin') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="masuk_selasa" class="col-md-4 col-form-label">{{ __('Masuk Selasa*') }}</label>
              <div class="col-md-5">
                <input id="masuk_selasa" type="text" class="form-control{{ $errors->has('masuk_selasa') ? ' is-invalid' : '' }}" name="masuk_selasa" value="00:00:00" required autofocus>

                @if ($errors->has('masuk_selasa'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('masuk_selasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="masuk_rabu" class="col-md-4 col-form-label">{{ __('Masuk Rabu*') }}</label>
              <div class="col-md-5">
                <input id="masuk_rabu" type="text" class="form-control{{ $errors->has('masuk_rabu') ? ' is-invalid' : '' }}" name="masuk_rabu" value="00:00:00" required autofocus>

                @if ($errors->has('masuk_rabu'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('masuk_rabu') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="masuk_kamis" class="col-md-4 col-form-label">{{ __('Masuk Kamis*') }}</label>
              <div class="col-md-5">
                <input id="masuk_kamis" type="text" class="form-control{{ $errors->has('masuk_kamis') ? ' is-invalid' : '' }}" name="masuk_kamis" value="00:00:00" required autofocus>

                @if ($errors->has('masuk_kamis'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('masuk_kamis') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="masuk_jumat" class="col-md-4 col-form-label">{{ __('Masuk Jumat*') }}</label>
              <div class="col-md-5">
                <input id="masuk_jumat" type="text" class="form-control{{ $errors->has('masuk_jumat') ? ' is-invalid' : '' }}" name="masuk_jumat" value="00:00:00" required autofocus>

                @if ($errors->has('masuk_jumat'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('masuk_jumat') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="masuk_sabtu" class="col-md-4 col-form-label">{{ __('Masuk Sabtu*') }}</label>
              <div class="col-md-5">
                <input id="masuk_sabtu" type="text" class="form-control{{ $errors->has('masuk_sabtu') ? ' is-invalid' : '' }}" name="masuk_sabtu" value="00:00:00" required autofocus>

                @if ($errors->has('masuk_sabtu'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('masuk_sabtu') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="masuk_minggu" class="col-md-4 col-form-label">{{ __('Masuk Minggu*') }}</label>
              <div class="col-md-5">
                <input id="masuk_minggu" type="text" class="form-control{{ $errors->has('masuk_minggu') ? ' is-invalid' : '' }}" name="masuk_minggu" value="00:00:00" required autofocus>

                @if ($errors->has('masuk_minggu'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('masuk_minggu') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group row mb-2">
              <label for="keluar_senin" class="col-md-4 col-form-label">{{ __('Keluar Senin*') }}</label>
              <div class="col-md-5">
                <input id="keluar_senin" type="text" class="form-control{{ $errors->has('keluar_senin') ? ' is-invalid' : '' }}" name="keluar_senin" value="00:00:00" required autofocus>

                @if ($errors->has('keluar_senin'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('keluar_senin') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="keluar_selasa" class="col-md-4 col-form-label">{{ __('Keluar Selasa*') }}</label>
              <div class="col-md-5">
                <input id="keluar_selasa" type="text" class="form-control{{ $errors->has('keluar_selasa') ? ' is-invalid' : '' }}" name="keluar_selasa" value="00:00:00" required autofocus>

                @if ($errors->has('keluar_selasa'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('keluar_selasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="keluar_rabu" class="col-md-4 col-form-label">{{ __('Keluar Rabu*') }}</label>
              <div class="col-md-5">
                <input id="keluar_rabu" type="text" class="form-control{{ $errors->has('keluar_rabu') ? ' is-invalid' : '' }}" name="keluar_rabu" value="00:00:00" required autofocus>

                @if ($errors->has('keluar_rabu'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('keluar_rabu') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="keluar_kamis" class="col-md-4 col-form-label">{{ __('Keluar Kamis*') }}</label>
              <div class="col-md-5">
                <input id="keluar_kamis" type="text" class="form-control{{ $errors->has('keluar_kamis') ? ' is-invalid' : '' }}" name="keluar_kamis" value="00:00:00" required autofocus>

                @if ($errors->has('keluar_kamis'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('keluar_kamis') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="keluar_jumat" class="col-md-4 col-form-label">{{ __('Keluar Jumat*') }}</label>
              <div class="col-md-5">
                <input id="keluar_jumat" type="text" class="form-control{{ $errors->has('keluar_jumat') ? ' is-invalid' : '' }}" name="keluar_jumat" value="00:00:00" required autofocus>

                @if ($errors->has('keluar_jumat'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('keluar_jumat') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="keluar_sabtu" class="col-md-4 col-form-label">{{ __('Keluar Sabtu*') }}</label>
              <div class="col-md-5">
                <input id="keluar_sabtu" type="text" class="form-control{{ $errors->has('keluar_sabtu') ? ' is-invalid' : '' }}" name="keluar_sabtu" value="00:00:00" required autofocus>

                @if ($errors->has('keluar_sabtu'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('keluar_sabtu') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="keluar_minggu" class="col-md-4 col-form-label">{{ __('Keluar Minggu*') }}</label>
              <div class="col-md-5">
                <input id="keluar_minggu" type="text" class="form-control{{ $errors->has('keluar_minggu') ? ' is-invalid' : '' }}" name="keluar_minggu" value="00:00:00" required autofocus>

                @if ($errors->has('keluar_minggu'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('keluar_minggu') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
      </div>

      {!! Form::close() !!}
      
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#select_all').on('click', function() {
      if (this.checked) {
        $('.checkbox').each(function() {
          this.checked = true;
        });
      } else {
        $('.checkbox').each(function() {
          this.checked = false;
        });
      }
    });
  });

  $('input[type="checkbox"]').on('change', function() {
    $(this).closest('td').find('input').not(this).prop('checked', false);
  });
</script>

@endsection