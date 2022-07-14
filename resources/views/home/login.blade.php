@extends('home.index')
@section('content-1')
<div id="content1">
    <div class="homeloginform">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        <ul class="box-info">
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
         @endif
        <div class="box">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAA+VBMVEX7JSX////6Hh77TU38IiL7GRn8///7T0/8GBfv///8Hh30///9IiH8FRTs///9gID+DQvwg4b3goP8DQz0YmT49PXmICf4RkbUcH7afonqhozoiZDfJC3xQkXlqrLl5Oz2cnXsGR7YXmrqRErTl6XUi5n+AgHwtrn6rKzO1+fkw8zgt8HvZ2neiJLsOD348PHgkpv329zhTVL5kJHyJCfnPkbcanT05ejjfobylJfrc3bvNDfT7PXq8fbRpK/Kq7n5XV3hFBrFvdDdvMTZ1ODXJzP5NDTGboDDfZDY///pl5zo1t3oWV353t74X1/6x8f8z9C+//+nXHOCvEbmAAAD/ElEQVR4nO3bbVfTMBgG4CUmXdcts7Mb8jZYGY4XERwMBwN1KKCCCvr/f4zdUChuaxPpMc849/WJw+FD7tM8ydMm5HIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAj4Tg7hAv2R7JQ3DlzzyfnZtfmJt9vugrbns8/6bk+vWlZcdhQ46zvFT3pbA9KmNCzVTK7C/lRuhOWRRXjsYYKDRCaXtsJvyV2rgYA7Wmb3t0+lqrzqQckRdTk6S1lhAjst6yPUItwt9IzsHY5lQkkSnPY+DlFMwuuZWeg7FXge1xpkuq8zvbnu1xpgh2tHKwIvEycZ/q5WDstbI91iQiLOgGKYSUmxW3oZuDsQXCj0Twtn6QLuFW2NvVz8FYk+7C5e6ZBFmiO7ekwcxirE02iMgVTYKUO1SLRORMcjC2T7VI+LZZkDdUXxblM7MgT8kG0e5PEOT/eDRTi9fNgpAtdtPlt071G6rgem+HvxVyVDfEXNA1CdKl+97uzpsE2XNtj3cisyLZpdqhRPhb/RxlTrZEop2kqh+kSnXxHRBKe90qzJA+jNN/JBWyr1U3fM0VuEz966/uOwn5T6Y5taVTJgfEJ9aAOkzPcTEFOXIi/Tv2WkB4C7kjgouU5zEdOSJ+L6FOnC26zeIIdbQ8Kcfx0TTUxy2PV8Z+rCs2Fun2vGMJtdgb6SCPq9wl3ZjcEupu3pRctf+uPSiWYcE47YtzGTtJCBThipey/b4VG5+ngjDsV/vVaj88OVGxhyFaHy4l2fZX1aMdZN2913wI4Q0JEX8AUm1G/W+eaNkHvZt6PkqbNMJvDleCYoXihiJat9vgIU9amYTiS3/+8iW94zehPt6tTrXGxLtyJcXnYje5TgNiq5hQp/e3755U3kgWIf2zhfsX0k4VrSTByOnhzlpfKen9rnFRilZjN1z5OLJNbpCaXUFl3DZeazeanZAHQeCHZ+efVjfH3g58TehdUfXGjfBmjhWdWrdbc8qT28jPZJpI3jH65juS9YjIziik0SffUV9CGgWf9h6V7h2JLd4zPMsdo0jiNkdgdN1hvEsC9S6/PjwHY7P2X7d87atmSYrWH4l7kEUOxiq2H4lvcCKSpGC5U/Ga2eSwfn4VXGYVxO7CJR7WnMQ5Vm9vef2scjB2YLPclcaFfl3XFueW4d2/ZMWOvdbR7HpsmhV73bz74L43zuLpj/qWZZBla9UuVIYlEhWJtWv/3n6WOSzeMfe+ZxukaiuIu5BtkHlbRZLtomXx1r+6yjbI1WMJYu3fFx7PE7lmTlYGJ40/bH0F9qr5J8by+fgP+div8z9trVriXPCseNzr2GsaKZ1sAAAAAAAAAAAAAAAAAAAAAAAAAAAAAH2/APWNR42kNxwPAAAAAElFTkSuQmCC"  class="avatar">
        
       

        <h1>Login Here</h1>

                <form method="get" action="{{url('/checklogin')}}">
                    @csrf
                    <p>User name</p>

                    <input type="email" name="email" placeholder="Enter Username"/>
                    

                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password">
                    <input type="submit" name="" value="Login">
                    <a href="#">Lost your password?</a><br>
                    <a href="{{url('user_select')}}">Don't have an account?</a>
                </form>
        </div>

        <div class="content">
        <span>fresh and organic</span>
        <h3>your daily need products</h3>
       
    </div> 
        
    </div>

    <section class="banner-container">

            <div class="banner">
                <img src="images/banner-1.jpg" alt="">
                <div class="content">
                    <h3>special offer</h3>
                    <p>upto 45% off</p>
                    <a href="#" class="btnno">check out</a>
                </div>
            </div>

            <div class="banner">
                <img src="images/banner-2.jpg" alt="">
                <div class="content">
                    <h3>limited offer</h3>
                    <p>upto 50% off</p>
                    <a href="#" class="btnno">check out</a>
                </div>
            </div>
        </section>
<!-- flash deal end  -->
</div>
@endsection

