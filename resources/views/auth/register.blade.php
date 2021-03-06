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
        <div id="register" class="animate form">
          <section class="login_content">
            {{ Form::open(['url' => 'register']) }}
              <h1>Create Account</h1>
              <div>
                 {{ Form::text('nom', null, ['class' => 'form-control', 'placeholder' => "Nom"]) }}
              </div>
              <div>
                 {{ Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => "Prénom"]) }}
              </div>
              <div>
                 {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => "xyz@example.com"]) }}
              </div>
              <div>
                 {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => "Nom d'utilisateur"]) }}
              </div>
              <div>
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => "Mot de passe"]) }}
              </div>
              <div>
                {{ Form::submit('Register', ['class' => 'btn btn-default submit']) }}
              </div>
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">Already a member ?
                  <a href="{{ url('/login') }}" class="to_register"> Log in </a>
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
