$(document).ready(function () {
    function formatMe(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    const unitPrice = document.getElementById('total-price').textContent
    // const unitKg = document.getElementById('dkg').textContent

    $('#unit-number').on('input', (e) => {
        e.preventDefault()
        let uNumber = e.target.value
        let nPrice = uNumber * unitPrice.replace(/,/g, '').trim()
        let nePrice = formatMe(nPrice);
        //showing the customers payment fot the units bought
        document.getElementById('total-price').textContent = nePrice
        neKg = unitKg * uNumber
        // document.getElementById('dkg').textContent = neKg

    })

    let subtotal = document.querySelector('#subTotal')
    let total = document.querySelector('#totalAmount')

    $('body').on('change', '.unit-number', (e) => {
        let unitPrice = e.currentTarget.getAttribute('data-price')
        let unitKg = e.currentTarget.getAttribute('data-kg')
        let dataTitle = e.currentTarget.getAttribute('data-title')
        let quantity = e.currentTarget.value
        let totalKg = quantity * unitKg
        let totalPrice = unitPrice * quantity
        let getTitle = null
        let allData = JSON.parse(localStorage.getItem('products'))
        let myData = Object.values(allData)
        let pos = myData.findIndex(e => e.slug === dataTitle)
        if (pos > -1) {
            let actualProduct = myData[pos]
            getTitle = actualProduct.title
            actualProduct.kg = totalKg
            actualProduct.price = totalPrice
            actualProduct.unit = quantity
            allData[getTitle] = actualProduct
            localStorage.setItem('products', JSON.stringify(allData))
            $(`#total_${dataTitle}`).text(formatMe(totalPrice))
            $(`#totalkg_${dataTitle}`).text(totalKg)

            let getbacktotal = 0
            let getBackData = Object.values(allData);
            for (let i of getBackData) {
                getbacktotal += parseInt(i.price);
            }
            subtotal.textContent = formatMe(getbacktotal)
            total.textContent = formatMe(getbacktotal)

        }
    })

    $('body').on('click', '.deleteMe', (e) => {
        e.currentTarget.parentElement.parentElement.remove()
        let dataTitle = e.currentTarget.getAttribute('data-delete')
        let allData = JSON.parse(localStorage.getItem('products'))
        let myData = Object.values(allData)
        let productTitle = myData[myData.findIndex(e => e.slug === dataTitle)].title
        // console.log(e.slug)
        // console.log(productTitle)
        // console.log(dataTitle)
        // console.log(allData)

        delete allData[productTitle]
        localStorage.setItem('products', JSON.stringify(allData))

        let getbacktotal = 0
        let getBackData = Object.values(allData);
        for (let i of getBackData) {
            getbacktotal += parseInt(i.price);
        }
        subtotal.textContent = formatMe(getbacktotal)
        total.textContent = formatMe(getbacktotal)
    })

})