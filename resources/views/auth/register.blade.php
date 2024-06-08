
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Register</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{('/')}}asset/deskapp/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{('/')}}asset/deskapp/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{('/')}}asset/deskapp/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{('/')}}asset/deskapp/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="{{('/')}}asset/deskapp/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{('/')}}asset/deskapp/src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="{{('/')}}asset/deskapp/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body class="login-page">
	
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{('/')}}asset/deskapp/vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						<div class="wizard-content">
							<form class="tab-wizard2 wizard-circle wizard" action="{{route('register.akun')}}" method="POST">
								@csrf
								<h5>Account Login</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Nama Lengkap</label>
											<div class="col-sm-8">
												<input type="text" name="name" id="fullname" class="form-control" placeholder="Klik Disini" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Username</label>
											<div class="col-sm-8">
												<input type="text" name="username" id="username" class="form-control" placeholder="Klik Disini" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Password*</label>
											<div class="col-sm-8">
												<input type="password" name="password" class="form-control" placeholder="********" required>
											</div>
										</div>
									</div>
								</section>
								<!-- Step 2 -->
								<h5>Personal Information</h5>
								<section>
									<div class="form-wrap max-width-800 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Umur</label>
											<div class="col-sm-8">
												<input type="number" name="umur" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Alamat</label>
											<div class="col-sm-8">
												<textarea class="textarea_editor form-control border-radius-0" placeholder="Masukan Alamat" name="alamat" required></textarea>
												{{-- <textarea  placeholder="Masukan Alamat" name="alamat" required></textarea> --}}
											</div>
										</div>
										
										
										
										<div style="text-align:right">
											<button class="btn btn-outline-primary mb-3 text-bold" style="font-weight:600; margin-right:-10px;  border-width:2px; font-family:'Inter', sans-serif; width:100px; height:42px; ">Submit</button>
										</div>
									</div>
								</section>
								<!-- Step 3 -->
								
								<!-- Step 4 -->
								<!-- <h5>Overview Information</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<ul class="register-info">
											<li>
												<div class="row">
													<div class="col-sm-4 weight-600">Nama Lengkap</div>
													<div class="col-sm-8" id="nama1"></div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-sm-4 weight-600">Username</div>
													<div class="col-sm-8">Username</div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-sm-4 weight-600">Jenis Lempar</div>
													<div class="col-sm-8">Kapak</div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-sm-4 weight-600">Klub</div>
													<div class="col-sm-8">PNP</div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-sm-4 weight-600">Kategori</div>
													<div class="col-sm-8">PNP</div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-sm-4 weight-600">Kelas</div>
													<div class="col-sm-8">Berat</div>
												</div>
											</li>
										</ul>
									</div>
								</section> -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html Start -->
	<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
	<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20">Form Submitted!</h3>
					<div class="mb-30 text-center"><img src="{{('/')}}asset/deskapp/vendors/images/success.png"></div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				</div>
				<div class="modal-footer justify-content-center">
					<a href="login.html" class="btn btn-primary">Done</a>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html End -->
	<!-- js -->
	<script>
		function test(){
			console.log(window.localStorage.getItem('nama_lengkap'));
			// $('#nama1').html(window.localStorage.getItem('nama_lengkap'))
		}
		$('#next').click(function(){
			window.localStorage.setItem('nama_lengkap', $('#fullname').val());
			test();
		})
		
	</script>
	<script src="{{('/')}}asset/deskapp/vendors/scripts/core.js"></script>
	<script src="{{('/')}}asset/deskapp/vendors/scripts/script.min.js"></script>
	<script src="{{('/')}}asset/deskapp/vendors/scripts/process.js"></script>
	<script src="{{('/')}}asset/deskapp/vendors/scripts/layout-settings.js"></script>
	<script src="{{('/')}}asset/deskapp/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="{{('/')}}asset/deskapp/vendors/scripts/steps-setting.js"></script>
</body>

</html>