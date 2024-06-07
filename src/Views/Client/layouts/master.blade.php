<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    @include('layouts.partials.head')

</head>

<body>
    <!-- Dựng base -->

    <div id="app">


        <!-- Header -->
        @include('layouts.partials.header')

        <!-- Main -->
        <div id="content">
            <div class="product">

                @yield('content')

            </div>
        </div>

        <!-- Footer -->

        @include('layouts.partials.footer')

    </div>

    <!-- Script -->
    @include('layouts.partials.script')

</body>

</html>