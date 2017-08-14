<br />

{!! Form::model($penerima, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('kecamatan_id') ? ' has-error' : '' }}">
		<label for="kecamatan_id" class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
    		{{ Form::select('kecamatan_id',
    			\App\Kecamatan::orderBy('nama', 'ASC')->pluck('nama', 'id'),
    			$penerima->kecamatan_id, [
    				'class' => 'form-control',
    				'placeholder' => '-- Pilih Kecamatan --'
    			]
    		) }}

    		@if ($errors->has('kecamatan_id'))
    			<span class="help-block">
    				<strong>{{ $errors->first('kecamatan_id') }}</strong>
    			</span>
    		@endif
        </div>
	</div>

    <div class="form-group{{ $errors->has('kelurahan_id') ? ' has-error' : '' }}">
		<label for="kelurahan_id" class="control-label col-md-3 col-sm-3 col-xs-12">Kelurahan <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
    		{{ Form::select('kelurahan_id',
    			\App\Kelurahan::orderBy('nama', 'ASC')->pluck('nama', 'id'),
    			$penerima->kelurahan_id, [
    				'class' => 'form-control',
    				'placeholder' => '-- Pilih Kelurahan --'
    			]
    		) }}

    		@if ($errors->has('kelurahan_id'))
    			<span class="help-block">
    				<strong>{{ $errors->first('kelurahan_id') }}</strong>
    			</span>
    		@endif
        </div>
	</div>


    <div class="form-group{{ $errors->has('kode_keluarga') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Keluarga <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('kode_keluarga', $penerima->kode_keluarga, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kode Keluarga']) }}

            @if ($errors->has('kode_keluarga'))
                <span class="help-block">
                    <strong>{{ $errors->first('kode_keluarga') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nomor_kk') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor KK <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nomor_kk', $penerima->nomor_kk, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nomor KK']) }}

            @if ($errors->has('nomor_kk'))
                <span class="help-block">
                    <strong>{{ $errors->first('nomor_kk') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nomor_pkh') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor PKH <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nomor_pkh', $penerima->nomor_pkh, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nomor PKH']) }}

            @if ($errors->has('nomor_pkh'))
                <span class="help-block">
                    <strong>{{ $errors->first('nomor_pkh') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nama_istri') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Istri <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama_istri', $penerima->nama_istri, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Istri']) }}

            @if ($errors->has('nama_istri'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama_istri') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('tanggal_lahir_istri') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir Istri <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('tanggal_lahir_istri', $penerima->tanggal_lahir_istri, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Tanggal Lahir Istri']) }}

            @if ($errors->has('tanggal_lahir_istri'))
                <span class="help-block">
                    <strong>{{ $errors->first('tanggal_lahir_istri') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nik_istri') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK Istri <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nik_istri', $penerima->nik_istri, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'NIK Istri']) }}

            @if ($errors->has('nik_istri'))
                <span class="help-block">
                    <strong>{{ $errors->first('nik_istri') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nama_suami') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Suami <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama_suami', $penerima->nama_suami, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Suami']) }}

            @if ($errors->has('nama_suami'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama_suami') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('tanggal_lahir_suami') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir Suami <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('tanggal_lahir_suami', $penerima->tanggal_lahir_suami, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Tanggal Lahir Suami']) }}

            @if ($errors->has('tanggal_lahir_suami'))
                <span class="help-block">
                    <strong>{{ $errors->first('tanggal_lahir_suami') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nik_suami') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIK Suami <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nik_suami', $penerima->nik_suami, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'NIK Suami']) }}

            @if ($errors->has('nik_suami'))
                <span class="help-block">
                    <strong>{{ $errors->first('nik_suami') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('alamat', $penerima->alamat, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Alamat', 'rows' => 3]) }}

            @if ($errors->has('alamat'))
                <span class="help-block">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nama_anggota_keluarga') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Anggota Keluarga <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('nama_anggota_keluarga', $penerima->nama_anggota_keluarga, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Anggota Keluarga', 'rows' => 3]) }}

            @if ($errors->has('nama_anggota_keluarga'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama_anggota_keluarga') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('kepesertaan') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kepesertaan <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('kepesertaan', $penerima->kepesertaan, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kepesertaan', 'rows' => 3]) }}

            @if ($errors->has('kepesertaan'))
                <span class="help-block">
                    <strong>{{ $errors->first('kepesertaan') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <a href="/penerima" class="btn btn-default">BATAL</a>
            <button type="submit" class="btn btn-success">SIMPAN</button>
        </div>
    </div>

{!! Form::close() !!}
