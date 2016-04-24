<!DOCTYPE html>
<html>
  <head>
    <title>Laravel</title>
    <link href="{{{ asset('/css/bootstrap.min.css') }}}" rel="stylesheet">
    <link href="{{{ asset('/fonts/css/font-awesome.min.css') }}}" rel="stylesheet">
    <link href="{{{ asset('/css/animate.min.css') }}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{{ asset('/css/custom.css') }}}" rel="stylesheet">
    <link href="{{{ asset('/css/icheck/flat/green.css') }}}" rel="stylesheet">
  </head>
  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class="animate form">
          <section class="login_content">
            {{ Form::open(array('url' => 'login')) }}
              <h1>Login Form</h1>
              @unless (!$errors->first('fail'))
                <div class="alert alert-danger">
                  {{ $errors->first('fail') }}
                </div>
              @endunless
              <div>
                 {{ Form::text('username', null, ['class' => 'form-control']) }}
              </div>
              <div>
                {{ Form::password('password', ['class' => 'form-control']) }}
              </div>
              <div>
                {{ Form::submit('Log in!', ['class' => 'btn btn-default submit']) }}
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">
                  <a href="#toregister" class="to_register"> Create Account </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Yassine</h1>
                </div>
              </div>
            {{ Form::close() }}
            <!-- form -->
          </section>
          <!-- content -->
        </div>
      </div>
    </div>
  </body>
</html>
