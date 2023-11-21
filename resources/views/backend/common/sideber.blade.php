<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img class="p-2" src="{{asset('images/dor-logo.png')}}" alt="" style="max-width: 80px;">
        </div>
        <div class="sidebar-brand-text mx-3">DoR</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Website Slider -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('website.slider.index') }}">
            <i class='fas fa-sliders-h'></i>
            <span>Website Slider</span></a>
    </li>
    <!-- Nav Item - About -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about"
            aria-expanded="true" aria-controls="about">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span>About</span>
        </a>
        <div id="about" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About Sub Menu:</h6>
                <a class="collapse-item" href="{{ route('director.message.index') }}">Message from the Director</a>
                <a class="collapse-item" href="{{ route('mission.vision.index') }}">Mission & Vision</a>
                <a class="collapse-item" href="{{ route('research.ethics.ommittees.index') }}">Research Ethics Committee</a>
                <a class="collapse-item" href="{{ route('our.team.index') }}">Our Team</a>
                <a class="collapse-item" href="{{ route('resources.index') }}">Resources</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Research Networking -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ResearchNetworking"
            aria-expanded="true" aria-controls="ResearchNetworking">
            <i class="fa fa-solid fa-network-wired fa-sm"></i>
            <span>Research Networking</span>
        </a>
        <div id="ResearchNetworking" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub Menu:</h6>
                <a class="collapse-item" href="{{ route('collaborating.research.index') }}">Collaborating Research</a>
                <a class="collapse-item" href="{{ route('source.of.publication.index') }}">Source of Publications</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Interdisciplinary Research -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('interdisciplinary.research.index') }}">
            <i class="fa fa-list" aria-hidden="true"></i>
            <span>Interdisciplinary Research</span></a>
    </li>

    <!-- Nav Item - Research Update -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('research.update.index') }}">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Research Update</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Publications"
            aria-expanded="true" aria-controls="Publications">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Publications</span>
        </a>
        <div id="Publications" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub Menu:</h6>
                <a class="collapse-item" href="{{ route('scopus-article') }}">Scopus/ISI Article</a>
                <a class="collapse-item" href="{{ route('diu.journals.index') }}">DIU Journals</a>
            </div>
        </div>
    </li>
    
    <!-- Nav Item - Research Co-ordinator -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('research.coordinator.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Research Co-ordinator</span></a>
    </li>

    <!-- Nav Item - Rankings -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('rankings.index') }}">
            <i class="fa fa-star"></i>
            <span>Rankings</span></a>
    </li>

    <!-- Nav Item - Events -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('events.index') }}">
            <i class="fa fad fa-calendar-alt"></i>
            <span>Events</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Gallery"
            aria-expanded="true" aria-controls="Gallery">
            <i class="fa fa-image" aria-hidden="true"></i>
            <span>Gallery</span>
        </a>
        <div id="Gallery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub Menu:</h6>
                <a class="collapse-item" href="{{ route('photos.index') }}">Photo</a>
                <a class="collapse-item" href="{{ route('videos.index') }}">Video</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>