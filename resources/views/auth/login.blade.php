@extends('layouts.login')

@section('content')
<div>
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
          <h1>Login Form</h1>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="text" class="form-control" placeholder="Email" required="" name="email" />
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" placeholder="Password" required="" name="password" />
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>

          <!-- <div class="form-group">
              <div class="checkbox">
                  <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat Saya
                  </label>
              </div>
          </div> -->

          <div class="form-group">
              <button type="submit" class="btn btn-success form-control">
                  LOGIN
              </button>
          </div>

          <div class="separator">
            <div class="clearfix"></div>
            <div>
              <!-- <h1><i class="fa fa-paw"></i> BPK</h1> -->
              <p>©{{ date('Y') }} All Rights Reserved</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
@endsection
