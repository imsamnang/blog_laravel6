@include('layouts.partials._head')
  <body>
    {{-- Default Boostrap Navbar --}}
    @include('layouts.partials._nav')

    <div class="container">
      @yield('content')
    </div>
    
@include('layouts.partials._footer')  