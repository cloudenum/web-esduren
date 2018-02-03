<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css">
  <!-- Pace -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/pace/pace.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/custom.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-image: url('<?php echo base_url() ?>assets/images/slide/beach2.jpg'); ">
<div class="bg-cover">
  <div class="col-xs-12 col-pusher"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url() ?>admin"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="form-login" action="<?php echo base_url() ?>admin/aksiLogin" method="post">
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
  </div>
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/vendor/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
 
    $('#form-login').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            // first_name: {
            //     validators: {
            //             stringLength: {
            //             min: 2,
            //         },
            //             notEmpty: {
            //             message: 'Please supply your first name'
            //         }
            //     }
            // },
            //  last_name: {
            //     validators: {
            //          stringLength: {
            //             min: 2,
            //         },
            //         notEmpty: {
            //             message: 'Please supply your last name'
            //         }
            //     }
            // },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your password'
                    }
                }
            },
            // phone: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Please supply your phone number'
            //         },
            //         phone: {
            //             country: 'US',
            //             message: 'Please supply a vaild phone number with area code'
            //         }
            //     }
            // },
            // address: {
            //     validators: {
            //          stringLength: {
            //             min: 8,
            //         },
            //         notEmpty: {
            //             message: 'Please supply your street address'
            //         }
            //     }
            // },
            // city: {
            //     validators: {
            //          stringLength: {
            //             min: 4,
            //         },
            //         notEmpty: {
            //             message: 'Please supply your city'
            //         }
            //     }
            // },
            // state: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Please select your state'
            //         }
            //     }
            // },
            // zip: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Please supply your zip code'
            //         },
            //         zipCode: {
            //             country: 'US',
            //             message: 'Please supply a vaild zip code'
            //         }
            //     }
            // },
            // comment: {
            //     validators: {
            //           stringLength: {
            //             min: 10,
            //             max: 200,
            //             message:'Please enter at least 10 characters and no more than 200'
            //         },
            //         notEmpty: {
            //             message: 'Please supply a description of your project'
            //         }
            //         }
            //     }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
</script>
</body>
</html>
