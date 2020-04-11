<nav class="navbar navbar-expand-lg navbar-dark navbar-laravel shadow-none container_main">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="image" src = "{{ asset('/images/whiteLogo.png') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-3">
                <a class="nav-link text-uppercase font-weight-bold mx-2" style='color: #fff;' href="{{url('/')}}"> All Patients </a>
                <a class="nav-link text-uppercase font-weight-bold mx-2" style='color: #fff;' href="{{url('/patients/add/init')}}"> Add New Patient </a>
            </ul>
        </div>
    </div>
</nav>