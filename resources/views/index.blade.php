<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>1 Gaming Pro</title>
    <link rel="icon" href="img/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="body_bg">
        <!--::header part start::-->
        @include('components.header')
        <!-- Header part end-->

        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h1>Play tournaments...
                                    And earn money</h1>
                                <p>Turn you passion into profession stats says 73% peoples who can be GAME GOD just don't try because they think gaming is not future... <b> Gamming is the future</b></p>
                                @if (!Auth::check())
                                    <a href="{{ url('login') }}" class="btn_1" style="border-radius: 20px;">Login</a>
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->

        <!--::client logo part end::-->
        <section class="client_logo">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="client_logo_slider owl-carousel d-flex justify-content-between">
                            @foreach ($games as $game)
                                <div class="single_client_logo">
                                <img src="{{asset($game->img)}}" alt="{{$game->name}} image">
                                </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--::client logo part end::-->

        <section class="Latest_War mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section_tittle text-center">
                            <h2>Latest Tournament</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12">
                        <div class="Latest_War_text" style="backgroun-size:cover; background-image: url('{{asset($tournaments->first()->game->img)}}')">
                            <div class="row justify-content-center align-items-center h-100" >
                                <div class="col-lg-6 p-5" style="background-color: #484646c7">
                                    <div class="single_war_text text-center">
                                        <h4>{{ $tournaments->first()->title}}</h4>
                                        <h2>Entry Fee: {{ $tournaments->first()->entry_fee}}</h2>
                                        <p>{{ $tournaments->first()->t_timing->format('d M yy / h:m a')}}</p>
                                        

                                    </div>
                                </div>
                            </div>
                            <a href="{{url("/participate/" . $tournaments->first()->id)}}" class="btn_2">Participate</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="latest_war_list">

                            @foreach ($tournaments as $tournament)

                                
                            
                                <div class="single_war_text border border-secondary rounded my-5 pr-3">
                                    <div class="war_text_item d-flex align-items-center">
                                        <img src="{{ asset($tournament->game->img)}}" class="rounded" alt="">
                                        <div class="war_date ml-3 w-100">
                                            <a href="#" class="d-flex justify-content-center mb-3">{{$tournament->t_timing->format('d M yy / h:m a')}} <span style="background: linear-gradient(to right, #78d8b8 0%, #78d8b8 50%, #78d8b8 100%);-webkit-background-clip: text;">Entry Fee: {{$tournament->entry_fee}}</span></a>
                                            <h1 >{{$tournament->title}}
                                            <a href="{{url("/participate/$tournament->id")}}" class="btn_2 d-inline float-right rounded px-3 py-2">Participate</a>
                                            </h1>
                                            
                                            <p>
                                                {{$tournament->description}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="war_text_item">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about_us part start-->
        <section class="about_us section_padding">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-5 col-lg-6 col-xl-6">
                        <div class="learning_img">
                            <img src="img/about_img.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <div class="about_us_text">
                            <h2>Find out about us in history</h2>
                            <p>1gamerpro.com is the eSports platform for tournaments organizers, their participants and their fans. Toornament works with all eSports titles </p>
                            @if (!Auth::check())
                                
                            <a href="{{ url('register') }}" class="btn_1" style="border-radius: 20px;">Sign Up</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about_us part end-->

        <!--::about_us part start::-->
        <section class="live_stareams padding_bottom">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-2 offset-lg-2 offset-sm-1">
                        <div class="live_stareams_text">
                            <h2>Play without <br> interruption</h2>
                            @if (!Auth::check())
                                
                                <a href="{{ url('register') }}" class="btn_1" style="border-radius: 20px;">Sign Up Now</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7 offset-sm-1">
                        <div class="live_stareams_slide owl-carousel">
                            
                            <div class="live_stareams_slide_img">
                                <img src="img/client_logo/client_logo_1.png" alt="" style="background-size: cover">
                                <div class="extends_video">
                                    <a id="play-video_1" class="video-play-button popup-youtube"
                                        href="https://www.youtube.com/watch?v=9FCRaSwU3W8">
                                        <span class="fas fa-play"></span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="live_stareams_slide_img">
                                <img src="img/client_logo/client_logo_2.png" alt="" style="background-size: cover">
                                <div class="extends_video">
                                    <a id="play-video_1" class="video-play-button popup-youtube"
                                        href="https://www.youtube.com/watch?v=n3ceoeubxxQ">
                                        <span class="fas fa-play"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="live_stareams_slide_img">
                                <img src="img/client_logo/client_logo_3.png" alt="" style="background-size: cover">
                                <div class="extends_video">
                                    <a id="play-video_1" class="video-play-button popup-youtube"
                                        href="https://www.youtube.com/watch?v=zu3wZ-_IKrM">
                                        <span class="fas fa-play"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="live_stareams_slide_img">
                                <img src="img/client_logo/client_logo_4.png" alt="" style="background-size: cover">
                                <div class="extends_video">
                                    <a id="play-video_1" class="video-play-button popup-youtube"
                                        href="https://www.youtube.com/watch?v=FQ7WBnSvjIo">
                                        <span class="fas fa-play"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="live_stareams_slide_img">
                                <img src="img/client_logo/client_logo_5.png" alt="" style="background-size: cover">
                                <div class="extends_video">
                                    <a id="play-video_1" class="video-play-button popup-youtube"
                                        href="https://www.youtube.com/watch?v=oHOudL5d14M">
                                        <span class="fas fa-play"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="live_stareams_slide_img">
                                <img src="img/client_logo/client_logo_6.png" alt="" style="background-size: cover">
                                <div class="extends_video">
                                    <a id="play-video_1" class="video-play-button popup-youtube"
                                        href="https://www.youtube.com/watch?v=uCd6tbUAy6o">
                                        <span class="fas fa-play"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--::about_us part end::-->

        <!-- use sasu part end-->

        <!-- use sasu part end-->

        <!-- gallery_part part start-->
        <section class="gallery_part section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <h2>Feature Games</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="gallery_part_item">
                            <div class="grid">
                                <div class="grid-sizer"></div>
                                <a href="img/gallery/gallery_item_1.png"
                                    class="grid-item bg_img img-gal grid-item--height-1"
                                    style="background-image: url('img/gallery/gallery_item_1.png')">
                                    <div class="single_gallery_item">
                                        <div class="single_gallery_item_iner">
                                            <div class="gallery_item_text">
                                                <i class="ti-zoom-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="img/gallery/gallery_item_2.png" class="grid-item bg_img img-gal"
                                    style="background-image: url('img/gallery/gallery_item_2.png')">
                                    <div class="single_gallery_item">
                                        <div class="single_gallery_item_iner">
                                            <div class="gallery_item_text">
                                                <i class="ti-zoom-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="img/gallery/gallery_item_3.png" class="grid-item bg_img img-gal"
                                    style="background-image: url('img/gallery/gallery_item_3.png')">
                                    <div class="single_gallery_item">
                                        <div class="single_gallery_item_iner">
                                            <div class="gallery_item_text">
                                                <i class="ti-zoom-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="img/gallery/gallery_item_5.png"
                                    class="grid-item bg_img img-gal grid-item--height-2"
                                    style="background-image: url('img/gallery/gallery_item_5.png')">
                                    <div class="single_gallery_item">
                                        <div class="single_gallery_item_iner">
                                            <div class="gallery_item_text">
                                                <i class="ti-zoom-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="img/gallery/gallery_item_7.png"
                                    class="grid-item bg_img img-gal grid-item--height-2"
                                    style="background-image: url('img/gallery/gallery_item_7.png')">
                                    <div class="single_gallery_item">
                                        <div class="single_gallery_item_iner">
                                            <div class="gallery_item_text">
                                                <i class="ti-zoom-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="img/gallery/gallery_item_6.png"
                                    class="grid-item bg_img img-gal grid-item--width-1"
                                    style="background-image: url('img/gallery/gallery_item_6.png')">
                                    <div class="single_gallery_item">
                                        <div class="single_gallery_item_iner">
                                            <div class="gallery_item_text">
                                                <i class="ti-zoom-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="img/gallery/gallery_item_4.png"
                                    class="grid-item bg_img img-gal sm_weight  grid-item--height-1"
                                    style="background-image: url('img/gallery/gallery_item_4.png')">
                                    <div class="single_gallery_item">
                                        <div class="single_gallery_item_iner">
                                            <div class="gallery_item_text">
                                                <i class="ti-zoom-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- gallery_part part end-->

        <!-- use sasu part end-->
        <section class="upcomming_war">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section_tittle text-center">
                            <h2>Discount Offer</h2>
                        </div>
                    </div>
                </div>
                <div class="upcomming_war_iner">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-10 col-sm-5 col-lg-3">
                            <div class="upcomming_war_counter text-center">
                                <h2>Due to Corona pandemic we are giving 80% OFF</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- use sasu part end-->


        @include('components.footer')
</body>

</html>