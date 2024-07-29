<footer class="footer">
    <div class="container py-5 py-md-7">
        <div class="row g-gs">
            <div class="col-lg-3 col-md-9 me-auto">
                <div class="widget widget-about">
                    <a href="html/index.html" class="logo-link">
                        <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x"
                            alt="logo">
                        <img class="logo-dark logo-img" src="./images/logo-dark.png"
                            srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                    </a>
                    <p>As our ultimate goal is to design lots of application so these give you a clear
                        understanding where we are heading.</p>
                    <ul class="social social-primary">
                        <li><a href="#"><em class="icon ni ni-facebook-f"></em></a></li>
                        <li><a href="#"><em class="icon ni ni-instagram"></em></a></li>
                        <li><a href="#"><em class="icon ni ni-twitter"></em></a></li>
                    </ul>
                </div><!-- .widget -->
            </div><!-- .col -->
            <div class="col-lg-2 col-mb-4 col-6">
                <div class="widget">
                    <h6 class="widget-title">Product</h6>
                    <ul class="link-list">
                        <li><a href="#">Integration</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Roadmap </a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
            </div><!-- .col -->
            <div class="col-lg-2 col-mb-4 col-6">
                <div class="widget">
                    <h6 class="widget-title">Company</h6>
                    <ul class="link-list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div><!-- .col -->
            <div class="col-lg-2 col-mb-4 col-6">
                <div class="widget">
                    <h6 class="widget-title">Recourse</h6>
                    <ul class="link-list">
                        <li><a href="#">Contract US</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Press/News</a></li>
                    </ul>
                </div>
            </div><!-- .col -->
            <div class="col-xl-2 col-lg-3 col-md-8">
                <div class="widget">
                    <h6 class="widget-title">Contact Us</h6>
                    <ul class="widget-contact row gx-gs">
                        <li class="col-mb-6 col-lg-12"><em class="icon ni ni-map-pin-fill"></em><span> 31
                                Mirpur Street <br />Dhaka, Bangladesh</span></li>
                        <li class="col-mb-6 col-lg-12"><em class="icon ni ni-call-fill"></em><span>(021)
                                5248 631 <br />(021) 5148 6324</span></li>
                    </ul>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
    <div class="bg-dark text-center is-dark py-3">
        <div class="container">
            <div class="text-base"> &copy; 2023, DashLite. Template made by <a href="https://softnio.com"
                    target="_blank">Softnio</a></div>
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
<script src="./assets/js/scripts.js?ver=3.1.3"></script>
<script>
    let text = ["withdrew", "deposited"];

    fetch("./assets/country.json").then(res => res.json()).then(data => {
        setInterval(() => {
            NioApp.Toast(`Someone from <b>${data.country[Math.floor(Math.random() * data.country.length)]} </b> just 
    <b>${text[Math.floor(Math.random() * text.length)]} </b>
  <b>${new Intl.NumberFormat("en-gb", { currency: "GBP", style: "currency" }).format(Math.floor(Math.random() * 100000))}</b>
    `, 'info', { icon: false });
        }, 10000)
    })
</script>
</body>

</html>