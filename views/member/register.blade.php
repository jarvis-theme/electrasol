 <section id="product-categories">
	<div class="container">
		<div class="inner-column row">
			<div class="col-lg-3 col-xs-12 col-sm-4 pull-right">
				<div id="advertising" class="block">
					@foreach(vertical_banner() as $banner)
					<div class="img-block">
						<a href="{{url($banner->url)}}">
							{{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'272','height'=>'auto','class'=>'img-responsive'))}}
						</a>
					</div>
					@endforeach
				</div>
				<br>
			</div>
			<div id="center_column" class="col-lg-7 col-xs-12 col-sm-8 bgrey">
				{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
					<br>
					<h2>Register</h2>
					<hr><br>
					<div class="form-group">
						<label class="col-lg-2">Nama</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="nama" value="{{Input::old('nama')}}" required="required">
						</div>
					</div>                           
					<div class="form-group">
						<label class="col-lg-2">Email</label>
						<div class="col-lg-10">
							<input type="email" class="form-control" name="email" value="{{Input::old('email')}}" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2">Password</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" name="password" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2">Konfirmasi Password</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" name="password_confirmation" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2">Negara</label>
						<div class="col-lg-10">
							{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, Input::old('negara'),array('required', "id"=>"negara", "data-rel"=>"chosen", "class"=>"form-control"))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2">Provinsi</label>
						<div class="col-lg-10">
							{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"),array('required'=>'required', 'id'=>"provinsi", 'data-rel'=>"chosen", 'class'=>"form-control"))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2">Kota</label>
						<div class="col-lg-10">
							{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"),array('required'=>'required', 'id'=>"kota", 'data-rel'=>"chosen", 'class'=>"form-control"))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2">Alamat</label>
						<div class="col-lg-10">
							<textarea class="form-control" rows="3" name="alamat" required="required">{{Input::old("alamat")}}</textarea>
						</div>
					</div> 
					<div class="form-group">
						<label class="col-lg-2">Kode Pos</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="kodepos" value="{{Input::old('kodepos')}}" >
						</div>
					</div>                      
					<div class="form-group">
						<label class="col-lg-2">Telepon</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="telp" value="{{Input::old('telp')}}" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2">Captcha</label>
						<div class="col-lg-10 form-inline">
							<div class="row">
								<div class="col-xs-12 col-sm-3">
									{{ HTML::image(Captcha::img(), 'Captcha image') }}
								</div>
								<div class="col-xs-12 col-sm-9">
									{{Form::text('captcha','',array('class'=>'form-control'))}}
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10 col-xs-offset-1">
							<div class="checkbox">
								<input name="readme" value="1" type="checkbox" checked> Saya telah membaca dan menyetujui <a href="{{url('service')}}" target="_blank" >Privacy Policy</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success" type="submit">Register</button>
							<button class="btn btn-default" type="reset">Reset</button>
						</div>
					</div>
				{{Form::close()}}
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