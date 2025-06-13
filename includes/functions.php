<?php

// Fungsi untuk mengecek role yang sedang login (admin atau user)

function is_admin()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function is_user()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'user';
}
