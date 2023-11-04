$(function () {
    let sum = 0;
    const price = $(".price");
    const subTotal = $("#subTotal");
    price.map((el) => {
        const amount = +price[el].textContent.split("ksh")[1];
        const total = +price[el].dataset.quantity * amount;
        sum = sum + total;
    });

    subTotal.text(`Ksh ${sum}`);
    $("#total").text(`Ksh ${sum + 3000}`);
    const isLoading = false;
    const incButtons = $(".increment");
    const decButtons = $(".decrement");
    const qtyInputs = $(".qtyInput");
    const overlay = $(".overlay");

    [...qtyInputs].forEach(function(el){
        el.min = "1"
    });

    [...incButtons].forEach(function (btn, index) {
        btn.onclick = function (e) {
            qtyInputs[index].value = +qtyInputs[index].value + 1;

            const id = btn.dataset.id;
            overlay.show();
            $.ajax({
                url: `http://localhost:8000/api/cart_items/${id}`,
                type: "PATCH",
                data: JSON.stringify({ operation: "INC" }),
                success: function (data) {
                    overlay.hide();
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    overlay.hide();
                },
            });
        };
    });

    [...decButtons].forEach(function (btn, index) {
        btn.onclick = function (e) {
            qtyInputs[index].value = +qtyInputs[index].value - 1;

            const id = btn.dataset.id;
            overlay.show();
            $.ajax({
                url: `http://localhost:8000/api/cart_items/${id}/decrement`,
                type: "PATCH",
                success: function (data) {
                    overlay.hide();
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    overlay.hide();
                },
            });
        };
    });

    //console.log($('.qtyInput'))
});
