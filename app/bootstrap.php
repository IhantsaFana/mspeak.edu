<?php
   require_once 'libraries/Core.php';
   require_once 'libraries/Controller.php';

  // Charger Config
  require_once 'config/config.php';
  // Charger Helpers
  require_once 'helpers/session_helper.php';
  require_once 'helpers/url_helper.php';

  // Autoload les classes Core
  spl_autoload_register(function ($className) {
      require_once 'libraries/'. $className . '.php';
  });
