<section id="product-categories">
    <div class="container">
    	<div class="col-md-12">
            <div class="features_items">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="left-sidebar">
                            @if(count(list_category()) > 0)
                            <div class="panel-group category-products" id="accordian">
                            @foreach(list_category() as $side_menu)
                                @if($side_menu->parent == '0')
                                <div class="panel panel-default">
                                    @if($side_menu->anak->count() == 0)
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="{{category_url($side_menu)}}">
                                                {{$side_menu->nama}}
                                            </a>
                                        </h4>
                                    </div>
                                    @else
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian" href="#{{preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($side_menu->nama))}}">
                                                <span class="badge pull-right"><i class="fa fa-angle-right"></i></span>
                                                {{$side_menu->nama}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($side_menu->nama))}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                            @foreach($side_menu->anak as $submenu)
                                                @if($submenu->parent == $side_menu->id)
                                                <li>
                                                    <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                                </li>
                                                @endif
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                            @endforeach
                            </div>
                            @endif
                            @if(count(best_seller()) > 0)
                            <div class="best-seller">
                                <div class="title"><h2>Produk Terlaris</h2></div>
                                <ul class="block-content">
                                    @foreach(best_seller() as $best)
                                    <li>
                                        <a href="{{product_url($best)}}">
                                            <div class="img-block">
                                                <img width="70" height="70" src="{{url(product_image_url($best->gambar1,'medium'))}}" alt="{{$best->nama}}">
                                            </div>
                                            <p class="product-name">{{short_description($best->nama,20)}}</p>
                                            <p class="price">{{price($best->hargaJual)}}</p>
                                            <p class="desc">{{short_description($best->deskripsi,50)}}</p> 
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="btn-more">
                                    <a href="{{url('produk')}}">Lihat Semua</a>
                                </div>
                            </div>
                            @endif
                            @if(count(recentBlog(null,3)))
                            <div class="latest-news">
                                <div class="title"><h2>Artikel Terbaru</h2></div>
                                <ul class="block-content">
                                    @foreach(recentBlog(null,3) as $blog)
                                    <li>
                                        <h5 class="title-news">{{short_description($blog->judul,30)}}</h5>
                                        <p class="desc">{{short_description($blog->isi,46)}} <a href="{{blog_url($blog)}}"><span>selengkapnya</span></a></p> 
                                        <p class="date">{{date("F d, Y", strtotime($blog->created_at))}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            {{ Theme::partial('subscribe') }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <div class="product-list">
                        	<div class="entry">
                                <!-- <h2>Customer Service</h2> -->
                            </div>
                            <div class="panel-group" id="accordion">
                                @if($service->tos != "")
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Kebijakan Layanan</a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">{{$service->tos}}</div>
                                        </div>
                                    </div>
                                @endif
                                @if($service->refund != "")
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Kebijakan Pengembalian</a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>{{$service->refund}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($service->refund != "")
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Kebijakan Privasi</a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>{{$service->privacy}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="midle-product-categories">
    <div class="container">
        <div class="col-md-12">
            <div id="payment" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <p class="payment-title">Metode Pembayaran :</p>
                        </div>
                        <div class="col-md-9 payment-img">
                            @if(list_banks()->count() > 0)
                            @foreach(list_banks() as $value)
                                @if($value->status == 1)
                                <img class="img-responsive img-payment" src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" title="{{$value->bankdefault->nama}}" />
                                @endif
                            @endforeach
                            @endif
                            @if(list_payments()->count() > 0)
                                @foreach(list_payments() as $pay)
                                    @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                                    <img class="img-responsive img-payment" src="{{url('img/bank/ipaymu.jpg')}}" alt="Ipaymu" title="Ipaymu" />
                                    @endif
                                    @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                                    <img class="img-responsive img-payment" src="{{url('img/bitcoin.png')}}" alt="Bitcoin" title="Bitcoin" />
                                    @endif
                                    @if($pay->nama == 'paypal' && $pay->aktif == 1)
                                    <img class="img-responsive img-payment" src="{{url('img/bank/paypal.png')}}" alt="Paypal" title="Paypal" />
                                    @endif
                                @endforeach
                            @endif
                            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                            <img class="img-responsive img-payment" src="{{url('img/bank/doku.jpg')}}" alt="Doku Myshortcart" title="Doku" />
                            @endif
                            @if(count(list_veritrans()) > 0 && list_veritrans()->status == 1 && list_veritrans()->type == 1)
                            <img class="img-responsive img-payment midtrans" src="{{url('img/bank/midtrans.png')}}" alt="Midtrans" title="Midtrans">
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