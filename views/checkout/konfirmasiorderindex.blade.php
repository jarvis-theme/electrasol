<section id="product-categories">
    <div class="container">
        <div class="col-md-12">
            <div class="features_items">
                <div class="row">
                    <div id="center_column" class="col-xs-12 col-sm-9 pull-right">
                        {{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-inline'))}}
                            <div class="confirm">
                                <h2>Konfirmasi Order</h2>
                                <p class="form-group col-xs-12 col-sm-9">
                                    <input class="form-control" placeholder="Kode Order" type="text" required>
                                </p>
                                <button class="btn btn-danger" type="submit">Cari Kode</button>
                            </div>
                        {{Form::close()}}
                    </div>
                    <div id="left_sidebar" class="col-xs-12 col-sm-3">
                        <div id="advertising" class="block">
                            @foreach(vertical_banner() as $banner)
                        	<div class="img-block">
                        		<a href="{{url($banner->url)}}">
                        			{{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'272','height'=>'auto','class'=>'img-responsive'))}}
                    			</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>