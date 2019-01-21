<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
                margin-top: 15px;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                z-index: 100
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .top-left {
                position: absolute;
                z-index: 100;
            }

.list-group-item-danger {
    color: #721c24;
    background-color: #f5c6cb;
}

.list-group-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    margin-bottom: -1px;
    border: 1px solid rgba(0,0,0,.125);
}


        </style>

        
    </head>
    <body>
    <div id="app">  


     

        


       @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" href="{{ url('/logout') }}">Logout</a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            @if (Route::has('login'))
            <div class="top-left links">
                @auth
                <router-link to="/users">Users</router-link>
                <router-link to="/posts">Posts</router-link>
                @else
                    @if (Route::has('register'))
                    
                    @endif
                @endauth
            </div>
        @endif


        <div class="flex-center position-ref full-height">

                <!-- <form action="imageUpload" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" id="">
                    <input type="submit" value="Submit">
                    </form> -->
            
         
            @auth
            <!-- <div class="content"> -->
          <router-view :users="{{$users}}" :posts="{{$posts}}">
              
        </router-view>

          <!-- <ul>
            @foreach($users as $user)
              <li >{{$user->name}}</li>
            @endforeach
          </ul> -->

            <!-- </div> -->

            @else
            <div class="content">
                <div class="title m-b-md">
                    Meet'n'Greet
                </div>

                <div class="links">

                    <a >The Social Media That Doesn't Forget</a>

                </div>
            </div>
            @endauth


                @if ($errors->any())
    <ul class="list-group">  
    {{-- // below thing, has to write ->all() --}}
    @foreach($errors->all() as $error)
        <li class="list-group-item list-group-item-danger"> {{$error}}  </li>
    
    
    @endforeach
    </ul>
    @endif

        </div>
        </div>






        <script src="{{asset('js/app.js')}}"> </script>
    </body>
</html>
