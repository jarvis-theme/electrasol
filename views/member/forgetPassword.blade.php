<section id="product-categories">
    <div class="container">
        <div class="col-md-12">
            <div class="features_items">
                <div class="row">
                    <div class="col-lg-3 col-xs-12 col-sm-4 pull-right">
                        <div class="left-sidebar">
                            {{ Theme::partial('subscribe') }}
                        </div>
                        <br>
                    </div>
                    <div id="center_column" class="col-lg-4 col-xs-12 col-sm-4">
                        <h2>Lupa Password</h2><hr><br>
                        <form action="{{url('member/forgetpassword')}}" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email" name="recoveryEmail" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-warning" type="submit">Reset Password</button>
                                </span>
                            </div>
                        </form>
                        <br><br>
                    </div>
                    <div id="center_column" class="col-lg-4 col-md-offset-1">
                        <h2>Pelanggan Baru</h2><hr><br>
                        <p>Nikmati kemudahan berbelanja dengan mendaftar sebagai member.</p>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a href="{{url('member/create')}}" class="btn btn-danger">Daftar</a>
                            </span>
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