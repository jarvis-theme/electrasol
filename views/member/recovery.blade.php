<section id="product-categories">
	<div class="container">
		<div class="inner-column row">
			<div class="col-sm-6">
				<h2>Forget Password</h2>
				{{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => 'form-horizontal'))}}
					<div class="form-group">
						<label class="col-lg-3 control-label">Password Baru</label>
						<div class="col-lg-8">
							<input class="form-control" type="password" name="password" placeholder="Password baru" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Konfirmasi Password Baru</label>
						<div class="col-lg-8">
							<input class="form-control" type="password" name="password_confirmation" placeholder="Konfirmasi password baru" required="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-8">
							<button class="btn btn-info" type="submit">Update Password</button>
						</div>
					</div>
				{{Form::close()}}
			</div>
			<div class="col-sm-4 col-sm-offset-1">
				@foreach(vertical_banner() as $item)
				<a href="{{url($item->url)}}">
					<img src="{{url(banner_image_url($item->gambar))}}" alt="Info Promo" />
				</a>
				@endforeach
			</div>
		</div>
		<div class="sep-bor"></div>
	</div>
</section>