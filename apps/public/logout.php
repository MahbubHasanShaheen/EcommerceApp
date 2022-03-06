<?php
session_destroy();

header("Location:".appsConfig::Link('login'));

?>