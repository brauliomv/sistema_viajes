

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    @include('app.components.style')
</head>
    <body id="page-top">
       <div id="wrapper">
            @include('app.partials.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('app.partials.header')
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                </div>
                @include('app.partials.footer')
            </div>
       </div>
       @include('app.components.scripts')
    </body>
</html>