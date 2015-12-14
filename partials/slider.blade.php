<section id="slider">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	                <ol class="carousel-indicators">
	                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	                </ol>
	                <div class="carousel-inner">
	                {{-- */ $i = 0; /* --}}
        			@foreach (slideshow() as $val)  
            			@if($i!=0)
	                    <div class="item">
	                    @else
	                    <div class="item active">
	                    @endif
	                    	@if($val->text == '')
            				<a href="#">
            				@else
            				<a href="{{filter_link_url($val->text)}}" target="_blank">
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