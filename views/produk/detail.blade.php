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
                    
                    <div class="col-md-9 padding-right">
                        <form action="#" id="addorder">
                            <div class="product-details">
                                <div class="col-md-6 detail">
                                    <div class="row">
                                        <div class="view-product">
                                            <img class="img-responsive" src="{{url(product_image_url($produk->gambar1,'large'))}}" style="width:100%" />
                                            <h3><a class="zoom fancybox" href="{{url(product_image_url($produk->gambar1,'large'))}}" title="{{$produk->nama}}"><i class="fa fa-search"></i></a></h3>
                                        </div>
                                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="item active col-xs-12">
                                                    @if($produk->gambar2 != '')
                                                    <div class="col-xs-4">
                                                        <a class="zoom fancybox" href="{{url(product_image_url($produk->gambar2,'large'))}}" title="{{$produk->nama}}"><img class="img-responsive" src="{{url(product_image_url($produk->gambar2,'thumb'))}}"></a>
                                                    </div>
                                                    @endif
                                                    @if($produk->gambar3 != '')
                                                    <div class="col-xs-4">
                                                        <a class="zoom fancybox" href="{{url(product_image_url($produk->gambar3,'large'))}}" title="{{$produk->nama}}"><img class="img-responsive" src="{{url(product_image_url($produk->gambar3,'thumb'))}}"></a>
                                                    </div>
                                                    @endif
                                                    @if($produk->gambar4 != '')
                                                    <div class="col-xs-4">
                                                        <a class="zoom fancybox" href="{{url(product_image_url($produk->gambar4,'large'))}}" title="{{$produk->nama}}"><img class="img-responsive" src="{{url(product_image_url($produk->gambar4,'thumb'))}}"></a>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 detail">
                                    <div class="row">
                                        <div class="product-information">
                                            <h2>{{$produk->nama}}</h2>
                                            @if(!empty($produk->hargaCoret))
                                            <h4 class="price"><del>{{price($produk->hargaCoret)}}</del></h4>&nbsp;
                                            @endif
                                            <h3 class="price">{{price($produk->hargaJual)}}</h3>
                                            <div class="sosmed">
                                                {{sosialShare(url(product_url($produk)))}}
                                            </div>
                                            <p>Product Description :</p>
                                            <p class="desc">{{$produk->deskripsi}}</p>
                                        </div>
                                        @if($opsiproduk->count() > 0)
                                        <div class="block-color attribute ">
                                            <div class="attribute_list">
                                                <div class="color-list">
                                                    <label class="col-sm-4 control-label">Opsi :</label>
                                                    <div class="col-sm-5">
                                                        <select class="form-control attribute_select" name="opsiproduk">
                                                            <option value="">-- Pilih Opsi --</option>
                                                            @foreach ($opsiproduk as $key => $opsi)
                                                            <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                                                                {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        
                            <div class="btm-details">
                                <div class="quantity">
                                    <div class="form-group">
                                        <label class="control-label">Quantity :</label>
                                        <div class="qty-block">
                                            <a class="product_quantity_down" data-field-qty="qty" href="#">
                                                <span><i class="icon-minus"></i></span>
                                            </a>
                                            <input type="text" value="1" class="text" id="qty" name="qty">
                                            <a class="product_quantity_up" data-field-qty="qty" href="#">
                                                <span><i class="icon-plus"></i></span>
                                            </a>
                                            <span class="clearfix"></span>
                                        </div>
                                     </div>
                                </div>
                                <div class="avail-info">
                                    @if(!empty($produk->stok))
                                    <span class="instock">Available, Stock <span class="ttl-stock">{{$produk->stok}} item</span></span>
                                    @else
                                    <span class="fa-stack fa-1x">
                                        <i style="color: #d9534f;" class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                                    </span>
                                    Out of Stock
                                    @endif
                                </div>
                                <div class="button-detail">
                                    <button class="btn addtocart"><i class="fa fa-shopping-cart"></i>&nbsp;Add to cart</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        @if(count(other_product($produk)) > 0)
                        <div class="features_items detail">
                            @foreach(other_product($produk) as $other)
                            <div class="col-md-4" align="center">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo">
                                            <img class="img-responsive thumb" src="{{url(product_image_url($other->gambar1,'medium'))}}" />
                                            <p>{{short_description($other->nama,20)}}</p>
                                            <h2>{{price($other->hargaJual)}}</h2>
                                            <div class="btn-org">
                                                <a class="orange" href="{{product_url($other)}}">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
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
            
            {{pluginTrustklik()}}

            <div id="advertise-homepage" align="center">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach(vertical_banner() as $banner)
                            <div class="col-md-4" align="center">
                                <img class="img-responsive" src="{{url(banner_image_url($banner->gambar))}}" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>