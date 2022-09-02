<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>ConnectDashboard</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
  <body>
    <?php  
      require_once("../vendor/autoload.php"); 

      use App\controllers\TesteController;
      use App\core\RouterCore;

      $controller = new TesteController();
      $router = new RouterCore();
    ?>
  <script src="/assets/js/jquery.slim.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>
