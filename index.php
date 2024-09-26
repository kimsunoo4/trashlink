<?php
include 'functions.php';
if (_session('login'))
    include 'index_login.php';
else
    include 'index_public.php';
