<section class="header-uper">
  <div class="container clearfix">
        <div class="logo">
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
<nav class="navbar navbar-default">
      <div class=" ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                        <li class="active" style="">
                            <a href="{{ url('/') }}">Home </a>
                          </li>
                          <li class="dropdown" style="">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About
                                    <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" style="background-color: #002147;">
                                    <li>
                                          <a href="{{ url('/about') }}">Message from the Director</a>
                                    </li>
                                    <li>
                                          <a href="{{ url('/mission-vision') }}">Mission & Vision</a>
                                    </li>
                                    <li>
                                          <a href="{{ url('/research-ethics-committee') }}">Research Ethics Committee</a>
                                    </li>
                                    <li>
                                          <a href="{{ url('/our-team') }}">Our Team</a>
                                    </li>
                                    <li>
                                          <a href="{{ url('/about-resources') }}">Resources</a>
                                    </li>
                                    <!--<li>
                                          <a href="{{ url('/contact') }}"> Contact</a>
                                    </li>-->
                              </ul>
                        </li> 
                        <li class="dropdown" style="">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Research Networking
                                    <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" style="background-color: #002147;">
                                    <li>
                                          <a href="{{ url('/research-collaboration') }}">Collaborating Research</a>
                                    </li>
                                    <li>
                                          <a href="{{ url('/publication-source') }}">Source of Publications</a>
                                    </li>
                              </ul>
                        </li>
                        
                        <li class="dropdown" style="">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Interdisciplinary Research
                                    <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" style="background-color: #002147;">
                                    <li>
                                          <a href="{{ url('/interdisciplinary_research') }}">Interdisciplinary Research</a>
                                    </li>
                                    
                                    <li>
                                          <a href="{{ url('/science-discipline') }}">Science Discipline</a>
                                    </li>
                              </ul>
                        </li>
                          <li style="">
                                <a href="{{ url('/research-update')}}">Research Update</a>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Publications
                                    <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" style="background-color: #002147;">
                                    <li style="">
                                          <a href="{{ url('/scopus-article') }}">Scopus/ISI Article</a>
                                    </li>
                                    <li style="">
                                          <a href="{{ url('/journals') }}">DIU Journals</a>
                                    </li>
                              </ul>
                        </li>
                          <li style="">
                                <a href="{{ url('/research-coordinator') }}">Research Co-ordinator </a>
                          </li>
                          
                          <li style="">
                                <a href="{{ url('/ranking') }}">Rankings </a>
                          </li>
                          <li>
                                <a href="{{ url('/event') }}">Events</a>
                          </li>
                        
                        <li class="dropdown" style="">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery
                                    <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" style="background-color: #002147;">
                                    <li>
                                          <a href="{{ url('/photo') }}">Photo</a>
                                    </li>
                                    <li>
                                          <a href="{{ url('/video') }}">Video</a>
                                    </li>
                              </ul>
                        </li>
    
                  </ul>
           </div>
            <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
</nav>