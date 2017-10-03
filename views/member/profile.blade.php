<div class="top-list container">
	<h2><i class="fa fa-user"></i> &nbsp;Ubah Profil</h2>
	<div class="clr"></div>
	<hr>
</div>

<div class="container">
	<div class="inner-column row">
		<div id="left_sidebar" class="col-md-3">
			<div class="block my_account">
				<div><h2>My Account</h2></div>
				<ul class="nav">
					<li><a href="{{url('member')}}">Daftar Pembelian</a></li>
					<li class="active"><a href="{{url('member/profile/edit')}}">Ubah Profil</a></li>
				</ul>
			</div>
		</div>
		<div id="center_column" class="col-md-9">
			{{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
				<div class="form-group">
					<label class="col-md-2 control-label">Nama</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="nama" value="{{$user->nama}}" placeholder="Nama" requried="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Email</label>
					<div class="col-md-4">
						<input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Email" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Telepon</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="telp" value="{{$user->telp}}" placeholder="Telepon" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Negara</label>
					<div class="col-md-4">
						{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, ($user ? $user->negara :(Input::old("negara") ? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara', 'class'=>'form-control'))}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Provinsi</label>
					<div class="col-md-4">
						{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'required','id'=>'provinsi', 'class'=>'form-control'))}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Kota</label>
					<div class="col-md-4">
						{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'required','id'=>'kota', 'class'=>'form-control'))}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Alamat</label>
					<div class="col-md-4">
						<textarea class="form-control" rows="3" placeholder="Alamat" name="alamat" required="required">{{$user->alamat}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Kode Pos</label>
					<div class="col-md-4">
						<input type="text" class="form-control" placeholder="Kode Pos" name="kodepos" value="{{$user->kodepos}}" required="required">
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label class="col-md-2 control-label">Password Lama</label>
					<div class="col-md-4">
						<input type="password" class="form-control" name="oldpassword" placeholder="Password Lama">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Password Baru</label>
					<div class="col-md-4">
						<input type="password" class="form-control" name="password" placeholder="Password Baru">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Ulang Password</label>
					<div class="col-md-4">
						<input type="password" class="form-control" name="password_confirmation" placeholder="Ulang Password">
					</div>
				</div>
				<hr />
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<button class="btn btn-danger" type="submit">Simpan</button>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>