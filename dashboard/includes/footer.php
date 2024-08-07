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

    // conversion of currencies
    let regionModal = document.querySelector("#country-list")
    fetch("./assets/country.json").then(res => res.json()).then(data => {
        let supported_currencies = Object.keys(data.rate.conversion_rates);
        supported_currencies.map(currency => {
            let country_flag = data.flags.find(flag => flag.code == currency);
            if (country_flag) {
                regionModal.innerHTML += ` <li class='mb-3'>
                <a " class="country-item" data-currency="${currency}">
                <img src="${country_flag.flag}" alt="" class="country-flag">
                <span class="country-name"> ${country_flag.name} (${country_flag.code})</span>
                </a>
                </li>`
                let countryItems = document.querySelectorAll(".country-item");
                countryItems.forEach(country => {
                    country.onclick = () => {
                        let rates = data.rate.conversion_rates[country.dataset.currency]
                        let amounts = document.querySelectorAll(".amount");
                        amounts.forEach(amount => {
                            let extractedNumber = amount.innerHTML.replace(/[^\d.]/g, '');
                            console.log(new Intl.NumberFormat("en-gb", { currency: country.dataset.currency, style: "currency" }).format(Number(extractedNumber) * rates))
                        })
                    }
                })
            }
        })
    })


</script>

<?php
require_once "../handler/alert.php";
?>
</body>

</html>