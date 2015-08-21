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

                            <div class="latest-news">
                                <div class="title"><h2>Latest News</h2></div>
                                <ul class="block-content">
                                    @foreach(list_blog() as $blog)
                                    <li>
                                        <h5 class="title-news">{{short_description($blog->judul,30)}}</h5>
                                        <p class="desc">{{short_description($blog->isi,46)}} <a href="{{blog_url($blog)}}"><span>read more</span></a></p> 
                                        <p class="date">{{date("F d, Y", strtotime($blog->created_at))}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{ Theme::partial('subscribe') }}
                        </div>
                    </div>
                    <div class="col-lg-9 col-xs-12 col-sm-8">
                        <div class="product-list col-xs-12">
                            <div class="top-list ">
                                <div class="col-xs-12 col-sm-12">
                                    <h2>Hasil Pencarian</h2>
                                </div>
                                <div class="clr"></div>
                            </div>
                            @if($jumlahCari != 0)
                                @if(count($hasilpro) > 0)
                                <div class="row">
                                    <ul class="grid">
                                    @foreach($hasilpro as $produks)
                                        <li class="col-xs-6 col-sm-4">
                                            <div class="image-container">
                                                <a href="{{product_url($produks)}}">
                                                    {{HTML::image(product_image_url($produks->gambar1),'produk',array('class'=>'img-responsive','style'=>'height: 252px;width: auto;margin: 0 auto;'))}}
                                                </a>
                                            </div>
                                            <h5 class="product-name">
                                                <a href="{{product_url($produks)}}">
                                                {{short_description($produks->nama, 25)}}
                                                </a>
                                            </h5>
                                            <span class="price">{{price($produks->hargaJual)}}</span>
                                            <a class="view" href="{{product_url($produks)}}">Lihat</a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if(count($hasilhal) > 0 || count($hasilblog) > 0)
                                <div class="row">
                                    @foreach($hasilhal as $hal)
                                    <article class="col-lg-12" style="margin-bottom:10px">
                                        <h3 style="margin-bottom: 3px;">
                                            <strong><a href="{{url('halaman/'.$hal->slug)}}">
                                            {{$hal->judul}}</a></strong>
                                        </h3>
                                        <p>
                                            {{short_description($hal->isi,300)}}<br>
                                            <a href="{{url('halaman/'.$hal->slug)}}" class="theme">Baca Selengkapnya →</a>
                                        </p>
                                    </article>
                                    @endforeach
                                    @foreach($hasilblog as $blog_result)  
                                    <article class="col-lg-12" style="margin-bottom:10px">
                                        <h3 style="margin-bottom: 3px;">
                                            <strong><a href="{{blog_url($blog_result)}}">{{$blog_result->judul}}</a></strong>
                                        </h3>
                                        <p style="margin-bottom: 15px;">
                                            <small><i class="fa fa-calendar"></i> {{waktuTgl($blog_result->updated_at)}}</small>&nbsp;&nbsp;
                                            <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog_result->kategori)}}">{{@$blog_result->kategori->nama}}</a></span>
                                        </p>
                                        <p>
                                            {{short_description($blog_result->isi,300)}}<br>
                                            <a href="{{blog_url($blog_result)}}" class="theme">Baca Selengkapnya →</a>
                                        </p>
                                        <hr>
                                    </article>
                                    @endforeach 
                                </div>
                                @endif
                        	{{--$produk->links()--}}
                            @else
                            <article class="text-center">
                                <i>Hasil pencarian tidak ditemukan</i>
                            </article>
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