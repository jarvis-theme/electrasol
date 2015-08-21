<section id="product-categories">
	<div class="container">
		<div class="inner-column row">
	        <div class="col-lg-3 col-xs-12 col-sm-4 pull-right">
	            <div id="advertising" class="block">
	            @foreach(vertical_banner() as $banner)
	            	<div class="img-block">
	            		<a href="{{url($banner->url)}}">
	            			{{HTML::image(banner_image_url($banner->gambar),'banner',array('width'=>'272','height'=>'auto','class'=>'img-responsive'))}}
	        			</a>
	                </div>
	            @endforeach
	            </div>
	            <br>
	        </div>
	        <div class="col-lg-9 col-xs-12 col-sm-8">
	    		<p>Silahkan Login untuk kemudahan melakukan checkout. Cepat dan Mudah dalam bertransaksi. Mudah untuk mengetahui Order History dan Status.</p>
				<br>
				<h2>Log in</h2>
				<br>
	            <form class="form-horizontal" action="{{url('member/login')}}" method="post">
					<div class="form-group">
				    	<label for="inputEmail3" class="col-sm-2">Email</label>
				    	<div class="col-sm-4">
				    		<input type="email" class="form-control" name="email" placeholder="Email" required>
				    	</div>
					</div>
					<div class="form-group">
				    	<label for="inputPassword3" class="col-sm-2">Password</label>
						<div class="col-sm-4">
				    		<input type="password" class="form-control" name="password" placeholder="Password" required>
				   		</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<small>
								<a href="{{url('member/forget-password')}}">Lupa Password?</a>
							</small>
						</div>
					</div>
					<div class="form-group">
						<div class="pull-left col-sm-2">
							<button type="submit" class="btn btn-success">Log in</button>
						</div>
						<div class="pull-right col-sm-4">
							<small>Belum punya akun?</small>
							<a href="{{url('member/create')}}" class="btn btn-danger">Daftar Baru</a>
						</div>
					</div>
				</form>
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