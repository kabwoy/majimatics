$(document).ready(function(e){
    $("#floating_name").keyup(function(e){
       $('.err-msg-name').hide()

       if(e.target.value === ""){
        $('.err-msg-name').show()
       }
    })

    $("#floating_price").keyup(function(e){
        $('.err-msg-price').hide()
 
        if(e.target.value === ""){
         $('.err-msg-price').show()
        }
     })

     $("#quantity").change(function(e){
        $('.err-msg-quantity').hide()
 
        if(e.target.value === ""){
         $('.err-msg-quantity').show()
        }
     })

     $("#image").keyup(function(e){
        $('.err-msg-image').hide()
 
        if(e.target.value === ""){
         $('.err-msg-image').show()
        }
     })
})