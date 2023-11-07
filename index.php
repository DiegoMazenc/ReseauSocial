<?php
date_default_timezone_set('Europe/Paris');
// --- la config
require "./config.php";
// --- le routeur
require "./services/router.php";
// --- le controlleur
require "./controllers/controller_{$page}.php";
