<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Thông tin </h3>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>{{ getConfigValueFromSettingTable('address')}}</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>{{ getConfigValueFromSettingTable('phone_contact') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>{{ getConfigValueFromSettingTable('email')}}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">CƠ SỞ 1</h3>
                        <ul class="footer-links">
                            <li><a href="">Số 210 Thái Hà, Trung Liệt, Đống Đa, Hà Nội</a></li>
                            <li><a href="">Điện thoại: 1900 2655</a></li>
                            <li><a href="">0922 744 999</a></li>
                            <li><a href="">Email:sales@ankhang.vn</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">CƠ SỞ 1</h3>
                        <ul class="footer-links">
                            <li><a href="">Số 31 ngõ 100 Dịch Vọng Hậu Cầu Giấy, Hà Nội, (The Premier)</a></li>
                            <li><a href="">Điện thoại: 1900 2655</a></li>
                            <li><a href="">0399 655 368</a></li>
                            <li><a href="">Email:sales@ankhang.vn</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">TRUNG TÂM BẢO HÀNH</h3>
                        <ul class="footer-links">
                            <li><a href="">Tầng 3,210 Thái Hà, Đống Đa, Hà Nội</a></li>
                            <li><a href="">Điện thoại: 1900 2655 (+105)</a></li>
                            <li><a href="">093 669 7181</a></li>
                            <li><a href="">Email:baohanh@ankhang.vn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        {!! getConfigValueFromSettingTable('footer_information') !!}
                    </span>
                </div>
            </div>
                <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>