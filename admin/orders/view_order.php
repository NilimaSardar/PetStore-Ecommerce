<div class="card">
    <div class="inner-card">
        <div class="card-header">
            <div class="card-detail">
                <p class="card-title"><b>Client Name: Nilima Sardar</b></p>
                <p class="card-title"><b>Delivery Address: Biratnagar-12</b></p>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table">
                    <colgroup>
                        <col width="15%">
                        <col width="15%">
                        <col width="30%">
                        <col width="20%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>QTY</th>
                            <th>Unit</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>50</td>
                            <td>parrot</td>
                            <td class="text-right">30,000</td>
                            <td class="text-right">30,000</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan='4'  class="text-right">Total</th>
                            <th class="text-right">30,000</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Payment Method: cod</p>
                <p>Payment Status: 
                    <!-- <span class="badge badge-light">Unpaid</span> -->
                    
                    <span class="badge badge-success">Paid</span>
                </p>
            </div>
            <div class="col">
                <div class="col-2">
                    <div class="status">Order Status:</div>
                    <div class="status-show">
                        <div>
                            <!-- <span class="badge badge-light text-dark">Pending</span> -->
                            <!-- <span class="badge badge-primary">Packed</span> -->
                            <span class="badge badge-warning">Out for Delivery</span>
                            <!-- <span class="badge badge-success">Delivered</span> -->
                            <!-- <span class="badge badge-danger">Cancelled</span> -->
        
                        </div>
                        <div class="">
                            <button type="button" class="btn" onclick="showDialog()">Update Status</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary">Close</button>
</div>
