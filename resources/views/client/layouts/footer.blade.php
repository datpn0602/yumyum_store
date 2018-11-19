<footer>
    <section class="footer-navbar">
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-lg-8">
                        <div class="footer-column pull-left collapsed-block">
                            <h4>Yum Yum</h4>
                            <div class="tabBlock" id="TabBlock-1">
                                <ul class="links">
                                    <li class="first"><a href="index" title="Home">{{trans('messeage.home')}}</a></li>
                                    <li><a href="about_us" title="About Us">{{trans('messeage.about')}}</a></li>
                                    <li><a href="categories" title="Product">{{trans('messeage.product')}}</a></li>
                                    <li><a href="promotions" title="Promotions">{{trans('messeage.promotions')}}</a></li>
                                    <li><a href="contact_us" title="Contact">{{trans('messeage.contact')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-column pull-left collapsed-block">
                            <h4>{{trans('messeage.adviser')}}</h4>
                            <div class="tabBlock" id="TabBlock-2">
                                <ul class="links">
                                    <li class="first"><a title="Your Account" href="#">{{trans('messeage.account')}}</a></li>
                                    <li><a title="Information" href="#">{{trans('messeage.information')}}</a></li>
                                    <li><a title="Orders History" href="#">{{trans('messeage.oder_History')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-column pull-left collapsed-block">
                            <h4>{{trans('messeage.information')}}</h4>
                            <div class="tabBlock" id="TabBlock-3">
                                <ul class="links">
                                    <li class="first"><a href="#" title="privacy policy">{{trans('messeage.security')}}</a></li>
                                    <li><a href="contact_us" title="Contact Us">{{trans('messeage.contact')}}</a></li>
                                    <li class=" last"><a href="#" title="Our stores" class="link-rss">{{trans('messeage.stores')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <div class="footer-column-last">
                         <div class="newsletter-wrap collapsed-block">
                            <h4>Sign up for emails</h4>
                            <div class="tabBlock" id="TabBlock-4">
                                {!! Form::open(['method' => 'POST', 'id' => 'newsletter-validate-detail']) !!}
                                    <div id="container_form_news">
                                        <div id="container_form_news2">
                                            {!! Form::text('email', 'Enter your email address', ['title' => 'Sign up for our newsletter', 'class' => 'input-text required-entry validate-email']) !!}
                                            {!! Form::button('Subscribe', ['title' => 'Subscribe', 'class' => 'button subscribe']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="social">
                            <h4>Follow Us</h4>
                            <ul class="link">
                                <li class="fb pull-left"><a href="#"></a></li>
                                <li class="tw pull-left"><a href="#"></a></li>
                                <li class="googleplus pull-left"><a href="#"></a></li>
                                <li class="rss pull-left"><a href="#"></a></li>
                                <li class="pintrest pull-left"><a href="#"></a></li>
                                <li class="linkedin pull-left"><a href="#"></a></li>
                                <li class="youtube pull-left"><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div style="text-align:center"><a href="index.html"><img src="client/images/logo1.png" alt="footer-logo"></a></div>
                <address>
                    <i class="icon-location-arrow"></i> Số 1, Đại Cổ Việt, Bách Khoa, Hai Bà Trưng, Hà Nội <i class="icon-mobile-phone"></i><span> +(408) 394-7557</span> <i class="icon-envelope"></i><a href="mailto:support@magikcommerce.com">yumyum@gmail.com</a>
                </address>
            </div>
        </div>
    </div>
</section>
</footer>
