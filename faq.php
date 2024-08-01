<?php
$title = "FAQ";
require_once "./includes/header.php";
?>

<div class="header-content my-auto py-5">
    <div class="container mb-5 pb-5">
        <div class="row flex-lg-row-reverse align-items-center justify-content-between g-gs">
            <div class="col-lg-6 mb-n3 mb-lg-0">
                <p>
                    Navigating the world of cryptocurrency and investment can
                    sometimes feel overwhelming. That's why we've created this FAQ section to provide you with clear,
                    concise answers to your most pressing questions. Whether you're new to crypto mining or a seasoned
                    investor looking for specific information, we’re here to help!
                </p>
            </div><!-- .col- -->
            <div class="col-lg-5 col-md-10">
                <div class="header-caption h1">
                    <h1>Got <span class="text-primary">Questions?</span> We've Got <span
                            class="text-primary">Answers!</span></h1>
                </div><!-- .header-caption -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
    <div style="height:400px;">
        <img src="https://images.pexels.com/photos/3184436/pexels-photo-3184436.jpeg" alt=""
            style="width:100%;height:100%;object-fit:cover;">
    </div>
</div>
</header><!-- .header -->

<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="accordion accordion-s1 card card-shadow border-0 round-xl" id="accordion">
                <div class="accordion-item">
                    <a href="#" class="accordion-head" data-bs-toggle="collapse" data-bs-target="#accordion-item-1">
                        <h6 class="title"> What is ZenixMining?</h6>
                        <span class="accordion-icon"></span>
                    </a>
                    <div class="accordion-body collapse show" id="accordion-item-1" data-bs-parent="#accordion">
                        <div class="accordion-inner">
                            <p>ZenixMining is a cryptocurrency investment platform that offers users the opportunity to
                                invest in Bitcoin mining and various cryptocurrency assets. Our mission is to provide
                                secure and accessible investment options for individuals looking to enter the crypto
                                space. </p>
                        </div>
                    </div>
                </div><!-- .accordion-item -->
                <div class="accordion-item">
                    <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse"
                        data-bs-target="#accordion-item-2">
                        <h6 class="title">How does Bitcoin mining work?</h6>
                        <span class="accordion-icon"></span>
                    </a>
                    <div class="accordion-body collapse" id="accordion-item-2" data-bs-parent="#accordion">
                        <div class="accordion-inner">
                            <p>Bitcoin mining involves solving complex mathematical problems to validate transactions on
                                the Bitcoin network. Miners use specialized hardware to compete in this process, and
                                successful miners are rewarded with newly minted Bitcoins. At ZenixMining, we manage the
                                mining process on your behalf, allowing you to earn rewards without needing to operate
                                your own mining equipment.</p>
                        </div>
                    </div>
                </div><!-- .accordion-item -->
                <div class="accordion-item">
                    <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse"
                        data-bs-target="#accordion-item-3">
                        <h6 class="title">How do I create an account?</h6>
                        <span class="accordion-icon"></span>
                    </a>
                    <div class="accordion-body collapse" id="accordion-item-3" data-bs-parent="#accordion">
                        <div class="accordion-inner">
                            <p>To create an account with ZenixMining, simply click on the "Sign Up" button on our
                                homepage. You'll need to provide some basic information, such as your name, email
                                address, and a secure password. Once your account is created, you can log in and start
                                exploring our investment options.</p>
                        </div>
                    </div>
                </div><!-- .accordion-item -->
                <div class="accordion-item">
                    <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse"
                        data-bs-target="#accordion-item-4">
                        <h6 class="title">Is my investment secure?</h6>
                        <span class="accordion-icon"></span>
                    </a>
                    <div class="accordion-body collapse" id="accordion-item-4" data-bs-parent="#accordion">
                        <div class="accordion-inner">
                            <p>At ZenixMining, we prioritize the security of your investments. We employ advanced
                                encryption protocols, secure wallets, and multi-factor authentication to protect your
                                funds and personal information. Additionally, our mining operations are conducted in
                                secure facilities to ensure the safety of your investments.</p>
                        </div>
                    </div>
                </div><!-- .accordion-item -->
                <div class="accordion-item">
                    <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse"
                        data-bs-target="#accordion-item-5">
                        <h6 class="title">Can I withdraw my funds at any time?</h6>
                        <span class="accordion-icon"></span>
                    </a>
                    <div class="accordion-body collapse" id="accordion-item-5" data-bs-parent="#accordion">
                        <div class="accordion-inner">
                            <p>Yes, you can withdraw your funds at any time, subject to our withdrawal policies.
                                Depending on the withdrawal method you choose, processing times may vary. We recommend
                                checking our withdrawal guidelines for more detailed information.</p>
                        </div>
                    </div>
                </div><!-- .accordion-item -->
            </div><!-- accordion -->
        </div><!-- .col -->
    </div>
</div>
<?php
require_once "./includes/footer.php";
?>