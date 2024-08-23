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
<style>
    .country-item {
        cursor: pointer;
    }
</style>
<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=3.1.3"></script>
<script src="./assets/js/scripts.js?ver=3.1.3"></script>
<script src="./assets/js/charts/chart-crypto.js?ver=3.1.3"></script>

<script>
    let amounts = document.querySelectorAll(".amount");
    let currencyCode = document.querySelectorAll(".currency");
    let currencySymbols = document.querySelectorAll(".currency-symbol");
    let inputAmounts = document.querySelectorAll("input[name='amount']")
    let form = document.querySelector("form");
    let rate = document.querySelector("input[name='rate']")


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
                regionModal.innerHTML += ` <li class='mb-3' data-bs-dismiss="modal">
                <a class="country-item" data-currency="${currency}">
                <img src="${country_flag.flag}" alt="" class="country-flag">
                <span class="country-name"> ${country_flag.name} (${country_flag.code})</span>
                </a>
                </li>`
                let countryItems = document.querySelectorAll(".country-item");

                countryItems.forEach(country => {
                    country.onclick = () => {
                        let baseCurrency = localStorage.getItem("selected_currency") ? JSON.parse(localStorage.getItem("selected_currency")).code : "GBP";
                        let targetCurrency = country.dataset.currency;
                        let symbol = data.symbols.find(item => item.code == targetCurrency).symbol;

                        convertRate(baseCurrency, targetCurrency, symbol)
                        // storing prev 
                        localStorage.setItem("selected_currency", JSON.stringify({ code: targetCurrency, symbol }));
                    }
                })
            }
        })
    })

    if (localStorage.getItem("selected_currency")) {
        let baseCurrency = "GBP";
        let targetCurrency = JSON.parse(localStorage.getItem("selected_currency"));
        convertRate(baseCurrency, targetCurrency.code, targetCurrency.symbol)
    } else {
        amounts.forEach(amount => {
            if (!isNaN(amount.innerHTML)) {
                amount.innerHTML = new Intl.NumberFormat("en-gb", { currency: "GBP", style: "currency" }).format(amount.innerHTML)
            }
        });
        currencySymbols.forEach(symbol => {
            symbol.innerHTML = "£"
        })
    }


    function convertRate(baseCurrency, targetCurrency, symbol) {
        amounts.forEach((amount, index) => {
            let extractedAmount = amount.innerHTML.replace(/[^\d.]/g, '');

            fetch(`https://v6.exchangerate-api.com/v6/a2c042298ab01a5102a1523d/pair/${baseCurrency}/${targetCurrency}/${extractedAmount}`).then(res => res.json()).then(data => {
                amount.innerHTML = `${symbol}${new Intl.NumberFormat("en-gb", { style: "decimal", minimumFractionDigits: 2 }).format(data.conversion_result)}`
                currencyCode.forEach(code => {
                    code.innerHTML = targetCurrency;
                })



                currencySymbols.forEach(currencySymbol => {
                    currencySymbol.innerHTML = symbol
                })

                if (index == 0) {
                    if (rate) {
                        rate.value = data.conversion_rate
                    }
                    inputAmounts.forEach(inputAmount => {
                        if (inputAmount.min) {
                            inputAmount.min = parseInt(Number(inputAmount.min) * data.conversion_rate);

                        }
                        if (inputAmount.max) {
                            inputAmount.max = parseInt(Number(inputAmount.max) * data.conversion_rate);
                        }
                    })
                }
            })


        })


    }

</script>

<?php
require_once "../handler/alert.php";
?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/66c921c2ea492f34bc098673/1i60qnnvr';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>

</html>