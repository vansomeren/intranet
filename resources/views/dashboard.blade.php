@include('layouts.app')
<div class="mainwrapper">

    <div class ="main-panel">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src="{{asset('/assets/images/sliders/Prime_Bank_Home_Page_Artwork-01.jpg')}}" alt="First Slide">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('/assets/images/sliders/Prime_Bank_Home_Page_Artwork-02.jpg')}}" alt="Second Slide">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('/assets/images/sliders/7_Day_Banking_Website_Slider.jpg')}}" alt="Third Slide">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('/assets/images/sliders/Prime_Personal_Payment_Mpesa_account.jpg')}}" alt="Third Slide">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.useful_links')
    @include('partials.circulars')
    @include('partials.latest_announcement')
    @include('partials.latest_employee')
    @include('layouts.footer')
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#myCarousel").carousel({
            interval : 5000,
            pause: false
        });
    });
</script>


