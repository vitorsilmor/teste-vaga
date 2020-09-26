<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>santri</title>

    <link rel="stylesheet" href="<?php url(); ?>/static/css/w3.css">
    <link rel="stylesheet" href="<?php url(); ?>/static/css/santri.css">
    <link rel="stylesheet" href="<?php url(); ?>/static/css/toastr.css">

    <link rel="stylesheet" href="<?php url(); ?>/static/css-awesome/brands.css">
    <link rel="stylesheet" href="<?php url(); ?>/static/css-awesome/fontawesome.css">
    <link rel="stylesheet" href="<?php url(); ?>/static/css-awesome/regular.css">
    <link rel="stylesheet" href="<?php url(); ?>/static/css-awesome/solid.css">
    <link rel="stylesheet" href="<?php url(); ?>/static/css-awesome/svg-with-js.css">
    <link rel="stylesheet" href="<?php url(); ?>/static/css-awesome/v4-shims.css">
    <script src="<?php url(); ?>/static/js/jquery.js"></script>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      tr:nth-child(even) {background-color: #f2f2f2;}

      .barra-logado{
        margin:10px 0 0 0;
      }

      .hidden{
        display: none;
      }
    </style>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SANTRI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= url(); ?>/usuarios">Início <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item "></li>
            <li class="nav-item"></li>
          </ul>
          <form class="form-inline my-2 my-lg-0" method="post" action="<?= url(); ?>/logout">
            <button class="btn  my-2 my-sm-0 w3-button w3-theme" type="submit">SAIR</button>
          </form>
        </div>
    </nav>
    <section class="row">
      <div class="container">
        <div class="alert alert-info barra-logado"></div>