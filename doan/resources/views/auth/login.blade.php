@extends('layout')
@section('main-content')
<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">
                                <a href="{{ route('Book Store') }}">Home</a>
                            </li>
                            <li class="is-marked">
                                <a href="{{ route('auth.login') }}">Log in</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">ALREADY REGISTERED?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-30">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                <h1 class="gl-h1">I'M NEW CUSTOMER</h1>
                                <div class="u-s-m-b-15">
                                    <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="{{route('auth.register')}}">CREATE AN ACCOUNT</a>
                                </div>
                                <h1 class="gl-h1">LOG IN</h1>
                                <form class="l-f-o__form" action="" method="POST">
                                    @csrf
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="login-email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="login-email" name="email" placeholder="Enter E-mail" required autofocus>
                                        @if($errors->has('email'))
                                        <span style="color: red;">{{ $errors->first('email') }}</span>
                                        @endif

                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="login-password">PASSWORD *</label>
                                        <input class="input-text input-text--primary-style" type="password" id="login-password" name="password" placeholder="Enter Password" required autofocus>
                                        @if($errors->has('password'))
                                        <span style="color: red;">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <a class="gl-link" href="lost-password.html">Lost Your Password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->
@endsection