<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset( "/css/app.css") }}">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-g" style="background-color: #e3f2fd;">
            <router-link to="/"class="navbar-brand">SANDAGA</router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <router-link to="/prodact"class="nav-link">Produits</router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/boutik" class="nav-link">Boutiques</router-link>
                </li>
                <li class="nav-item">

                    <router-link to="/dashboard" class="nav-link">Dashboard</router-link>
                  </li>

              </ul>
            </div>
          </nav>
          <div class="container">
            <router-view></router-view>
          </div>
    </div>
    <script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
