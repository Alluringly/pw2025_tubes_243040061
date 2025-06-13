<?php

// Fungsi dari bagian proses logout untuk role admin dan user

session_start();
session_destroy();
header("Location: login.php");
