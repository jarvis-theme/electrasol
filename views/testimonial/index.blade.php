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
                            @if(count(recentBlog(null,3)) > 0)
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
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                        <div class="page">
                            <h2>Testimonial</h2>
                            @foreach(list_testimonial() as $key=>$value)
                            <div class="block">
                                <div class="blockquotes">
                                <blockquote>
                                    {{short_description($value->isi,400)}}
                                    <p id="testi">~ {{$value->nama}}</p>
                                </blockquote>
                                </div>
                            </div>
                            @endforeach
                            {{list_testimonial()->links()}}

                            <form class="col-lg-12 col-xs-12 contact-form" action="{{url('testimoni')}}" method="post">
                                <h3>Kirim Testimonial</h3>
                                <p class="form-group">
                                    <input class="form-control" placeholder="Nama" type="text" name="nama" required="required">
                                </p>
                                <p class="form-group">
                                    <textarea class="form-control" placeholder="Testimonial" name="testimonial" required="required"></textarea>
                                </p>
                                <button class="btn btn-info" type="submit">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>