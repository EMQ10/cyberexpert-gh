<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0 align-items-center" style="height: 45px;">
        <div class="col-lg-8 text-center text-lg-start mb-lg-0">
            <div class="d-flex flex-wrap">
                <a href="#" class="text-light me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>45 jones Nelson Street - Adabraka</a>
                <a href="#" class="text-light me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+233 - 243 841 842</a>
                <a href="#" class="text-light me-0"><i class="fas fa-envelope text-primary me-2"></i>info@cyberexpertgh.org</a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-flex align-items-center justify-content-end">
                <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/company/cyber-security-expert-association-ghana" class="btn btn-light btn-square border rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="https://cyberexpertgh.org/" class="navbar-brand p-0">

            <h6 class="text-primary m-0"> <a href=""><img src="/img/logo2.png" alt="Logo"></a> CSEAG</h6>


        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="https://cyberexpertgh.org/" class="nav-item nav-link">Home</a>
                <a href="https://cyberexpertgh.org/?page_id=561" class="nav-item nav-link">About</a>
                <a href="https://cyberexpertgh.org/?page_id=908" class="nav-item nav-link">Membership</a>
                <a href="/" class="nav-item nav-link">Experts</a>
                <a href="https://cyberexpertgh.org/?page_id=688" class="nav-item nav-link">Resource</a>
                <a href="https://cyberexpertgh.org/?page_id=890" class="nav-item nav-link">Blog</a>
                <a href="https://cyberexpertgh.org/?page_id=812" class="nav-item nav-link">Contact</a>

            </div>
            @guest
            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Login</a>
            @else
            <a href="{{ route("dashboard") }}" class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Dashboard</a>
            @endguest

        </div>
    </nav>

</div>
<!-- Navbar & Hero End -->

