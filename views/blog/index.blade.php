<section id="product-categories">
    <div class="container">
        <div class="col-md-12">
            <div class="features_items">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="left-sidebar">
                            @if(list_category()->count() > 0)
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
                            @if(list_blog_category()->count() > 0)
                            <div class="latest-news">
                                <div class="title"><h2>Kategori Blog</h2></div>
                                <ul class="block-content">
                                    @foreach(list_blog_category() as $kat)
                                    <span class="underline"><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></span>&nbsp;&nbsp;
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(best_seller()->count() > 0)
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

                            {{ Theme::partial('subscribe') }}
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9 padding-right">
                        <div class="page">
                            <h2>Blog</h2>
                            @if(list_blog(null,@$blog_category)->count() > 0)
                            <div class="row">
                                @foreach(list_blog(null,@$blog_category) as $blog)
                                <article class="col-lg-12">
                                    <div class="bgrey">
                                        <h4><b>{{$blog->judul}}</b></h4>
                                        <p>
                                            <small><i class="fa fa-calendar"></i> {{waktuTgl($blog->updated_at)}}</small>&nbsp;&nbsp;
                                            <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog->kategori)}}" class="black">{{@$blog->kategori->nama}}</a></span>
                                        </p>
                                        <p>
                                            {{shortDescription($blog->isi,300)}}<br>
                                            <a href="{{blog_url($blog)}}" class="theme">Baca Selengkapnya →</a>
                                        </p>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                            <div class="pagination">{{list_blog(null,@$blog_category)->links()}}</div>
                            @endif
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
        </div>
    </div>
</section>