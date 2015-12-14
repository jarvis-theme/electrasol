<section id="product-homepage">
    <div class="container">
        <div class="col-md-12">
            <div class="title-features">
                <div class="row">
                    <div class="col-md-12">
                        <h3>KOLEKSI PRODUK</h3>
                    </div>
                    <!-- <div class="col-md-6 right">
                        <span>View as : </span>&nbsp;<a href=""><img class="img-responsive list" src="{{url(dirTemaToko().'electrasol/assets/images/grid-short.png')}}" />&nbsp;<img class="img-responsive list" src="{{url(dirTemaToko().'electrasol/assets/images/list-short.png')}}" /></a>
                    </div> -->
                </div>
            </div>
            <div class="features_items">
                <div class="row">
                    {{-- */ $i=1 /* --}}
                    @foreach(home_product() as $home)
                    <div class="col-md-3" align="center">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo">
                                    <img class="img-responsive" src="{{url(product_image_url($home->gambar1,'medium'))}}" alt="{{$home->nama}}" />
                                    <p>{{short_description($home->nama,20)}}</p>
                                    <h2>{{price($home->hargaJual)}}</h2>
                                    <div class="btn-group col-xs-12 col-sm-12" role="group" aria-label="Default button group">
                                        <a type="button" class="btn btn-default col-xs-3 col-sm-3" href="{{product_url($home)}}" id="view-home"><i class="fa fa-eye"></i></a>
                                        <a type="button" class="btn btn-default col-xs-9 col-sm-9" href="{{product_url($home)}}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($i % 2 == 0)
                    <div class="clearfix visible-sm"></div>
                    @endif
                    @if($i % 4 == 0)
                    <div class="clearfix visible-md visible-lg"></div>
                    @endif
                    {{-- */ $i++ /* --}}
                    @endforeach
                </div>
            </div>

            <div id="payment" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <p>Metode Pembayaran :</p>
                        </div>
                        <div class="col-md-8">
                            @if(list_banks()->count() > 0)
                                @foreach(list_banks() as $value)
                                <div class="col-md-2">
                                    <img class="img-responsive img-payment" src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" title="Payment" />
                                </div>
                                @endforeach
                            @endif
                            @if(list_payments()->count() > 0)
                                @foreach(list_payments() as $pay)
                                    @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                                    <div class="col-md-2">
                                        <img class="img-responsive img-payment" src="{{url('img/bank/ipaymu.jpg')}}" alt="Ipaymu" title="Payment" />
                                    </div>
                                    @endif
                                    @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                                    <div class="col-md-2">
                                        <img class="img-responsive img-payment" src="{{url('img/bitcoin.png')}}" alt="Bitcoin" title="Payment" />
                                    </div>
                                    @endif
                                    @if($pay->nama == 'paypal' && $pay->aktif == 1)
                                    <div class="col-md-2">
                                        <img class="img-responsive img-payment" src="{{url('img/bank/paypal.png')}}" alt="Paypal" title="Payment" />
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                            <div class="col-md-2">
                                <img class="img-responsive img-payment" src="{{url('img/bank/doku.jpg')}}" alt="Doku Myshortcart" title="Payment" />
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div id="advertise-homepage" align="center">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach(vertical_banner() as $banner)
                            <div class="col-md-4" align="center">
                                <img class="img-responsive" src="{{url(banner_image_url($banner->gambar))}}" alt="Info Promo" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
