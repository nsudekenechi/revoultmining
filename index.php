<?php
$title = "Home";
require_once "./includes/header.php";
?>
<style>
    #header-landing {
        height: 90vh;
    }

    #first {
        order: 1;
    }

    #second {
        order: 2;
    }

    @media screen and (max-width:765px) {
        #header-landing {
            height: 60vh;
        }

        #first {
            order: 2;
        }

        #second {
            order: 1;
        }
    }
</style>
<div class="header-content my-auto py-5">
    <div class="container">
        <div class="row flex-lg-row-reverse align-items-center justify-content-between g-gs">
            <div class="col-lg-5 mb-n3 mb-lg-0" id="first">
                <div class="header-image header-image-s2" id="header-landing">
                    <img src="./images/hero.jpg" alt="" style=" width:100%;height:100%;object-fit:cover;">
                </div><!-- .header-image -->
            </div><!-- .col- -->
            <div class="col-lg-6 col-md-10" id="second">
                <div class="header-caption">
                    <div class="header-rating rating">

                        <div class="rating-text">Invest Safely, Invest Smartly</div>
                    </div>
                    <h1 class="header-title">The Revolution in Finance & Investments.</h1>
                    <div class="header-text">
                        <p>Become part of a global community of crypto enthusiasts and investors who trust ZenixMining
                            for their investment needs.
                            Secure, reliable, and innovative – that’s the ZenixMining promise.
                        </p>
                    </div>
                    <ul class="header-action ">

                        <li> <a href="./auth/register.php"
                                class="btn btn-outline-primary d-flex justify-content-center btn-lg w-50 "><span>Get
                                    Started</span></a>
                        </li>
                    </ul>
                </div><!-- .header-caption -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div>


<div class="header-brand py-4 py-lg-4">
    <div class="container">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>

            <script type="text/javascript"
                src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    {
                        "symbols": [
                            {
                                "description": "",
                                "proName": "TURQUOISE:SHELL"
                            },
                            {
                                "description": "",
                                "proName": "TURQUOISE:BARCL"
                            },
                            {
                                "description": "",
                                "proName": "TURQUOISE:RRL"
                            },
                            {
                                "description": "",
                                "proName": "TURQUOISE:BPL"
                            },
                            {
                                "description": "",
                                "proName": "TURQUOISE:BTL"
                            },
                            {
                                "description": "",
                                "proName": "TURQUOISE:TSCOL"
                            },
                            {
                                "description": "",
                                "proName": "TURQUOISE:BATSL"
                            },
                            {
                                "description": "",
                                "proName": "TURQUOISE:ULVRL"
                            }
                        ],
                            "showSymbolLogo": true,
                                "colorTheme": "light",
                                    "isTransparent": false,
                                        "displayMode": "regular",
                                            "locale": "en"
                    }
                </script>
        </div>
        <!-- TradingView Widget END -->
    </div><!-- .container -->
</div><!-- .header-brand -->
</header><!-- .header -->
<section class="section section-feature" id="feature">
    <div class="container">
        <div class="row align-items-center justify-content-between g-gs">
            <div class="col-lg-6">
                <div class="img-block">
                    <img src="https://images.pexels.com/photos/1367276/pexels-photo-1367276.jpeg" alt="">
                </div><!-- .img-block -->
            </div><!-- .col -->
            <div class="col-xl-5 col-lg-6">
                <div class="text-block">
                    <h3 class="title fw-medium mb-5">Why Choose ZenixMining?</h3>
                    <div class="g-gs">
                        <div class="service service-inline service-s6">
                            <div class="service-icon styled-icon styled-icon-4x styled-icon-s4 text-primary">
                                <svg x="0px" y="0px" viewBox="0 0 512 512" style="fill:currentColor"
                                    xml:space="preserve">
                                    <path style="fill:currentColor; opacity:.52;" d="M197.3,0h-160C16.7,0,0,16.7,0,37.3v96c0,20.6,16.7,37.3,37.3,37.3h160c20.6,0,37.3-16.8,37.3-37.3v-96
    C234.7,16.7,217.9,0,197.3,0z" />
                                    <path style="fill:currentColor" d="M197.3,213.3h-160C16.7,213.3,0,230.1,0,250.7v224C0,495.2,16.7,512,37.3,512h160c20.6,0,37.3-16.8,37.3-37.3
    v-224C234.7,230.1,217.9,213.3,197.3,213.3z" />
                                    <path style="fill:currentColor; opacity:.52;" d="M474.7,341.3h-160c-20.6,0-37.3,16.8-37.3,37.3v96c0,20.6,16.7,37.3,37.3,37.3h160c20.6,0,37.3-16.8,37.3-37.3
    v-96C512,358.1,495.2,341.3,474.7,341.3z" />
                                    <path style="fill:currentColor" d="M474.7,0h-160c-20.6,0-37.3,16.7-37.3,37.3v224c0,20.6,16.7,37.3,37.3,37.3h160c20.6,0,37.3-16.8,37.3-37.3
    v-224C512,16.7,495.2,0,474.7,0z" />
                                </svg>
                            </div>
                            <div class="service-text">
                                <h5 class="title fw-medium">High ROI Potential</h5>
                                <p>Maximize your investments with our industry-leading ROI rates, experience significant
                                    returns on your crypto investments with ZenixMining.</p>
                            </div>
                        </div><!-- .service -->
                        <div class="service service-inline service-s6">
                            <div class="service-icon styled-icon styled-icon-4x styled-icon-s4 text-primary">
                                <svg x="0px" y="0px" viewBox="0 0 512 512" style="fill:currentColor"
                                    xml:space="preserve">
                                    <path style="fill:currentColor" d="M486.9,71.7c-0.9-6.6-5.9-12-12.5-13.8L261.2,0.6c-3-0.8-6.2-0.8-9.3,0L38.7,57.9c-6.7,1.8-11.6,7.2-12.5,13.8
    C25,80.3-3.2,283,69.1,383.9C141.4,484.6,248,510.5,252.5,511.5c1.3,0.3,2.7,0.5,4.1,0.5c1.4,0,2.7-0.2,4.1-0.5
    c4.5-1,111.1-26.9,183.4-127.6C516.4,283,488.2,80.3,486.9,71.7z M394.1,190.1L248.6,330.4c-3.4,3.3-7.8,4.9-12.2,4.9
    s-8.9-1.6-12.2-4.9l-89.9-86.8c-3.3-3.1-5.1-7.4-5.1-11.8c0-4.4,1.8-8.7,5.1-11.8l17.8-17.2c6.8-6.5,17.7-6.5,24.5,0l59.8,57.7
    l115.3-111.3c3.3-3.1,7.7-4.9,12.2-4.9c4.6,0,9,1.8,12.2,4.9l17.8,17.2C400.8,172.9,400.8,183.5,394.1,190.1z" />
                                </svg>
                            </div>
                            <div class="service-text">
                                <h5 class="title fw-medium">Secure and Reliable</h5>
                                <p>Invest with confidence, knowing your assets are protected by top-tier security
                                    measures, our robust infrastructure is designed to ensure the safety and
                                    reliability of your investments.</p>
                            </div>
                        </div><!-- .service -->
                        <div class="service service-inline service-s6">
                            <div class="service-icon styled-icon styled-icon-4x styled-icon-s4 text-primary">
                                <svg x="0px" y="0px" viewBox="0 0 512 512" style="fill:currentColor"
                                    xml:space="preserve">
                                    <g>
                                        <defs>
                                            <rect id="PIESVGID_1_" x="5.7" width="500.1" height="512" />
                                        </defs>
                                        <clipPath id="PIESVGID_2_">
                                            <use xlink:href="#PIESVGID_1_" style="overflow:visible;" />
                                        </clipPath>
                                        <g style="clip-path:url(#PIESVGID_2_);">
                                            <path style="fill:currentColor; opacity:.52;" d="M266.1,0c-5.8,0-10.4,4.8-10.4,10.7v234.4c0,5.9,4.7,10.7,10.4,10.7h229.2c5.8,0,10.4-4.8,10.4-10.7
            C505.6,109.8,398.4,0.1,266.1,0z" />
                                            <path style="fill:currentColor" d="M378.5,451.6L234.9,262.7V32c0-5.9-4.7-10.7-10.4-10.7C103.8,21.3,5.7,131.2,5.7,266.4
            C5.8,401.7,113,511.3,245.3,511.5c48,3.8,95.5-12.4,131.6-45.1C381.3,462.7,382,456.2,378.5,451.6z" />
                                            <path style="fill:currentColor; opacity:.7;" d="M495.3,277H287c-5.8,0-10.4,4.8-10.4,10.7c0,2.4,0.8,4.8,2.3,6.7l135.4,171.5c1.8,2.3,4.5,3.7,7.4,3.9h0.7
            c2.6,0,5.2-1,7.1-2.9c48.5-46.4,76.1-111.3,76.2-179.3C505.8,281.8,501.1,277,495.3,277z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="service-text">
                                <h5 class=" fw-medium">Flexible Investment Plan</h5>
                                <p>Choose from a variety of investment plans tailored to your financial goals, find the
                                    perfect plan that suits your budget and desired returns.</p>
                            </div>
                        </div><!-- .service -->
                    </div>
                </div><!-- .text-block -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- .section -->
<section class="section section-feature ">
    <div class="container">
        <div class="row g-gs justify-content-lg-between align-items-center">
            <div class="col-lg-5">
                <div class="text-block">
                    <h3 class="title fw-medium">Who we are?</h3>
                    <p>At
                        ZenixMining, we are passionate about harnessing the power of blockchain technology to create
                        profitable and secure investment opportunities for our clients.</p>
                    <ul class="list list-lg list-primary list-checked-circle outlined mb-5">
                        <li>We prioritize the safety of your investments with top-tier security measures and a
                            commitment to transparency. </li>
                        <li>Our track record of delivering strong returns speaks for itself. We are dedicated to
                            maximizing your investment potential.</li>
                        <li>As the crypto market evolves, so do we. We are constantly exploring new opportunities and
                            technologies to enhance your investment experience.</li>
                    </ul>
                    <a href="./aboutus.php" target="_blank"
                        class="btn btn-primary btn-lg w-50 d-flex justify-content-center">Learn more</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="row text-center g-gs pe-lg-4 pe-xl-0 pb-3 pb-lg-0">
                    <div class="col-6 p-3">
                        <div class="card card-full card-shadow">
                            <div class="card-inner">
                                <div class="card-img mb-3">
                                    <h1>
                                        <em class="icon ni ni-notes-alt"></em>
                                    </h1>
                                </div>
                                <div class="">
                                    <p class="text-dark h6">Track Funds</p>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->

                    <div class="col-6 p-3">
                        <div class="card card-full card-shadow">
                            <div class="card-inner">
                                <div class="card-img mb-3">
                                    <h1>
                                        <em class="icon ni ni-coins"></em>
                                    </h1>
                                </div>
                                <div class="">
                                    <p class="text-dark h6">Regular Payouts</p>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->

                    <div class="col-6 p-3">
                        <div class="card card-full card-shadow">
                            <div class="card-inner">
                                <div class="card-img mb-3">
                                    <h1>
                                        <em class="icon ni ni-wallet-in"></em>
                                    </h1>
                                </div>
                                <div class="">
                                    <p class="text-dark h6">Instant Withdrawals</p>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->

                    <div class="col-6 p-3">
                        <div class="card card-full card-shadow">
                            <div class="card-inner">
                                <div class="card-img mb-3">
                                    <h1>
                                        <em class="icon ni ni-growth"></em>
                                    </h1>
                                </div>
                                <div class="">
                                    <p class="text-dark h6">Investment Growth</p>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->


                </div>
            </div><!-- .col -->

        </div><!-- .row -->
    </div><!-- .container -->
</section>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
        async>
            {
                "symbols": [
                    {
                        "proName": "FOREXCOM:SPXUSD",
                        "title": "S&P 500 Index"
                    },
                    {
                        "proName": "FOREXCOM:NSXUSD",
                        "title": "US 100 Cash CFD"
                    },
                    {
                        "proName": "FX_IDC:EURUSD",
                        "title": "EUR to USD"
                    },
                    {
                        "proName": "BITSTAMP:BTCUSD",
                        "title": "Bitcoin"
                    },
                    {
                        "proName": "BITSTAMP:ETHUSD",
                        "title": "Ethereum"
                    }
                ],
                    "showSymbolLogo": true,
                        "isTransparent": false,
                            "displayMode": "adaptive",
                                "colorTheme": "light",
                                    "locale": "en"
            }
        </script>
</div>
<!-- TradingView Widget END -->
<section class="section section-facts bg-grad-a has-ovm" id="facts">

    <div class="container">
        <div class="row g-gs align-items-center">
            <div class="col-lg-7">
                <div class="text-block is-dark pe-xl-5">
                    <h2 class="title">Achieve More with Smart Crypto Investments</h2>
                    <p class="text-light">Unlock unparalleled growth and secure your financial future with ZenixMining's
                        expert-driven crypto investment solutions.</p>
                </div><!-- .text-block -->
            </div><!-- .col -->
            <div class="col-lg-5">
                <div class="row text-center g-gs">
                    <div class="col-6">
                        <a href="./auth/"
                            class="btn-primary btn w-100 p-2 p-md-3 d-flex align-items-center justify-content-center h6">
                            Invest now
                        </a>
                    </div><!-- .col -->
                    <div class="col-6">
                        <a href="./auth/register.php"
                            class="btn-outline-light btn w-100 p-2 p-md-3 d-flex align-items-center justify-content-center h6">
                            Get
                            started
                        </a>
                    </div><!-- .col -->

                </div><!-- .row -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
    <!-- <div class="nk-ovm shape-b shape-cover shape-top"></div> -->
    <div class="nk-ovm shape-b shape-cover"></div>
</section>

<section class="section section-feature pb-0">
    <div class="container">
        <div class="row align-items-center g-gs">
            <div class="col-lg-6">
                <div class="img-block img-block-s2 pe-xl-6 pe-lg-3  " style="height:400px;">
                    <img src="./images/86c2e65673fea0820037923e7dbb5a15[1].jpg" alt=""
                        style="height:100%;width:100%;object-fit:cover;">
                </div><!-- .img-block -->
            </div><!-- .col -->
            <div class="col-lg-6">
                <div class="text-block">
                    <h2 class="title">Our partners</h2>
                    <div class="mt-4 ms-n3 ms-sm-n4">
                        <div class="row gy-gs">
                            <div class="col-12">
                                <div class="card service service-inline">
                                    <div class="card-inner">

                                        <div class="">
                                            <p>ZenixMining has officially partnered with JPMorgan Chase & Co., a global
                                                financial powerhouse known for its stability and expertise. This
                                                partnership marks a significant milestone for us, as we align with a
                                                trusted name in finance to enhance the services and opportunities we
                                                provide to our users. With JPMorgan Chase & Co. by our side, we're able
                                                to offer more robust investment solutions, blending the reliability of
                                                traditional finance with the cutting-edge potential of cryptocurrency.
                                                Together, we are setting a new standard in the investment landscape,
                                                ensuring your financial future is in capable hands
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div>

                        </div>
                    </div>
                </div><!-- .text-block -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</section>

<section class="section section-pricing" id="pricing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-head text-center">
                    <h2 class="title">Choose Right Plan For You</h2>
                    <p>At ZenixMining we believe in providing personalized solutions to meet your unique needs.
                        Our range of plans is designed to offer flexibility, affordability, and comprehensive benefits
                        tailored to suit your lifestyle and goals.</p>
                </div><!-- .section-head -->
            </div>
        </div><!-- .row -->
        <div class="row justify-content-center justify-content-lg-between align-items-center g-gs">
            <?php
            $query = "SELECT * FROM plans";
            $res = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($res)) {
                ?>

                <div class="col-xl-3 col-sm-6">
                    <div class="pricing pricing-s2 card card-shadow round-md">
                        <div class="card-inner card-inner-lg">
                            <?php
                            if ($row['id'] == 2) {
                                ?>
                                <div class="pricing-badge">Popular</div>
                                <?php
                            }
                            ?>
                            <h2 class="pricing-anount text-purple text-capitalize"><?= $row['name']; ?></h2>
                            <h5 class="pricing-title text-capitalize"><?= $row['days']; ?> days</h5>
                            <span class="sub-title"><?= $row['description']; ?> </span>
                            <hr class="hr border-light">
                            <ul class="pricing-feature list list-nostyle">
                                <li>Minimum: <span class="amount text-dark"><?= $row['min_deposit']; ?></span></li>
                                <li>Maximum: <span class="amount text-dark"><?= $row['max_deposit']; ?></span></li>
                                <li>Daily Returns: <?= $row['daily_interest']; ?>%</li>
                                <li>Total Returns: <?= $row['daily_interest'] * $row['days']; ?>%</li>
                            </ul>
                            <div class="pricing-action">
                                <a href="./auth/"
                                    class="btn btn-primary btn-lg btn-round w-100 d-flex justify-content-center"><span>Invest
                                        Now</span></a>
                            </div>
                        </div><!-- card-inner -->
                    </div><!-- .pricing .card -->
                </div><!-- .col -->
                <?php
            }
            ?>


        </div><!-- .row -->
    </div><!-- .container -->
</section>

<section class="section section-reviews" id="reviews">
    <div class="container">
        <div class="row justify-content-lg-center text-lg-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-head">
                    <h2 class="title">What Our Clients Say</h2>
                    <p class="fs-15px">At ZenixMining, client satisfaction is our top priority, Join our satisfied
                        clients and experience the ZenixMining difference!. Here's what some of our
                        clients have to say about their experiences with us:</p>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        <div class="row g-gs">
            <?php
            $plans = [
                [
                    "img" => "https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=600",
                    "name" => "Helen Sanchez",
                    "desc" => "Gold Plan",
                    "text" => "Investing with ZenixMining has been a game-changer. The returns are consistent, and the support team is always there to help. I couldn't be happier!",
                ],
                [
                    "img" => "https://images.pexels.com/photos/1449667/pexels-photo-1449667.jpeg?auto=compress&cs=tinysrgb&w=600",
                    "name" => "Maria Luke",
                    "desc" => "Silver Plan",
                    "text" => "I started with the Silver  plan and was impressed by the seamless process and the daily returns. It's a great way to grow your investments.",
                ],
                [
                    "img" => "https://images.pexels.com/photos/160914/smile-man-worker-vertical-160914.jpeg?auto=compress&cs=tinysrgb&w=600",
                    "name" => "Alex  Sanchez",
                    "desc" => "Starter Plan",
                    "text" => "ZenixMining offers an excellent entry point for beginners like me. The Starter plan was affordable, and I saw steady growth in my investments.",
                ],
                [
                    "img" => "https://images.pexels.com/photos/1065084/pexels-photo-1065084.jpeg?auto=compress&cs=tinysrgb&w=600",
                    "name" => "Sophia Kennedy",
                    "desc" => "Platinum Plan",
                    "text" => "The Platinum plan has exceeded my expectations. ZenixMining provides VIP support and exclusive insights for Platinum members, which have been invaluable. Highly recommend!",
                ]
            ]
                ?>
            <?php
            foreach ($plans as $plan) {
                ?>
                <div class="col-md-6">
                    <div class="card card-shadow">
                        <div class="card-inner card-inner-lg">
                            <div class="review review-s4">
                                <div class="review-user user user-s1">
                                    <div class="img">
                                        <img class="img-circle sm" src="<?= $plan['img']; ?>" style="object-fit:cover;"
                                            alt="">
                                    </div><!-- img-->
                                    <div class="info  w-50">
                                        <h6 class="name mb-1"><?= $plan['name']; ?></h6>
                                        <div class="role d-flex  align-items-center gap-2">
                                            <?= $plan['desc']; ?>
                                        </div>
                                    </div>
                                </div><!-- user -->
                                <div class="review-text">
                                    <p><?= $plan['text']; ?></p>
                                </div>
                            </div><!-- review-->
                        </div><!-- card-inner -->
                    </div><!-- card -->
                </div><!-- col -->
                <?php
            }
            ?>



            <!-- col -->
        </div><!-- row -->
    </div><!-- .container -->
</section>
<script>
    let amounts = document.querySelectorAll(".amount");

    amounts.forEach(amount => {
        if (!isNaN(amount.innerHTML)) {
            amount.innerHTML = new Intl.NumberFormat("en-gb", { currency: "GBP", style: "currency" }).format(amount.innerHTML)
        }
    });
</script>
<?php
require_once "./includes/footer.php";
?>