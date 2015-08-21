<section id="product-categories">
    <div class="container">
        <div class="col-md-12">
            <div class="features_items">
                <div class="row">
                    <div class="col-md-3">
                        <div class="left-sidebar">
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
                            
                            <div class="latest-news">
                                <div class="title"><h2>Blog Category</h2></div>
                                <ul class="block-content">
                                    @foreach(list_blog_category() as $kat)
                                    <span style="text-decoration: underline;"><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></span>&nbsp;&nbsp;
                                    @endforeach
                                </ul>
                            </div>

                            <div class="best-seller">
                                <div class="title"><h2>Best Selling</h2></div>
                                <ul class="block-content">
                                    @foreach(best_seller() as $best)
                                    <li>
                                        <a href="{{product_url($best)}}">
                                            <div class="img-block">
                                                <img width="70" height="70" src="{{url(product_image_url($best->gambar1))}}">
                                            </div>
                                            <p class="product-name">{{short_description($best->nama,20)}}</p>
                                            <p class="price">{{price($best->hargaJual)}}</p>
                                            <p class="desc">{{short_description($best->deskripsi,50)}}</p> 
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="btn-more">
                                    <a href="{{url('produk')}}">view more</a>
                                </div>
                            </div>

                            {{ Theme::partial('subscribe') }}
                        </div>
                    </div>
                    
                    <div class="col-md-9 padding-right">
                        <div class="page">
                            <h2>Blog</h2>
                            @if(count(list_blog(null,@$blog_category)) > 0)
                            <div class="row">
                                @foreach(list_blog(null,@$blog_category) as $blog)
                                <article class="col-lg-12">
                                    <h4>{{$blog->judul}}</h4>
                                    <p>
                                        <small><i class="fa fa-calendar"></i> {{waktuTgl($blog->updated_at)}}</small>&nbsp;&nbsp;
                                        <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog->kategori)}}" style="color:#333;">{{@$blog->kategori->nama}}</a></span>
                                    </p>
                                    <p>
                                        {{shortDescription($blog->isi,300)}}<br>
                                        <a href="{{blog_url($blog)}}" class="theme">Baca Selengkapnya →</a>
                                    </p>
                                </article>
                                @endforeach
                            </div>
                            <div class="pagination">
                                {{list_blog(null,@$blog_category)->links()}}
                            </div>
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
                        <div class="col-md-4">
                            <p>Metode Pembayaran via Bank :</p>
                        </div>
                        <div class="col-md-8">
                            @foreach(list_banks() as $value)
                            <div class="col-md-2">
                                <img class="img-responsive img-payment" src="{{bank_logo($value)}}" />
                            </div>
                            @endforeach
                            @foreach(list_payments() as $pay)
                                @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                                <div class="col-md-2">
                                    <img class="img-responsive img-payment" src="{{url('img/bank/ipaymu.jpg')}}" />
                                </div>
                                @endif
                            @endforeach
                            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                            <div class="col-md-2">
                                <img class="img-responsive img-payment" src="{{url('img/bank/doku.jpg')}}" />
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>