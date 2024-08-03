<!-- nk-split-content -->
</div><!-- .nk-block -->

</div>

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