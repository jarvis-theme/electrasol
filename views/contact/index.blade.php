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
                                <div class="title"><h2>Produk Terlaris</h2></div>
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
                                    <a href="{{url('produk')}}">Lihat Semua</a>
                                </div>
                            </div>

                            <div class="latest-news">
                                <div class="title"><h2>Artikel Terbaru</h2></div>
                                <ul class="block-content">
                                    @foreach(list_blog() as $blog)
                                    <li>
                                        <h5 class="title-news">{{short_description($blog->judul,30)}}</h5>
                                        <p class="desc">{{short_description($blog->isi,46)}} <a href="{{blog_url($blog)}}"><span>selengkapnya</span></a></p> 
                                        <p class="date">{{date("F d, Y", strtotime($blog->created_at))}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{ Theme::partial('subscribe') }}
                        </div>
                    </div>
                    <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                        <div class="contact-us">
                            <h2>Contact Us</h2>
                            <div class="maps">
                                @if($kontak->lat!='0' || $kontak->lng!='0')
                                    <iframe class="maps" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
                                @else
                                    <iframe class="maps" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->alamat }}&amp;aq=0&amp;oq=gegerkalong+hil&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;hq=&amp;hnear={{ $kontak->alamat }}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
                                @endif
                            </div>
                            <div class="contact-desc">
                                <br>
                                <p><strong>Alamat Toko :</strong> {{$kontak->alamat}}</p>
                                @if($kontak->telepon != '')
                                <p><strong>Telepon : </strong> {{$kontak->telepon}}</p>
                                @endif
                                @if($kontak->hp != '')
                                <p><strong>HP : </strong> {{$kontak->hp}}</p>
                                @endif
                                @if($kontak->bbm != '')
                                <p><strong>BBM : </strong> {{$kontak->bb}}</p>
                                @endif
                                <p><strong>Email : </strong> {{$kontak->email}}</p>
                                <div class="clr"></div>
                                <br>
                            </div>
                            <form class="contact-form" action="{{url('kontak')}}" method="post">
                                <p class="form-group">
                                    <input class="form-control" placeholder="Nama" name="namaKontak" type="text" required>
                                </p>
                                <p class="form-group">
                                    <input class="form-control" placeholder="Email anda" name="emailKontak" type="text" required>
                                </p>
                                <p class="form-group">
                                    <textarea class="form-control" placeholder="Pesan" name="messageKontak" required></textarea>
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

<section id="midle-product-categories">
    <div class="container">         
        <div class="col-md-12">
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
                                        <img class="img-responsive img-payment" src="{{url('img/bank/ipaymu.jpg')}}" alt="Ipaymu" title="Payment" />
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                            <div class="col-md-2">
                                <img class="img-responsive img-payment" src="{{url('img/bitcoin.png')}}" alt="Bitcoin" title="Payment" />
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