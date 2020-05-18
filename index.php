<?php include "template/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 py-5">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center px-4">
                    <h4 class="text-uppercase font-weight-bold mb-0">POS Sample</h4>
                    <a class="btn btn-primary" href="new-invoice.php">Add Invoice</a>
                </div>
                <div class="card-content p-2">
                    <table class="table table-bordered table-striped table-hover data">
                        <thead>
                        <tr>
                            <td>No</td>
                            <td>Item Name</td>
                            <td>Quantity</td>
                            <td>Unit Price</td>
                            <td>Cost</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (getData(1) as $d){ ?>
                            <tr>
                                <td><?php echo $d["id"]; ?></td>
                                <td><?php echo $d["itemName"]; ?></td>
                                <td><?php echo $d["quantity"]; ?></td>
                                <td><?php echo $d["unitPrice"]; ?> MMK</td>
                                <td><?php echo $d["unitPrice"]*$d["quantity"]; ?> MMK</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>

<script>
    $(".data").dataTable();
</script>



