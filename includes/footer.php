<footer class="footer">
    <div class="container py-5 py-md-7">
        <div class="row g-gs">
            <div class="col-lg-3 col-md-9 me-auto">
                <div class="widget widget-about">
                    <a href="./" class="logo-link">
                        <img class="logo-light logo-img" src="./images/revolutmining.png"
                            srcset="./images/revolutmining.png" alt="logo">
                        <img class="logo-dark logo-img" src="./images/revolutmining.png"
                            srcset=" ./images/revolutmining.png" alt="logo-dark">
                    </a>
                    <p>Join us at ZenixMining and take the first step towards achieving your financial goals with
                        confidence. </p>
                    <!-- <ul class="social social-primary">
                        <li><a href="#"><em class="icon ni ni-facebook-f"></em></a></li>
                        <li><a href="#"><em class="icon ni ni-instagram"></em></a></li>
                        <li><a href="#"><em class="icon ni ni-twitter"></em></a></li>
                    </ul> -->
                </div><!-- .widget -->
            </div><!-- .col -->
            <div class="col-lg-3 col-mb-4 col-6">
                <div class="widget">
                    <h6 class="widget-title">Company</h6>
                    <ul class="link-list">
                        <li><a href="./aboutus.php">About Us</a></li>
                        <li><a href="./services.php">Investment Options</a></li>
                        <li><a href="#">Pricing Plans</a></li>
                    </ul>
                </div>
            </div><!-- .col -->
            <div class="col-lg-3 col-mb-4 col-6">
                <div class="widget">
                    <h6 class="widget-title">Quick Links</h6>
                    <ul class="link-list">
                        <li><a href="./faq.php">FAQ</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="./auth/index.php">Login</a></li>
                        <li><a href="./auth/register.php">Sign Up</a></li>
                    </ul>
                </div>
            </div><!-- .col -->

            <div class="col-xl-2 col-lg-3 col-md-8">
                <div class="widget">
                    <h6 class="widget-title">Contact Us</h6>
                    <ul class="widget-contact row gx-gs">
                        <li class="col-mb-6 col-lg-12"><em class="icon ni ni-map-pin-fill"></em><span> 123 Innovation
                                Drive Wolverhampton WV9 5HQ, United Kingdom</span></li>
                        <li class="col-mb-6 col-lg-12">
                            <a href="mailto:support@zenixmining.com" class="d-flex align-items-center"> <em
                                    class="icon ni ni-mail"></em><span>support@zenixmining.com</span></a>
                        </li>
                    </ul>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
    <div class="bg-dark text-center is-dark py-3">
        <div class="container">
            <div class="text-base"> &copy; <?= date('Y'); ?>, Zenixmining. All rights reserved
            </div>
        </div>
    </div>
</footer><!-- .footer -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->


<script src="./assets-home/js/bundle.js?ver=3.1.3"></script>
<script src="./assets-home/js/scripts.js?ver=3.1.3"></script>
<?php
require_once "./handler/alert.php";
?>
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = 'e7290b579d6545677f23c0373b1e837397e97610';
    window.smartsupp || (function (d) {
        var s, c, o = smartsupp = function () { o._.push(arguments) }; o._ = [];
        s = d.getElementsByTagName('script')[0]; c = d.createElement('script');
        c.type = 'text/javascript'; c.charset = 'utf-8'; c.async = true;
        c.src = 'https://www.smartsuppchat.com/loader.js?'; s.parentNode.insertBefore(c, s);
    })(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
<?php
if (!$_SESSION["user"]) {
    ?>
    <style>
        #smartsupp-widget-container {
            opacity: 0;
        }
    </style>
    <?php
}
?>



</body>

</html>