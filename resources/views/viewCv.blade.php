<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- https://superdevresources.com/wp-content/uploads/2016/05/html-resume-template.jpg -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <title>CV Temp</title>
    <link
      rel="shortcut icon"
      href="https://cdn-icons-png.flaticon.com/512/1250/1250175.png"
      type="image/x-icon"
    />
  </head>

  <body>
    <header>
      <div class="container">
        <div class="title">
          <img src='{{ asset($cv->image) }}'  alt="photo" title="my photo" />
          @auth
          {{-- أنا عامل تسجيل دخول ... طيب هل أنا ينفع أعدل على اي سي في وانا مسجل دخول .. لا طبعا لازم أكون صاحب ال أي دي اللي موجود في عنوان الصفحة  --}}
          @if ($cv->user_id == Auth::user()->id)
          {{-- مهم جدا جدا جدا كنت ناسيه  --}}
          <div class="btns">
            <a href="{{ url('/editCv/'.$cv->id) }}">
              <button class="btn primary">Edit CV</button>
            </a>  
            <a href="{{ url('/deleteCv/'.$cv->id) }}">
              <button class="btn warning">Delete CV and Create Onther</button>
            </a>  
            </div>   
            @endif
          @endauth
          
       
      <div class="main-tilte">
            <h1 class="ml3">{{ $cv->name }}</h1>
            <span>({{ $cv->name}})</span>
            <h2 class="ml2">{{$cv->job_title}}</h2>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

            <ul>
              <li><i class="fas fa-home"></i> <span>{{ $cv->address }}</span></li>
              <li>
                <i class="fas fa-envelope-square"></i>
                <span>{{ $cv->email }}</span>
              </li>
              <li class="ml7">
                <i class="fas fa-phone-alt"></i>

                <span class="letters">
                  <span>{{ $cv->phone }}</span>
                </span>
              </li>
              <li>
                <i class="fas fa-globe"></i>
                <span
                  ><a href="http://itraxacademy.com/"
                    >http://itraxacademy.com/</a
                  ></span
                >
              </li>
            </ul>
          </div>
          <div class="contact">
            <i id="bar" onclick="show()" class="fas fa-bars"></i>
            <div class="icons" id="icons">
              <a href="{{$cv->facebook}}" 
              target="_blank">
                <svg
                  fill="#4B69B0"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  class="material-design-icon__svg"
                >
                  <path
                    d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"
                  >
                    <title>Facebook icon</title>
                  </path>
                </svg>
              </a>
              <a href="{{$cv->twitter}}"
                target="_blank"
              >
                <svg
                  fill="#37B1E1"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  class="material-design-icon__svg"
                >
                  <path
                    d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"
                  >
                    <title>Twitter icon</title>
                  </path>
                </svg>
              </a>

              <a href="{{$cv->youtube}}" target="_blank">
                <svg
                  fill="#E83F3A"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  class="material-design-icon__svg tube"
                >
                  <path
                    d="M10,15L15.19,12L10,9V15M21.56,7.17C21.69,7.64 21.78,8.27 21.84,9.07C21.91,9.87 21.94,10.56 21.94,11.16L22,12C22,14.19 21.84,15.8 21.56,16.83C21.31,17.73 20.73,18.31 19.83,18.56C19.36,18.69 18.5,18.78 17.18,18.84C15.88,18.91 14.69,18.94 13.59,18.94L12,19C7.81,19 5.2,18.84 4.17,18.56C3.27,18.31 2.69,17.73 2.44,16.83C2.31,16.36 2.22,15.73 2.16,14.93C2.09,14.13 2.06,13.44 2.06,12.84L2,12C2,9.81 2.16,8.2 2.44,7.17C2.69,6.27 3.27,5.69 4.17,5.44C4.64,5.31 5.5,5.22 6.82,5.16C8.12,5.09 9.31,5.06 10.41,5.06L12,5C16.19,5 18.8,5.16 19.83,5.44C20.73,5.69 21.31,6.27 21.56,7.17Z"
                  >
                    <title>Youtube icon</title>
                  </path>
                </svg>
              </a>
              <a
              href="{{$cv->linkedin}}"
                target="_blank"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 64 64"
                  width="20px"
                >
                  <g data-name="10-LinkedIn">
                    <rect
                      width="62"
                      height="62"
                      x="1"
                      y="1"
                      fill="#0281c7"
                      rx="6"
                    ></rect>
                    <path
                      fill="#0291e0"
                      d="M57,1H7A6,6,0,0,0,1,7V17A22,22,0,0,0,23,39H41A22,22,0,0,0,63,17V7A6,6,0,0,0,57,1Z"
                    ></path>
                    <path
                      fill="#0aa8ff"
                      d="M57,1H7A6,6,0,0,0,1,7v4A6,6,0,0,1,7,5H57a6,6,0,0,1,6,6V7A6,6,0,0,0,57,1Z"
                    ></path>
                    <path
                      fill="#005a8c"
                      d="M57,59H7a6,6,0,0,1-6-6v4a6,6,0,0,0,6,6H57a6,6,0,0,0,6-6V53A6,6,0,0,1,57,59Z"
                    ></path>
                    <path
                      fill="#fff"
                      d="M54,34V50H46V33c0-2.21-2-4-6-4s-6,1.79-6,4V50H26V22h8v.95A18.069,18.069,0,0,1,40,22a15.159,15.159,0,0,1,10,3.51A11.186,11.186,0,0,1,54,34Z"
                    ></path>
                    <rect
                      width="8"
                      height="28"
                      x="10"
                      y="22"
                      fill="#fff"
                    ></rect>
                    <circle cx="14" cy="14" r="4" fill="#fff"></circle>
                    <path
                      fill="#005a8c"
                      d="M40,29c-4,0-6,1.79-6,4v3c0-2.21,2-4,6-4s6,1.79,6,4V33C46,30.79,44,29,40,29Z"
                    ></path>
                    <rect
                      width="8"
                      height="3"
                      x="46"
                      y="50"
                      fill="#005a8c"
                    ></rect>
                    <rect
                      width="8"
                      height="3"
                      x="26"
                      y="50"
                      fill="#005a8c"
                    ></rect>
                    <rect
                      width="8"
                      height="3"
                      x="10"
                      y="50"
                      fill="#005a8c"
                    ></rect>
                    <path
                      fill="#005a8c"
                      d="M14,18a4,4,0,0,1-3.7-2.5,4,4,0,1,0,7.406,0A4,4,0,0,1,14,18Z"
                    ></path>
                  </g>
                </svg>
              </a>
              <a
                href="{{$cv->github}}"
                target="_blank"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 50 50"
                  width="20px"
                >
                  <path
                    d="M17.791,46.836C18.502,46.53,19,45.823,19,45v-5.4c0-0.197,0.016-0.402,0.041-0.61C19.027,38.994,19.014,38.997,19,39 c0,0-3,0-3.6,0c-1.5,0-2.8-0.6-3.4-1.8c-0.7-1.3-1-3.5-2.8-4.7C8.9,32.3,9.1,32,9.7,32c0.6,0.1,1.9,0.9,2.7,2c0.9,1.1,1.8,2,3.4,2 c2.487,0,3.82-0.125,4.622-0.555C21.356,34.056,22.649,33,24,33v-0.025c-5.668-0.182-9.289-2.066-10.975-4.975 c-3.665,0.042-6.856,0.405-8.677,0.707c-0.058-0.327-0.108-0.656-0.151-0.987c1.797-0.296,4.843-0.647,8.345-0.714 c-0.112-0.276-0.209-0.559-0.291-0.849c-3.511-0.178-6.541-0.039-8.187,0.097c-0.02-0.332-0.047-0.663-0.051-0.999 c1.649-0.135,4.597-0.27,8.018-0.111c-0.079-0.5-0.13-1.011-0.13-1.543c0-1.7,0.6-3.5,1.7-5c-0.5-1.7-1.2-5.3,0.2-6.6 c2.7,0,4.6,1.3,5.5,2.1C21,13.4,22.9,13,25,13s4,0.4,5.6,1.1c0.9-0.8,2.8-2.1,5.5-2.1c1.5,1.4,0.7,5,0.2,6.6c1.1,1.5,1.7,3.2,1.6,5 c0,0.484-0.045,0.951-0.11,1.409c3.499-0.172,6.527-0.034,8.204,0.102c-0.002,0.337-0.033,0.666-0.051,0.999 c-1.671-0.138-4.775-0.28-8.359-0.089c-0.089,0.336-0.197,0.663-0.325,0.98c3.546,0.046,6.665,0.389,8.548,0.689 c-0.043,0.332-0.093,0.661-0.151,0.987c-1.912-0.306-5.171-0.664-8.879-0.682C35.112,30.873,31.557,32.75,26,32.969V33 c2.6,0,5,3.9,5,6.6V45c0,0.823,0.498,1.53,1.209,1.836C41.37,43.804,48,35.164,48,25C48,12.318,37.683,2,25,2S2,12.318,2,25 C2,35.164,8.63,43.804,17.791,46.836z"
                  ></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--  -->
    <hr />
    <div class="grid-table">
      <div class="container">
        <div class="table">
          <div class="main">
            <h2>About Me</h2>
          </div>

          <div class="details">
          {{ $cv->about_me }}

          </div>
        </div>
        <div class="table">
          <div class="main">
            <h2>Education</h2>
          </div>

          <div class="details">
          <ul>
            @foreach(explode(',', $cv->education) as $edu)
              <li>{{ $edu }}</li>
            @endforeach
            </ul>

          </div>
        </div>
        <div class="table">
          <div class="main">
            <h2>Experience</h2>
          </div>
          <div class="details">
            <ul>
              @foreach(explode(',', $cv->experience) as $exp)
                <li>{{ $exp }}</li>
              @endforeach
              </ul>
            {{-- <ul>
              <li>Soft Developer at <a href="#">link</a></li>
              <li>Programming Instructor at <a href="#">link</a></li>
              <li>Back Developer at <a href="#">link</a></li>
            </ul> --}}
          </div>
        </div>
        <div class="table">
          <div class="main">
            <h2>Skills</h2>
          </div>

          <div class="details">
          <ul>
            @foreach(explode(',', $cv->skills) as $skill)
              <li>{{ $skill }}</li>
            @endforeach
            </ul>
         
          </div>
        </div>
        <!--  -->
        @auth
        <div class="row">

        
          <a href="{{ url('/logout/') }}">
              <button class="btn warning">logout</button>
          </a>  
            {{-- أنا عامل تسجيل دخول ... طيب هل أنا ينفع أعدل على اي سي في وانا مسجل دخول .. لا طبعا لازم أكون صاحب ال أي دي اللي موجود في عنوان الصفحة  --}}
            @if ($cv->user_id == Auth::user()->id)
            {{-- مهم جدا جدا جدا كنت ناسيه  --}}
            <div class="btns showInMediaQuery">
              <a href="{{ url('/editCv/'.$cv->id) }}">
                <button class="btn primary">Edit CV</button>
              </a>  
              <a href="{{ url('/deleteCv/'.$cv->id) }}">
                <button class="btn warning">Delete CV and Create Onther</button>
              </a>  
              </div>   
              @endif
            </div>
              @endauth
      <!--  -->
  </div>

    </div>
  
   
    <script src="{{ asset('js/java-script.js') }}"></script>
  </body>
  
</html>
