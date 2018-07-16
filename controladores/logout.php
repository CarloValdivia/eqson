<?php

session_start();

unset($_SESSION['usuario']);
unset($_SESSION['privilegio']);

header('Location: ../index.php');
