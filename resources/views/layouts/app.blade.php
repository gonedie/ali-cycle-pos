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
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{ Html::style('admin/vendor/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('admin/vendor/metisMenu/metisMenu.min.css') }}
    {{ Html::style('admin/dist/css/sb-admin-2.css') }}
    {{ Html::style('admin/vendor/morrisjs/morris.css') }}
    {{ Html::style('admin/vendor/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('css/plugins/jquery.datetimepicker.css') }}

  </head>
  <body>
    @include('layouts/partials/sidebar')
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">Ali Cycle | Admin v1.0</a>
          </div>
          <!-- /.navbar-header -->

          <ul class="nav navbar-top-links navbar-right">
              <li>
                @if(!Auth::guest())
                  {{Auth::user()->name}}
                @endif
              </li>
              &nbsp&nbsp&nbsp
              <li>
                |
              </li>

              <!-- /.dropdown -->
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-user fa-fw"></i>
                         @if(!Auth::guest())
                           {{Auth::user()->name}}
                         @endif
                      <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="{{ url('/admin/change-password') }}"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> Logout </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <button type="submit" style="display: none;" id="logout-button" >Logout</button>
                            </form>
                        </li>
                      </li>
                  </ul>
                  <!-- /.dropdown-user -->
              </li>
              <!-- /.dropdown -->
          </ul>
          <!-- /.navbar-top-links -->
      </nav>

      <div id="page-wrapper">
          <div class="container-fluid">
                @include('flash::message')
                @yield('content')
          </div>
          <!-- /.row -->
      </div>
      <!-- /#page-wrapper -->
  </div>
    <!-- /#wrapper -->
    @include('layouts.partials.footer')
      <!-- Scripts -->
      <!-- jQuery -->
      {{ Html::script(url('admin/vendor/jquery/jquery.min.js')) }}
      <!-- Bootstrap Core JavaScript -->
      {{ Html::script(url('admin/vendor/bootstrap/js/bootstrap.min.js')) }}
      <!-- Metis Menu Plugin JavaScript -->
      {{ Html::script(url('admin/vendor/metisMenu/metisMenu.min.js')) }}
      <!-- Morris Charts JavaScript -->
      {{ Html::script(url('admin/vendor/raphael/raphael.min.js')) }}
      {{ Html::script(url('admin/vendor/morrisjs/morris.min.js')) }}
      {{ Html::script(url('admin/vendor/morrisjs/morris-data.js')) }}
      <!-- Custom Theme JavaScript -->
      {{ Html::script(url('admin/dist/js/sb-admin-2.js')) }}
      {{ Html::script(url('js/plugins/jquery.datetimepicker.js')) }}

      @stack('ext_js')
      <script>
          $('div.notifier').not('.alert-important').delay(5000).fadeOut(350);
      </script>
      <script>
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
          });
      </script>
      <script>
          (function() {
              $('.date-select').datetimepicker({
                  timepicker: false,
                  format:'Y-m-d',
                  closeOnDateSelect: true
              });
          })();
      </script>
      @yield('script')
    </body>
</html>
