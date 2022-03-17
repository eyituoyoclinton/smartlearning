
    const unitPrice = document.getElementById('unit-price').textContent
    const unitNumber = document.getElementById('unit-number').value
    const percent = document.getElementById('roi').textContent
    const availableUnit = document.getElementById('availUnit').textContent
    
$('#unit-number').on('input', (e)=>{
    e.preventDefault()
    const uNumber = e.target.value
    console.log(availableUnit)
    console.log(uNumber)
    if(parseInt(availableUnit) < uNumber){
        alert('You have exceeded the available units for this farm');
        document.getElementById('unit-number').value = availableUnit
    }
    const nPrice = uNumber * unitPrice.replace(/,/g, '').trim()
    const nePrice = (nPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    //calculating the percentage
    const percentage = (percent/100)*nPrice
    //adding the percentage and money of the customer
    const adding = (nPrice + percentage).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    //showing the customer final payment plus percentage return
    document.getElementById('payout').textContent = adding
    //showing the customers payment fot the units bought
    document.getElementById('total-price').textContent = nePrice
})