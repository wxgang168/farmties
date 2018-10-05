<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Farmties | Login</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <style>

        * {
          -ms-box-sizing: border-box;
          -moz-box-sizing: border-box;
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
          margin: 0;
          padding: 0;
          border: 0;
        }

        html,
        body {
          width: 100%;
          height: 100%;
          background: url(https://subtlepatterns.com/patterns/sativa.png) repeat fixed;
          font-family: "Open Sans", sans-serif;
          font-weight: 200;
        }

        .login {
          position: relative;
          top: 50%;
          width: 250px;
          display: table;
          margin: -150px auto 0 auto;
          background: #fff;
          border-radius: 4px;
        }

        .legend {
          position: relative;
          width: 100%;
          display: block;
          background: #27ae60;
          padding: 15px;
          color: #fff;
          font-size: 20px;
        }

        .legend:after {
            content: "";
            background-image: url(http://simpleicon.com/wp-content/uploads/multy-user.png);
            background-size: 100px 100px;
            background-repeat: no-repeat;
            background-position: 152px -16px;
            opacity: 0.06;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
        }

        .input {
          position: relative;
          width: 90%;
          margin: 15px auto;
        }

        .input span {
            position: absolute;
            display: block;
            color: darken(#ededed, 10%);
            left: 10px;
            top: 8px;
            font-size: 20px;
        }

        .input input {
            width: 100%;
            padding: 10px 5px 10px 40px;
            display: block;
            border: 1px solid #ededed;
            border-radius: 4px;
            transition: 0.2s ease-out;
            color: darken(#ededed, 30%);
        }

        .input input:focus {
            padding: 10px 5px 10px 10px;
            outline: 0;
            border-color: #27ae60;
        }

        .submit {
          width: 45px;
          height: 45px;
          display: block;
          margin: 0 auto -15px auto;
          background: #fff;
          border-radius: 100%;
          border: 1px solid #27ae60;
          color: #27ae60;
          font-size: 24px;
          cursor: pointer;
          box-shadow: 0px 0px 0px 7px #fff;
          transition: 0.2s ease-out;
        }

        .submit:hover,
        .submit:focus {
            background: #27ae60;
            color: #fff;
            outline: 0;
        }

        .feedback {
          position: absolute;
          bottom: -70px;
          width: 100%;
          text-align: center;
          color: #fff;
          background: #2ecc71;
          padding: 10px 0;
          font-size: 12px;
          display: none;
          opacity: 0;
        }

        .feedback:before {
            bottom: 100%;
            left: 50%;
            border: solid transparent;
            content: "";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(46, 204, 113, 0);
            border-bottom-color: #2ecc71;
            border-width: 10px;
            margin-left: -10px;
        }

    </style>

</head>
<body>
        @yield('content')


    <script type="text/javascript" src="/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    @yield('scripts')
</body>
</html>
