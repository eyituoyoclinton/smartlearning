$(document).ready(function () {
    if (localStorage.hasOwnProperty("products")) {
        let storeData2 = Object.keys(JSON.parse(localStorage.getItem('products'))).length
        if (storeData2 > 0) {
            // var formatter = new Intl.NumberFormat('en-US', {
            //     style: 'currency',
            //     currency: 'NGR'
            //   });
            function formatMe(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            let myData = JSON.parse(localStorage.getItem('products'));
            let items = Object.values(myData);
            // console.log(items)
            let getTable = document.querySelector('#cart-products')
            let htmlContent = null
            for (let e of items) {
                htmlContent = `<tr>
            <td><i class="fa fa-times deleteMe" data-delete=${e.slug}></i></td>
            <td>
                <div class="des-pro">
                    <h4>${e.title}</h4>
                </div>
            </td>
            <td>₦<span>${formatMe(e.unitPrice)}</span></td>
            <td>
                <div class="order-pro order1">
                    <input class="unit-number" data-title=${e.slug} data-price=${e.unitPrice} data-kg=${e.unitKg} type="number" min="1" value="${e.unit}" max="${e.totalUnit}" />
                </div>
            </td>
            <td class="single-price prize">₦<span id=total_${e.slug}>${formatMe(e.price)}</span><span style="visibility:hidden" id=totalkg_${e.slug}>${e.kg}</span></td>  
        </tr>`;
                getTable.insertAdjacentHTML('beforeend', htmlContent)
            }
            let total = 0
            for (let i of items) {
                total += parseInt(i.price);
            }
            document.querySelector('#subTotal').textContent = formatMe(total)
            document.querySelector('#totalAmount').textContent = formatMe(total)
        }
    } else {
        document.querySelector('#cart-products').innerHTML = 'Cart is empty';
        document.querySelector('#hideEmpty').style.display = "none";
    }


})