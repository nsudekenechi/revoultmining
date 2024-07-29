<!-- nk-split-content -->
</div><!-- .nk-block -->

</div>
<div style=""
    class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
    data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
    <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
        <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
            <div class="slider-item">
                <div class="nk-feature nk-feature-center">
                    <div class="nk-feature-img">
                        <img class="round" src="./images/slides/promo-a.png" srcset="./images/slides/promo-a2x.png 2x"
                            alt="">
                    </div>
                    <div class="nk-feature-content py-4 p-sm-5">
                        <h4>dashlite</h4>
                        <p>You can start to create your products easily with its user-friendly
                            design & most completed responsive layout.</p>
                    </div>
                </div>
            </div><!-- .slider-item -->
            <div class="slider-item">
                <div class="nk-feature nk-feature-center">
                    <div class="nk-feature-img">
                        <img class="round" src="./images/slides/promo-b.png" srcset="./images/slides/promo-b2x.png 2x"
                            alt="">
                    </div>
                    <div class="nk-feature-content py-4 p-sm-5">
                        <h4>dashlite</h4>
                        <p>You can start to create your products easily with its user-friendly
                            design & most completed responsive layout.</p>
                    </div>
                </div>
            </div><!-- .slider-item -->
            <div class="slider-item">
                <div class="nk-feature nk-feature-center">
                    <div class="nk-feature-img">
                        <img class="round" src="./images/slides/promo-c.png" srcset="./images/slides/promo-c2x.png 2x"
                            alt="">
                    </div>
                    <div class="nk-feature-content py-4 p-sm-5">
                        <h4>dashlite</h4>
                        <p>You can start to create your products easily with its user-friendly
                            design & most completed responsive layout.</p>
                    </div>
                </div>
            </div><!-- .slider-item -->
        </div><!-- .slider-init -->
        <div class="slider-dots"></div>
        <div class="slider-arrows"></div>
    </div><!-- .slider-wrap -->
</div><!-- nk-split-content -->
</div><!-- nk-split -->
</div>
<!-- wrap @e -->
</div>
<!-- content @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=3.1.3"></script>
<script src="./assets/js/scripts.js?ver=3.1.3"></script>

<script>
    let text = ["withdrew", "deposited"];
    fetch("./assets/country.json").then(res => res.json()).then(data => {
        setInterval(() => {
            NioApp.Toast(`Someone from <b>${data.country[Math.floor(Math.random() * data.country.length)]} </b> just 
        ${text[Math.floor(Math.random() * text.length)]} 
      <b>${new Intl.NumberFormat("en-gb", { currency: "GBP", style: "currency" }).format(Math.floor(Math.random() * 100000))}</b>
        `, 'info', { icon: false });
        }, 10000)
    })
</script>

<?php
require "../handler/alert.php";
?>

</html>