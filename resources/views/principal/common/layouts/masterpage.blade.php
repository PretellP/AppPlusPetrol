<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('principal.common.partials.head')

<body>
    <div id="app">

        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('principal.common.partials.navbar')
            @include('principal.common.partials.sidebar')

            <div class="main-content @yield('main-content-extra-class')">

                <section class="section">

                    @yield('content')

                </section>

            </div>

            @include('principal.common.partials.footer')

        </div>
    </div>

    @include('principal.common.partials.scripts')

</body>

</html>