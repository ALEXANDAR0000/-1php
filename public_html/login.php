<?php
include_once("include/session.php");
require_once('../backend/utils/utils.php');
date_default_timezone_set('Europe/Belgrade');
//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- head -->
    <?php include("include/head.php"); ?>
    <!-- load external css -->
    <?php include("include/load_css.php"); ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        <div class="social-auth-links text-center">
        <img src="dist/img/logo.png" style="height:50px;" />
      </div>
            
                <b>
                    <?php
                    echo  Configuration::getTitle();
                    ?>
                </b>
            </a>
        </div>
       <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"><?php echo(_("Prijava korisnika"));?></p>
      <form action="#" id="formLogin" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="<?php echo(_("Korisničko ime"));?>" name="logEMail" id="logEMail">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="<?php echo(_("Lozinka"));?>" name="logPassword" id="logPassword">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <?php
        $f=get_ip_address();
        if (get_ip_address() != "127.0.0.1" && get_ip_address() != "::1") {
        ?>
          <div class="form-group has-feedback">
            <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?php echo Configuration::getReCaptchaPublicKey() ?>"></div>
          </div>
        <?php
        } else {
        ?>
          <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
        <?php
        }
        ?>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">

            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo(_("Prijava"));?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     
    </div>
    <!-- /.login-box-body -->
          <div>
           <?php if(!isset($_SESSION["Language"])){
              $_SESSION["Language"]='en_US';
            }
            ?>
            <a <?php echo $_SESSION["Language"]=='en_US'?'hidden':''?> href="locale.php?lang=en_US&link=<?php echo $_SERVER['PHP_SELF'];?>"><i class="fa fa-exchange"></i> <span><?php echo (_("Engleski"));?></span></a>
            <a <?php echo $_SESSION["Language"]=='sr-Latn-RS'?'hidden':''?> href="locale.php?lang=sr-Latn-RS&link=<?php echo $_SERVER['PHP_SELF'];?>"><i class="fa fa-exchange"></i> <span><?php echo (_("Srpski"));?></span></a>
          </div>
  </div>
  <!-- /.login-box -->

  

 <!-- load external js -->
 <?php include("include/load_js.php"); ?>
 



 <script>
  $(document).ready(function() {
    try {
      if ($("#formLogin").length == 0) {
        return;
      }
      $('#formLogin').bootstrapValidator({
          live: 'disabled',
          fields: {
            logEMail: {
              validators: {
                notEmpty: {
                  message: 'Unesite validnu email adresu'
                },
                emailAddress: {
                  message: 'Email adresa nije validna'
                }
              }
            },
            logPassword: {
              validators: {
                notEmpty: {
                  message: 'Unesite lozinku'
                },
                stringLength: {
                  min: 6,
                  max: 20,
                  message: 'Lozinka mora imati minimalno 6 a maksimalno 20 karaktera'
                }
              }
            }
          }
        })
        .on('success.form.bv', function(e) {
          e.preventDefault();
          $('#btnSubmit').hide();
          $('#btnProgressLogin').show();
          try {
            $.ajax({
              type: "POST",
              cache: false,
              data: {
                'logEMail': $('#logEMail').val(),
                'logPassword': $('#logPassword').val(),
                'g-recaptcha-response': $('#g-recaptcha-response').val()
              },
              url: "api/actions/actionLogin.php",
              success: function(data) {
                console.log(data)
                window.location.href = data.redirect_page;
              },
              error: function(request, status, error) {
                grecaptcha.reset();
                $('#btnSubmit').show();
                $('#btnProgressLogin').hide();
                var json_response = $.parseJSON(request.responseText);
                PNotify.removeAll();
                new PNotify({
                  title: json_response.title,
								  text: json_response.message,
								  delay: 5000,
								  type: 'error',
								  styling: 'bootstrap3'
                });
              }
            });
          } catch (err) {
            $('#btnSubmit').show();
            $('#btnProgressLogin').hide();
            alert(err.message);
          }
        });
    } catch (err) {
      alert(err.message);
    }
  });
</script>
</body>
</html>