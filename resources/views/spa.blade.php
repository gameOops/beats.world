<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue SPA Demo</title>
    <link href="{{ URL:: asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link data-n-head="ssr" rel="stylesheet" type="text/css" href="css.css?family=Roboto:100,300,400,500,700,900&amp;display=swap">
    <link data-n-head="ssr" rel="stylesheet" type="text/css" href="npm/@mdi/font@latest/css/materialdesignicons.min.css">
    <style data-n-head="vuetify" type="text/css" id="vuetify-theme-stylesheet" nonce="undefined"></style>
</head>
<body>
<div id="app">
    <app></app>
</div>

<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
