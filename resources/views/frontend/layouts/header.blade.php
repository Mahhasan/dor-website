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
              <ul class="contact-info">
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
              </ul>
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
                  <li><a class="dropdown-item" href="{{ url('/about') }}">Message from the Director</a></li>
                  <li><a class="dropdown-item" href="{{ url('/mission-vision') }}">Mission & Vision</a></li>
                  <li><a class="dropdown-item" href="{{ url('/research-ethics-committee') }}">Research Ethics Committee</a></li>
                  <li><a class="dropdown-item" href="{{ url('/our-team') }}">Our Team</a></li>
                  <li><a class="dropdown-item" href="{{ url('/about-resources') }}">Resources</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Research Networking
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ url('/research-collaboration') }}">Collaborating Research</a></li>
                  <li><a class="dropdown-item" href="{{ url('/publication-source') }}">Source of Publications</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Interdisciplinary Research
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ url('/interdisciplinary_research') }}">Interdisciplinary Research</a></li>
                  <li><a class="dropdown-item" href="{{ url('/science-discipline') }}">Science Discipline</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Research Update
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ url('/research-update')}}">Volume 1 No. 1</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Publications
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ url('/scopus-article') }}">Scopus/ISI Article</a></li>
                  <li><a class="dropdown-item" href="{{ url('/journals') }}">DIU Journals</a></li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/research-coordinator') }}">Research Co-ordinator </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/ranking') }}">Rankings </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/event') }}">Events</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Gallery
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147;">
                  <li><a class="dropdown-item" href="{{ url('/photo') }}">Photo</a></li>
                  <li><a class="dropdown-item" href="{{ url('/video') }}">Video</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
