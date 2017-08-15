<br />

{!! Form::model($pemeliharaan, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('kecamatan_id') ? ' has-error' : '' }}">
        <label for="kecamatan_id" class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('kecamatan_id',
                \App\Kecamatan::orderBy('nama', 'ASC')->pluck('nama', 'id'),
                $pemeliharaan->kecamatan_id, [
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
                $pemeliharaan->kelurahan_id, [
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

    <div class="form-group{{ $errors->has('atm_id') ? ' has-error' : '' }}">
        <label for="atm_id" class="control-label col-md-3 col-sm-3 col-xs-12">ATM <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('atm_id',
                \App\Atm::orderBy('kode', 'ASC')->pluck('kode', 'id'),
                $pemeliharaan->atm_id, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih ATM --'
                ]
            ) }}

            @if ($errors->has('atm_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('atm_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('tanggal', $pemeliharaan->tanggal, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'yyyy-mm-dd']) }}

            @if ($errors->has('tanggal'))
                <span class="help-block">
                    <strong>{{ $errors->first('tanggal') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nama_petugas') ? ' has-error' : '' }}">
		<label for="nama_petugas" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Petugas <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama_petugas', $pemeliharaan->nama_petugas, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Petugas']) }}

    		@if ($errors->has('nama_petugas'))
    			<span class="help-block">
    				<strong>{{ $errors->first('nama_petugas') }}</strong>
    			</span>
    		@endif
        </div>
	</div>

    <div class="form-group{{ $errors->has('telpon_petugas') ? ' has-error' : '' }}">
		<label for="telpon_petugas" class="control-label col-md-3 col-sm-3 col-xs-12">Telpon Petugas <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('telpon_petugas', $pemeliharaan->telpon_petugas, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Telpon Petugas']) }}

    		@if ($errors->has('telpon_petugas'))
    			<span class="help-block">
    				<strong>{{ $errors->first('telpon_petugas') }}</strong>
    			</span>
    		@endif
        </div>
	</div>

    <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
		<label for="keterangan" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('keterangan', $pemeliharaan->keterangan, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Keterangan', 'rows' => 3]) }}

    		@if ($errors->has('keterangan'))
    			<span class="help-block">
    				<strong>{{ $errors->first('keterangan') }}</strong>
    			</span>
    		@endif
        </div>
	</div>


    <div class="ln_solid"></div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">SIMPAN</button>
            <a href="{{url('pemeliharaan')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
