@extends('layouts.frontend')

 @section('title')
   AKIL - Register
 @endsection

@section('content')
  <div class="section-7">
      <div class="m_container formbg w-container">
        <h1 class="title center">Register.</h1>
        <h4 class="main_head smalltop center">RECEIVE A <strong class="accent">FREE COURSE</strong>!<strong class="accent"></strong></h4>
        <div class="form-block w-form">
          <form id="email-form" method="POST" action="{{ route('register') }}" class="access_form">
            @csrf
            <label for="name" class="field-label">Name</label>
            <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="text-field w-input" id="name">
            <label for="email" class="field-label">E-Mail Adress</label>
            <input type="email" name="email" :value="old('email')" required  id="email" class="text-field w-input">
            <label for="password" class="field-label">Password</label>
            <input type="password" name="password" required autocomplete="new-password" class="text-field w-input">
            <label for="password_confirm-2" class="field-label">Confirm Password</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password" id="password_confirm" class="text-field w-input">
            <button type="submit" style="margin-bottom:20px;" class="small_button center w-button">Register</button>
            <a class="footer-link forgot_password" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
          </form>
        </div>
      </div>
    </div>
@endsection
