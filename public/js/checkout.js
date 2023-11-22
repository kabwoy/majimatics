$(function(){
    const subtotal = $(".sub-total")
    const price = $(".price")
    $('.quantity').map((index , el)=>{
        subtotal[index].innerText = `Ksh ${+el.innerText * +price[index].innerText}`
    })
})
