<?php
require './isLogged.php';
session_destroy();
header('Location: login.php');