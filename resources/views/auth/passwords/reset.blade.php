<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SIRH</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login/style.css') }}" />
    <!--
    <link rel="shortcut icon" href="../../images/favicon.png" />
-->
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/images/imss/logo_imss.png') }}" alt="logo"
                                    style="width: 300px; height: auto" />
                            </div>
                            <h4>Sistema Integral para Recursos Humanos</h4>
                            <h6 class="font-weight-light">Restablecer la contraseña</h6>
                            <form class="pt-3" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">
                                    @error('email')
                                    <x-template-message-required>
                                        {{ $message }}
                                    </x-template-message-required>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                                    @error('password')
                                    <x-template-message-required>
                                        {{ $message }}
                                    </x-template-message-required>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    <button type="submit" style="background-color: #6c757d" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Restablecer
                                    </button>
                                </div>
                            </form>
                            @if (session('status'))
                            <div class="alert alert-success mt-4">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>