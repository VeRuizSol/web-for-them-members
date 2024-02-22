<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>For Them Member's - Clínica Veterinaria</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>

<body>

  <?php include('plantilla.php'); ?>

  <style>
    .mapa {
      display: flex;
      width: 100%;
      align-items: center;
      justify-content: center;
    }
  </style>

  <div class="row" style="margin-top:30px;">
    <div class="small-12">

      <p>Para ponerse en contacto con nosotros, envíe un email a <a
          href="mailto:support@forthemvets.com">support@forthemvets.com</a></p>

      <?php include('plantilla-footer.php'); ?>

    </div>
  </div>

  <div class="mapa">

    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7975.183833264618!2d-76.85998885882692!3d1.9141819922736472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2fa2e96199b569%3A0x3819cc2bf7b2d8c2!2sAlmaguer%2C%20Cauca!5e0!3m2!1ses-419!2sco!4v1697202613254!5m2!1ses-419!2sco"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>

  </div>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
  

  
</body>

</html>