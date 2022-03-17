$(document).ready(function () {
    if (localStorage.hasOwnProperty("products")) {
        let storeData2 = Object.keys(JSON.parse(localStorage.getItem('products'))).length
        // console.log(getcity)
        if (storeData2 > 0) {
            function formatMe(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            let myData = JSON.parse(localStorage.getItem('products'));
            let items = Object.values(myData);
            // console.log(items)
            let getTable = document.querySelector('#checkout-Table')
            let htmlContent = null
            for (let e of items) {
                htmlContent = `<tr>
            <td class="no-border">${e.title}</td>
            <td class="no-border">₦${formatMe(e.price)}</td>
        </tr>`;
                getTable.insertAdjacentHTML('beforeend', htmlContent)
            }
            let total = 0
            for (let i of items) {
                total += parseInt(i.price);
            }

            total2 = total
            document.querySelector('#subTotal').textContent = formatMe(total)
            document.querySelector('#totalAmount').textContent = formatMe(total2)
        }
    }

})