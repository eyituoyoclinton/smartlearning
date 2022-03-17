$(document).ready(function () {
    const unitPrice = document.getElementById('total-price').textContent
    // console.log(unitPrice)
    const unitKg = document.getElementById('dkg').textContent

    $('#unit-number').on('input', (e) => {
        e.preventDefault()
        const uNumber = e.target.value
        // console.log(uNumber)
        let nPrice = uNumber * unitPrice.replace(/,/g, '').trim()
        let nePrice = (nPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        //showing the customers payment fot the units bought
        document.getElementById('amountToPay').textContent = nePrice
        neKg = unitKg * uNumber
        // console.log(neKg)
        document.getElementById('buyKg').textContent = neKg

    })
})