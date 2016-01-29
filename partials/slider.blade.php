<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    @if(count(slideshow()) > 0)
                    <ol class="carousel-indicators">
                        @for($i = 0; $i < slideshow()->count(); $i++)
                        <li data-target="#carousel-example-generic" data-slide-to="$i" {{$i==0 ? 'class="active"' : ''}}></li>
                        @endfor
                    </ol>
                    @endif
                    <div class="carousel-inner">
                    {{-- */ $i = 0; /* --}}
                    @foreach (slideshow() as $val)  
                        @if($i!=0)
                        <div class="item">
                        @else
                        <div class="item active">
                        @endif
                            @if(!empty($val->url))
                            <a href="{{filter_link_url($val->url)}}" target="_blank">
                            @else
                            <a href="#">
                            @endif
                                <img src="{{url(slide_image_url($val->gambar))}}" width="100%" alt="Info Promo">
                            </a>
                        </div>
                        {{-- */ $i += 1; /* --}}
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="push"></div>
</section>