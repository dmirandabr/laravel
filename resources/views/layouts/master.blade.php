<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bankrate.com - Compare mortgage, refinance, insurance, CD rates</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400|Roboto:400,100,300,700|Roboto+Condensed:400,300,700%7CLato:300,400,700|Varela|Varela+Round|Roboto+Condensed" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/bundle.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
@include('partials.header')
<div class="container">
    <div class="container main-content">
        <div class="row">
            <div class="col-md-12">
                @include('partials.ad-top')
            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4">
                @include('partials.oa')
                @include('partials.ad-right')
                @include('partials.most-read')
            </div>
        </div>
    </div>
</div> <!-- /container -->
@include('partials.footer')
@include('partials.js')
</body>
</html>
