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
                                <a href="{{route('Book Store')}}">Home</a>
                            </li>
                            <li class="is-marked">
                                <a href="{{route('auth.register')}}">Register</a>
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
                            <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
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
                                <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                <form class="l-f-o__form" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="reg-fname">Name *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="reg-fname" name="name" placeholder="Name">
                                        @if ($errors->has('name'))
                                        <span class="textdanger" style="color: red;">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="reg-email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="reg-email" name="email" placeholder="Enter E-mail">
                                        @if ($errors->has('email'))
                                        <span class="textdanger" style="color: red;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="reg-phone">PHONE *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="reg-phone" name="phone" placeholder="Enter phone">
                                        @if ($errors->has('phone'))
                                        <span class="textdanger" style="color: red;">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="reg-address">ADDRESS *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="reg-address" name="address" placeholder="Enter address">
                                        @if ($errors->has('address'))
                                        <span class="textdanger" style="color: red;">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="reg-password">PASSWORD *</label>
                                        <input class="input-text input-text--primary-style" type="password" id="reg-password" name="password" placeholder="Enter Password">
                                        @if ($errors->has('password'))
                                        <span class="textdanger" style="color: red;">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="reg-avatar">AVATAR *</label>
                                        <input class="input-text input-text--primary-style p-2" type="file" id="reg-avatar" name="avatar">
                                        @if ($errors->has('avatar'))
                                        <span class="textdanger" style="color: red;">{{ $errors->first('avatar') }}</span>
                                        @endif
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button>
                                    </div>
                                </form>

                                <a class="gl-link" href="{{route('Book Store')}}">Return to Store</a>
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