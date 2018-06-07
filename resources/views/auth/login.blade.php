<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Root - {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{ Html::style('admin/vendor/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('admin/dist/css/sb-admin-2.css') }}

  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-md-offset-4">
                  <div class="login-panel panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">Please Sign In</h3>
                      </div>
                      <div class="panel-body">
                          <form role="form" method="POST" action="{{ route('login') }}">
                              {{ csrf_field() }}
                              <fieldset>
                                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                      <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
                                      @if ($errors->has('username'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('username') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                      @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <!-- Change this to a button or input when using this as a form -->
                                  <div class="form-group">
                                      <div>
                                          <button type="submit" class="btn btn-success btn-block">
                                              {{ __('auth.login') }}
                                          </button>
                                      </div>
                                  </div>
                                  {{-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> --}}
                              </fieldset>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Scripts -->
      <!-- jQuery -->
      <!-- Bootstrap Core JavaScript -->
      {{ Html::script(url('admin/vendor/bootstrap/js/bootstrap.min.js')) }}
      <!-- Metis Menu Plugin JavaScript -->

      @stack('ext_js')
      <script>
          $('div.notifier').not('.alert-important').delay(5000).fadeOut(350);
      </script>
      <script>
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
          });
      </script>
</body>
</html>
