
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{$title}}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{('template/../../assets/images/favicon.png')}}">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{('template/css/style.css')}}" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <center> <img src="{{asset('storage/images/logo.png')}}" width="100px" alt=""></center>
                                <a class="text-center" href="#"> <h5>( TPQ ) Nurul Jadid</h5></a>
                                <a class="text-center" href="#"> <h4>Silahkan login</h4></a>
                                @if($errors->any())
                              <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $val)
                                        <li>{{$val}}</li>
                                    @endforeach
                                </ul>
                              </div>
                                @endif
                                <form class="mt-5 mb-5 login-input" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="pengguna_nama" value="{{old('pengguna_nama')}}" class="form-control" placeholder="Username" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="password" class="form-control" placeholder="Password">
                                    </div>
                              
                                    <button class="btn login-form__btn submit w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    

  

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{('template/plugins/common/common.min.js')}}"></script>
    <script src="{{('template/js/custom.min.js')}}"></script>
    <script src="{{('template/js/settings.js')}}"></script>
    <script src="{{('template/js/gleek.js')}}"></script>
    <script src="{{('template/js/styleSwitcher.js')}}"></script>
    <script>
        $("input[name='admin']").change(function(){
            document.getElementById("radio1").checked = true;
            document.getElementById("radio2").checked = false;
            document.getElementById("radio3").checked = false;
        });

        $("input[name='guru']").change(function(){
            document.getElementById("radio1").checked = false;
            document.getElementById("radio2").checked = true;
            document.getElementById("radio3").checked = false;
        });
            

        $("input[name='walimurid']").change(function(){
            document.getElementById("radio1").checked = false;
            document.getElementById("radio2").checked = false;
            document.getElementById("radio3").checked = true;
        });

        </script>
</body>
</html>





