@extends('auth.base')
@section('content')
    <div class="right-column relative">
        <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
            <div class="auth-box2 flex flex-col justify-center h-full">
                <div class="mobile-logo text-center mb-6 lg:hidden block">
                    <a href="index.html">
                        <img src="assets/images/logo/logo.svg" alt="" class="mx-auto">
                        <img src="assets/images/logo/logo-white.svg" alt="" class="mx-auto">
                    </a>
                </div>
                <div class="text-center 2xl:mb-10 mb-5">
                    <h4 class="font-medium mb-4">Forgot Your Password?</h4>
                    <div class="text-slate-500 dark:text-slate-400 text-base">
                        Reset Password with Dashcode.
                    </div>
                </div>
                @if (session('status'))
                   <x-alert type="success">{{ session('status') }}</x-alert>
                @endif
                <div
                    class="font-normal text-base text-slate-500 dark:text-slate-400 text-center px-2 bg-slate-100 dark:bg-slate-600 rounded
                                py-3 mb-4 mt-10 {{ session('status') ? 'hidden' : '' }}">
                    Enter your Email and instructions will be sent to you!
                </div>
                <!-- BEGIN: Forgot Password Form -->
                <x-auth.form class="{{ session('status') ? 'hidden' : '' }}" method="POST" action="{{route('password.email')}}">
                    <x-auth.input type="email" name="email" label="Email" value="" placeholder="Enter your email"></x-auth.input>
                    <button class="btn btn-dark block w-full text-center">Send recovery email</button>
                </x-auth.form>
                <!-- END: Forgot Password Form -->

                <div
                    class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-8 uppercase text-sm">
                    Forget It,
                    <a href="index.html" class="text-slate-900 dark:text-white font-medium hover:underline">
                        Send me Back
                    </a>
                    to The Sign In
                </div>
            </div>
            <div class="auth-footer text-center">
                Copyright 2021, Dashcode All Rights Reserved.
            </div>
        </div>
    </div>
@endsection
