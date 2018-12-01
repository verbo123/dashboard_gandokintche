<?php

setcookie("account_code","",time()-3600,"/");
unset($_COOKIE["account_code"]);
  header("location:login");
exit();

