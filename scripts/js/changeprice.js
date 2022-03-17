function changePrice() {

    if (localStorage.hasOwnProperty("products")) {
        let storeData2 = Object.keys(JSON.parse(localStorage.getItem('products'))).length
        let getcity = document.querySelector('#city').value
        // console.log(getcity)
        if (storeData2 > 0) {
            function formatMe(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            let myData = JSON.parse(localStorage.getItem('products'));
            let items = Object.values(myData);


            let total = 0
            for (let i of items) {
                total += parseInt(i.price);
            }

            total2 = total + parseInt(getcity)
            document.querySelector('#goship').textContent = formatMe(getcity)
            document.querySelector('#subTotal').textContent = formatMe(total)
            document.querySelector('#totalAmount').textContent = formatMe(total2)
        }
    }

}