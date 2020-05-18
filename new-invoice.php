<?php include "template/header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-12 py-5">

                <h1 class="h4 mb-5">Invoice Number #123123</h1>

                <div class="form p-3 border border-primary rounded">
                    <form action="add-data.php" method="post">

                        <div class="form-row d-flex align-items-center h-100">

                            <div class="form-group col-md-4">
                                <input required type="text" name="invoiceName" placeholder="Invoice Name" class="form-control" required>
                            </div>
                            <div class="form-group col-12">

                                <table class="table table-hover table-bordered invoice">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="sub-total">
                                            <td colspan="4" class="text-right font-weight-bold">Sub Total</td>
                                            <td colspan="1" class="text-left subTotal"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right font-weight-bold">Tax (5%)</td>
                                            <td colspan="1" class="text-left tax"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right font-weight-bold">Total</td>
                                            <td colspan="1" class="text-left total"></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <input type="hidden" name="idArr" id="idArr">
                            <div class="form-group col-12 d-flex justify-content-between">
                                <div>
                                    <button type="button" class="btn btn-primary" onclick="addList()">
                                        Add Item
                                    </button>
                                    <button type="button" class="btn btn-outline-primary finish">Finish</button>
                                </div>
                                <button type="submit" name="add" value="add" class="btn btn-success check-out" disabled>
                                    Check Out
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

<?php include "template/footer.php"; ?>

<script>

    let x = 0;

function list(x) {

    return '<tr class="row-list row-'+x+'" data-id="'+x+'" onchange="row('+x+')">\n' +
        '<td>\n' +
        '    <button type="button" class="btn btn-danger" onclick="del('+x+')" data-id="'+x+'" >Delete</button>\n' +
        '</td>\n' +
        '<td>\n' +
        '    <input required type="text" name="itemName-'+x+'" class="form-control it-'+x+'">\n' +
        '</td>\n' +
        '<td class="q-w">\n' +
        '    <input required type="number" name="quantity-'+x+'" class="form-control qt-'+x+'">\n' +
        '\n' +
        '</td>\n' +
        '<td class="p-w">\n' +
        '    <input required type="number" name="unitPrice-'+x+'" class="form-control up-'+x+'">\n' +
        '\n' +
        '</td>\n' +
        '<td class="c-w ct-'+x+'">\n' +
        '\n' +
        '</td>\n' +
        '\n' +
        '</tr>';

    }


    function addList() {
        x++;
        $(".sub-total").before(list(x));

    }

    addList(0);



    function subTotal() {
        let total = [];
        let idArr = [];

        $( ".c-w" ).each(function( index ) {
            total.push($( this ).text());
        });

        $(".row-list").each(function () {
           idArr.push($(this).attr("data-id"));
        });

        console.log(total);

        let subtotal = eval(total.join("+"));
        let tax = (subtotal/100)*5;
        let allTotal = subtotal+tax;
        $("#idArr").val(idArr);
        $(".subTotal").html(subtotal);
        $(".tax").html(tax);
        $(".total").html(allTotal);
    }
    
    function row(x) {

        let qt = $(".qt-"+x).val();
        let up = $(".up-"+x).val();

        if(qt>=0 && up>=0){
            $(".ct-"+x).html(qt*up);
            subTotal();
        }
    }

    function del(x) {
        $(".row-"+x).remove();
        subTotal();
    }

    $('.finish').click(function () {
        $(".check-out").removeAttr("disabled");
    });

</script>
