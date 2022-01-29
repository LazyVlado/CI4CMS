<?php
//    $session = session();

?><!DOCTYPE html>
<html lang="<?php if(defined('HTML_META_LANG_CODE')) echo HTML_META_LANG_CODE; ?>" dir="ltr" base="<?php if(defined('HTML_META_LANG_CODE')) echo strtolower(HTML_META_LANG_CODE); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php if(isset($metaDescription)) echo $metaDescription; ?>">
    <meta name="language" content="<?php if(defined('HTML_META_LANG_CODE')) echo HTML_META_LANG_CODE; ?>">
    <meta name="region" content="<?php if(defined('HTML_META_REGION')) echo HTML_META_REGION; ?>">

    <link rel="canonical" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title><?= $pageTitle; ?></title>
<body class="container">

<div class="header row">

    <div class="logo col-6"><a href="/">CI4 CMS</a></div>

    <div class="user col-6 text-end">
    <?php if( $_SESSION['isSignedIn'] ): ?>
        <a href="/dashboard">Dešbórd</a><br>
        <a href="/logout">LOGOUT</a>
    <?php else: ?>
        <a href="/login">LOGIN</a><br>
        <a href="/register">REGISTER</a>
    <?php endif; ?>
    </div>

</div>

<hr>

<section class="body row">


