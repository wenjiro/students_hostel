<?php
session_start();
unset($_SESSION['array']);
session_destroy();
header('Location: /');
