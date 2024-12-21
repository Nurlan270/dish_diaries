<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Arvo'>

    <title>404 | {{ __('error.404.page_title') }} - {{ config('app.name') }}</title>
</head>

<body>

<section class="page_404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="col-sm-10 col-sm-offset-1  text-center">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center ">404</h1>
                    </div>

                    <div class="contant_box_404">
                        <h3 class="h2">
                            {{ __('error.404.title') }}
                        </h3>

                        <p>{{ __('error.404.description') }}</p>

                        <a href="{{ route('main') }}" class="link_404">{{ __('actions.go_home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
