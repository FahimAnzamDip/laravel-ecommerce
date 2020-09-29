@extends('layouts.app')

@section('page-content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb"
         style="background: rgba(0, 0, 0, 0) url('{{ asset('frontend_assets') }}/img/blog/5.png') no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('home.page') }}">home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Page Breadcrumb End -->
    <!-- Contact Email Area Start -->
    <div class="contact-email-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="mb-5">Contact Us</h3>
                    <p class="text-capitalize mb-40">Contact Us For The Best Support.</p>
                    <div class="row">
                        <form id="contact-form" class="contact-form"
                              action="http://preview.hasthemes.com/nevara/mail.php" method="post">
                            <div class="address-wrapper">
                                <div class="col-md-12">
                                    <div class="address-fname">
                                        <label for="name">Name<span class="require">*</span></label>
                                        <input  id="name" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address-email">
                                        <label for="email">Email<span class="require">*</span></label>
                                        <input id="email" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address-web">
                                        <label for="website">Website</label>
                                        <input id="website" type="text" name="website">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="address-subject">
                                        <label for="subject">Subject<span class="require">*</span></label>
                                        <input id="subject" type="text" name="subject" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="address-textarea">
                                        <label for="message">Message<span class="require">*</span></label>
                                        <textarea id="message" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="form-message ml-15"></p>
                            <div class="col-xs-12 footer-content mail-content">
                                <div class="send-email pull-right">
                                    <input type="submit" value="Send Email" class="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Email Area End -->
@endsection
