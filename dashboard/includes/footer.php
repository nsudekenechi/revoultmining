<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; <?= date('Y'); ?>
                Zenixmining. All rights reserved
            </div>

        </div>
    </div>
</div>
<!-- footer @e -->
</div>
<!-- wrap @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->

<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=3.1.3"></script>
<script src="./assets/js/scripts.js?ver=3.1.3"></script>
<script src="./assets/js/charts/chart-crypto.js?ver=3.1.3"></script>

<script>
    let amounts = document.querySelectorAll(".amount");
    let form = document.querySelector("form");
    amounts.forEach(amount => {
        if (!isNaN(amount.innerHTML)) {
            amount.innerHTML = new Intl.NumberFormat("en-gb", { currency: "GBP", style: "currency" }).format(amount.innerHTML)
        }
    });
    let isProcessing = false;
    if (form) {
        form.onsubmit = () => {
            let inputs = form.querySelectorAll("input[required]");
            let valid = true
            inputs.forEach(input => {
                if (input.value == "") {
                    valid = false;
                }
            })
            if (!isProcessing && valid) {
                isProcessing = true;
                let button = form.querySelector("button");
                button.innerHTML = ` <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>`;

            } else {
                return false;
            }
        }
    }
    const date = new Date().getHours()
    let greeting = "";
    let messages = [
        "Ready to take your investments to the next level today?",
        "Your investment journey continues here. Let's make the most of it!",
        "Every investment counts. Let's make today a productive one!"
    ]
    let welcomeMessage = document.querySelector("#welcome-message");
    if (date <= 11) {
        greeting = "Good morning";
    } else if (date <= 16) {
        greeting = "Good afternoon";
    } else {
        greeting = "Good Evening";
    }
    welcomeMessage.innerHTML = `<b>${greeting}</b>, <span>${messages[Math.floor(Math.random() * messages.length)]}</span>`
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
require_once "../handler/alert.php";
?>
</body>

</html>