<section class="header-uper">
  <div class="container clearfix">
        <div class="logo" style="margin-bottom: 0px !important;">
              <figure>
                    <a href="{{ url('/') }}">
                          <img src="{{url('images/diu.png')}}" alt="">
                    </a>
              </figure>
        </div>
        <div class="right-side">
              <!-- <ul class="contact-info">
                    <li class="item">
                          <div class="">
                                <i class=""></i>
                          </div>
                          <strong></strong>
                          <br>
                          <a href="#">
                                <span></span>
                          </a>
                    </li>
                    <li class="item">
                          <div class="">
                                <i class=""></i>
                          </div>
                          <strong></strong>
                          <br>
                          <span></span>
                    </li>
              </ul> -->
              <div class="link-btn">
                   <figure>
                    <a href="{{ url('/') }}">
                          <img src="{{url('images/dor-logo.png')}}" alt="" style="max-width: 80px;">
                    </a>
              </figure>
              </div>
        </div>
  </div>
</section>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          About
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ route('director-message') }}">Message from the Director</a></li>
                  <li><a class="dropdown-item" href="{{ route('mission-vision') }}">Mission & Vision</a></li>
                  <li><a class="dropdown-item" href="{{ route('research-ethics-committee') }}">Research Ethics Committee</a></li>
                  <li><a class="dropdown-item" href="{{ route('our-team') }}">Our Team</a></li>
                  <li><a class="dropdown-item" href="{{ route('about-resources') }}">Resources</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Research Networking
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ route('research-collaboration') }}">Collaborating Research</a></li>
                  <li><a class="dropdown-item" href="{{ route('publication-source') }}">Source of Publications</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Interdisciplinary Research
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ route('interdisciplinary-research') }}">Interdisciplinary Research</a></li>
                  <li><a class="dropdown-item" href="{{ route('science-discipline') }}">Science Discipline</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Research Update
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  @foreach($researchUpdates as $researchUpdate)
                        <li><a class="dropdown-item" href="{{ route('research-update', $researchUpdate->id)}}">{{ $researchUpdate->volume }}</a></li>
                  @endforeach
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Publications
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ url('/scopus-article') }}">Scopus/ISI Article</a></li>
                  <li><a class="dropdown-item" href="{{ route('journals') }}">DIU Journals</a></li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('research-coordinator') }}">Research Co-ordinator </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('ranking') }}">Rankings </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('event') }}">Events</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Gallery
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ route('photo') }}">Photo</a></li>
                  <li><a class="dropdown-item" href="{{ route('video') }}">Video</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
