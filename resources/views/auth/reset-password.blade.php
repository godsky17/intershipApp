@extends('auth.base')
@section('content')
    <div class="right-column  relative">
        <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
            <div class="auth-box h-full flex flex-col justify-center">
                <div class="mobile-logo text-center mb-6 lg:hidden block">
                    <a href="index.html">
                        <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="" class="mb-10 dark_logo">
                        <img src="{{ asset('assets/images/logo/logo-white.svg') }}" alt="" class="mb-10 white_logo">
                    </a>
                </div>
                <div class="text-center 2xl:mb-10 mb-4">
                    <h4 class="font-medium">Sign in</h4>
                    <div class="text-slate-500 text-base">
                        Sign in to your account to start using Dashcode
                    </div>
                </div>
                
                <!-- SUCCESS ALERT COMPONENT -->
                @if (session('status'))
                    <x-alert type="success">{{ session('status') }}</x-alert>
                @endif
                
                <!-- BEGIN: Registration Form -->

                <x-auth.form method="POST" action="{{route('password.store')}}">
                    <x-auth.input class="hidden" type="text" name="token" label="" placeholder="" value="{{$token}}"></x-auth.input>
                    <x-auth.input class="" type="email" name="email" label="Email" placeholder="Enter your email" value="{{ old('email', $email) }}"></x-auth.input>
                    <x-auth.input class="" type="password" name="password" label="Password" placeholder="Enter your password" value=""></x-auth.input>
                    <x-auth.input class="" type="password" name="password_confirmation" label="Password" placeholder="Enter your password" value=""></x-auth.input>
                    <div class="flex justify-between">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" class="hiddens">
                            <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">You
                                accept our Terms and Conditions and
                                Privacy Policy</span>
                        </label>
                    </div>
                    <button class="btn btn-dark block w-full text-center">Create an account</button>
                 </x-auth.form>
                {{-- <form class="space-y-4" action="{{ route('password.store') }}" method="POST">
                    @csrf
                    <input type="text" name="token" id="" value="{{ $token }}" class="hidden">
                    <div class="fromGroup">
                        <label class="block capitalize form-label">email</label>
                        <div class="relative ">
                            <input type="email" name="email" class="  form-control py-2" placeholder="Enter your email"
                                value="{{ old('email', $email) }}">
                        </div>
                        @error('email')
                            <div class="">
                                <p class="" style="color: red; font-size:13px; font-weigth:300">
                                    {{ $message }}
                                </p>
                            </div>
                        @enderror
                    </div>
                    <div class="fromGroup       ">
                        <label class="block capitalize form-label  ">passwrod</label>
                        <div class="relative ">
                            <input type="password" name="password" class="  form-control py-2   "
                                placeholder="Enter your password">
                        </div>
                        @error('password')
                            <div class="">
                                <p class="" style="color: red; font-size:13px; font-weigth:300">
                                    {{ $message }}
                                </p>
                            </div>
                        @enderror
                    </div>
                    <div class="fromGroup">
                        <label class="block capitalize form-label">passwrod</label>
                        <div class="relative ">
                            <input type="password" name="password_confirmation" class="  form-control py-2"
                                placeholder="Enter your password">
                        </div>
                        @error('password_confirmation')
                            <div class="">
                                <p class="" style="color: red; font-size:13px; font-weigth:300">
                                    {{ $message }}
                                </p>
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-between">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" class="hiddens">
                            <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">You
                                accept our Terms and Conditions and
                                Privacy Policy</span>
                        </label>
                    </div>
                    <button class="btn btn-dark block w-full text-center">Create an account</button>
                </form> --}}
                <!-- END: Registration Form -->
                <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                    <div
                        class="absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                      px-4 min-w-max text-sm text-slate-500 font-normal">
                        Or continue with
                    </div>
                </div>
                <div class="max-w-[242px] mx-auto mt-8 w-full">

                    <!-- BEGIN: Social Log in Area -->
                    <ul class="flex">
                        <li class="flex-1">
                            <a href="#"
                                class="inline-flex h-10 w-10 bg-[#1C9CEB] text-white text-2xl flex-col items-center justify-center rounded-full">
                                <img src="{{ asset('assets/images/icon/tw.svg') }}" alt="">
                            </a>
                        </li>
                        <li class="flex-1">
                            <a href="#"
                                class="inline-flex h-10 w-10 bg-[#395599] text-white text-2xl flex-col items-center justify-center rounded-full">
                                <img src="{{ asset('assets/images/icon/fb.svg') }}" alt="">
                            </a>
                        </li>
                        <li class="flex-1">
                            <a href="#"
                                class="inline-flex h-10 w-10 bg-[#0A63BC] text-white text-2xl flex-col items-center justify-center rounded-full">
                                <img src="{{ asset('assets/images/icon/in.svg') }}" alt="">
                            </a>
                        </li>
                        <li class="flex-1">
                            <a href="#"
                                class="inline-flex h-10 w-10 bg-[#EA4335] text-white text-2xl flex-col items-center justify-center rounded-full">
                                <img src="{{ asset('assets/images/icon/gp.svg') }}" alt="">
                            </a>
                        </li>
                    </ul>
                    <!-- END: Social Log In Area -->
                </div>
                <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-8 uppercase text-sm">
                    <span>ALREADY REGISTERED?
                    </span>
                    <a href="{{ route('login') }}" class="text-slate-900 dark:text-white font-medium hover:underline">
                        Sign In
                    </a>
                </div>
            </div>
            <div class="auth-footer text-center">
                Copyright 2021, Dashcode All Rights Reserved.
            </div>
        </div>
    </div>
@endsection
