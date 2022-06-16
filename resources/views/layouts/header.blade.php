<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Load Leaflet from CDN-->
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
  <!-- Load Esri Leaflet from CDN -->
  <script src="http://cdn-geoweb.s3.amazonaws.com/esri-leaflet/1.0.0-rc.2/esri-leaflet.js"></script>


  <script src="http://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js">
  </script>
  <link rel="stylesheet" type="text/css"
    href="http://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">

  {{-- google chart --}}
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  @if (Session::get( 'locale' )=='ar')
    <style>
      *{
        font-weight: 900 !important;
        font-size: 16px !important;
      }
    </style>
  @endif

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href=" {{ mix('css/app.css') }} ">
  <title>{{ $data->title }} </title>
</head>
