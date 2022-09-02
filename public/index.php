<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Simple Framework</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
  <body>
    <?php  

      require_once("../vendor/autoload.php"); 

      use App\controllers\TesteController;

      $controller = new TesteController();
    ?>
  <script src="/assets/js/jquery.slim.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>
