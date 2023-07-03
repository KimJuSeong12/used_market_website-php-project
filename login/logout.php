<?php
session_start();
unset($_SESSION["num"]);
unset($_SESSION["userid"]);
unset($_SESSION["username"]);
unset($_SESSION["useremail"]);
unset($_SESSION["userphone"]);
unset($_SESSION["userlevel"]);
unset($_SESSION["userpoint"]);

echo "
  <script>
  self.location.href = 'http://{$_SERVER['HTTP_HOST']}/php_teampro/index.php'
  </script>
";
