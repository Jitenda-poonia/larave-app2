<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="" class="navbar-brand ms-lg-5">
        <h1 class="display-5 m-0 text-primary">Safe<span class="text-secondary">Cam</span></h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ '/' }}" class="nav-item nav-link active">Home</a>

            @foreach (getMenuPages() as $page)
                <a href="{{ route('page', $page->url_key) }}" class="nav-item nav-link active">{{ $page->title }}</a>
            @endforeach


            {{-- <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a> --}}
            <a href="tel:+123456789" class="nav-item nav-link nav-contact bg-secondary text-white px-1 ms-lg-1"><i
                    class="bi bi-telephone-outbound me-2"></i>+123 456 789</a>
        </div>
    </div>

</nav>
{{-- <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-0">
        <a href="index.html" class="nav-item nav-link active">Home</a>
        <a href="about.html" class="nav-item nav-link">About</a>
        
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu m-0">
                <a href="price.html" class="dropdown-item">Pricing Plan</a>
                
            </div>
        </div>
        <a href="contact.html" class="nav-item nav-link">Contact</a>
        <a href="tel:+123456789" class="nav-item nav-link nav-contact bg-secondary text-white px-5 ms-lg-5"><i class="bi bi-telephone-outbound me-2"></i>+123 456 789</a>
    </div>
</div> --}}
