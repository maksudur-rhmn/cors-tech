<footer class="footer">
  <div class="footer-row">
      <div class="footer-col">
          <ul class="footer-list">
              <li><a href="#">Become a trainer</a></li>
              <li><a href="#">Download application</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Contact-us</a></li>
          </ul>
      </div>
      <div class="footer-col">
          <ul class="footer-list">
              <li><a href="#">Career</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Help and support</a></li>
              <li><a href="#">Affiliation</a></li>
          </ul>
      </div>
      <div class="footer-col">
          <ul class="footer-list">
              <li><a href="#">Conditions</a></li>
              <li><a href="#">Confidentiality / Cookies</a></li>
              <li><a href="#">Sitemap</a></li>
              <li><a href="#">Showing courses</a></li>
          </ul>
      </div>
      <div class="footer-col">
          <ul class="footer-list">
              <li><a href="#">Language</a></li>
          </ul>
          <ul class="footer-language">
              <li><a href="#">FR</a></li>
              <li><a href="#">EN</a></li>
              <li><a href="#">ES</a></li>
              <li><a href="#">DE</a></li>
          </ul>
      </div>
  </div>
  <p class="footer-copyright">Cors Tech - <script>document.write(new Date().getFullYear())</script> Copyright</p>
</footer>


<!-- Modal -->
<div
class="modal fade"
id="myModal"
tabindex="-1"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog modal-dialog--sm modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <div class="ml-auto">
                <h1 class="color-main">Registration particular</h1>
                <h4 class="color-main font-weight-bold">Already have an account ? Log in</h4>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="modal-form py-4" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="modal-input">
                            <label for="">Your Pseudo</label>
                            <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="text-field w-input" id="name" />
                            <label for="">Password</label>
                            <input type="password" name="password" required autocomplete="new-password" class="text-field w-input" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="modal-input">
                            <label for="">Your addresse email</label>
                            <input type="email" name="email" :value="old('email')" required  id="email" class="text-field w-input" />
                        </div>
                        <div class="modal-input">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" required autocomplete="new-password" id="password_confirm" class="text-field w-input" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="modal-input">
                            <label for="">Register as</label>
                            <select class="form-control" name="role" id="">
                                <option value="student">Student</option>
                                <option value="coach">Trainer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-checkbox">
                    <input name="agree" type="checkbox" />
                    <label for=""
                        >I accept the <a href="#">CGU</a> et <a href="#">CGV</a> of site Cors Tech</label
                    >
                </div>
                <button type="submit" class="button button--outline-main-empty">Register</button>
            </form>
            <div class="modal-social">
                {{-- <div class="modal-social-box">
                    <button class="modal-social--button modal-social--facebook">
                        <i class="fab fa-facebook-f"></i>
                        Login via Facebook
                    </button>
                </div>
                <div class="modal-social-box">
                    <button class="modal-social--button modal-social--google">
                        <i class="fab fa-google"></i>
                        Login by Google
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>

		<!-- Modal -->
		<div
			class="modal fade"
			id="logModal"
			tabindex="-1"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog--sm modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<div class="ml-auto">
							<h1 class="color-main">Personal space</h1>
							<h4 class="color-main font-weight-bold">No account yet? Sign up</h4>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<figure class="modal-avatar"><img src="img/modal-cover-1.jpg" alt="" /></figure>
						<form class="modal-form" id="email-form" method="POST" action="{{ route('login') }}" class="access_form">
                            @csrf
							<div class="modal-input">
								<label for="">Your Email Address</label>
                                <input type="email" name="email" :value="old('email')" required autofocus class="text-field w-input" autofocus="true" maxlength="256"  id="email" required="" />
							</div>
							<div class="modal-input"><label for="">Password</label>
                                <input type="password" name="password" required autocomplete="current-password" class="text-field w-input" maxlength="256"  id="password" />
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="footer-link forgot_password"><h4 class="color-main font-weight-bold mb-3">Forgot Password? </h4></a>
                            @endif
                          <button type="submit" class="button button--outline-main-empty">Login</button>
						</form>
						{{-- <div class="modal-social">
							<div class="modal-social-box">
								<button class="modal-social--button modal-social--facebook">
									<i class="fab fa-facebook-f"></i>
									Login via Facebook
								</button>
							</div>
							<div class="modal-social-box">
								<button class="modal-social--button modal-social--google">
									<i class="fab fa-google"></i>
									Login by Google
								</button>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('cors_assets/js/jquery.js') }}"></script>
<script src="{{ asset('cors_assets/js/popper.js') }}"></script>
<script src="{{ asset('cors_assets/js/bootstrap.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('cors_assets/js/main.js') }}"></script>

@yield('custom-js')
</body>
</html>