<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('frontend.layouts.head')	

<body>
    
        @include('frontend.layouts.header')

        @yield('main-content')
        
        @include('frontend.layouts.footer')
    </div>
</body>
</html>