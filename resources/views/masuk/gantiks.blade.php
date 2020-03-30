<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Aplikasi Laundry Ujikom By - Roni Surya">
    <meta name="keywords" content="Ganti Kata Sandi Aplikasi Laundry">
    <meta name="author" content="JQuin">
    <title>Laundry - Ganti Kata Sandi</title>
    <link rel="apple-touch-icon" href="{{asset('admin/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/components.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/login-register.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    Ganti Kata Sandi
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Masukkan Kata Sandi Lama Dan Baru</span></p>
                                <div class="card-body">
                                    <form class="form-horizontal" method="POST" action="{{ route('pengguna.gantiPw', $jquin->id) }}">
                                        @csrf
                                        <fieldset class="form-group position-relative has-icon-left {{$errors->has('sandiLama') ? ' has-error' : ''}}">
                                            <input type="password" class="form-control" name="sandiLama" id="sandiLama" placeholder="Masukkan Kata Sandi Lama" required value="{{ old('sandiLama') }}">
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>

                                            @if($errors->has('sandiLama'))
                                                <span class="help-block text-danger">Sandi Lama Harus Diisi!</span>
                                            @endif
                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left {{$errors->has('sandiBaru') ? ' has-error' : ''}}">
                                            <input type="password" class="form-control" name="sandiBaru" id="sandiBaru" placeholder="Masukkan Kata Sandi Baru" required>
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>

                                            @if($errors->has('sandiBaru'))
                                                <span class="help-block text-danger">Sandi Baru Minimal 8 Karakter!</span>
                                            @endif
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                                <fieldset>
                                                    <input type="checkbox" id="checkPw" class="">
                                                    <label for="checkPw"> Tampilkan Sandi Baru</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary btn-block">
                                            <i class="icon-unlock"></i> Simpan</button>
                                    </form>
                                </div>
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>
                                    Copyright © <script>document.write(new Date().getFullYear());</script>. Dikembangkan Oleh - Roni Surya
                                </span>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin/app-assets/js/scripts/forms/form-login-register.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <!-- END: Page JS-->

    <!-- Show Password  Baru-->
    <script>
        $(document).ready(function() {
            $('#checkPw').click(function() {
                if($(this).is(':checked')){
                    $('#sandiBaru').attr('type', 'text');
                } else {
                    $('#sandiBaru').attr('type', 'password');
                }
            });
        });
    </script>
    <!-- /show password -->
    
    <!-- alert -->
    <script>
    @if(Session::has('error'))
        Swal.fire({
          title: 'Error!',
          text: 'Kata Sandi Lama Tidak Sesuai!',
          type: 'error',
          timer: 4000,
          confirmButtonText: 'Oke'
        });   
    @endif
    </script>
    <!-- /alert -->
  </body>
  <!-- END: Body-->
</html>