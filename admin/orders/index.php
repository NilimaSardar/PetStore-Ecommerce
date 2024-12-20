<div class="card">
    <div class="inner-card">
        <div class="card-header">
            <h3 class="card-title">List of Orders</h3>
        </div>
        <div class="searching">
            <p class="card-title">Search: </p>
            <input type="search" name="search">
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table">
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="25%">
                        <col width="20%">
                        <col width="10%">
                        <col width="15%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Order</th>
                            <th>Client</th>
                            <th>Total Amount</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>2024:05:12 12:09</td>
                                <td>Nilima Sardar</td>
                                <td class="text-right">30,000</td>
                                <td class="text-center">
                                        <!-- <span class="badge badge-light">No</span> -->
                                
                                        <span class="badge badge-success">Yes</span>
                                
                                </td>
                                <td class="text-center">
                                    <!-- <?php //if($row['status'] == 0): ?> -->
                                        <!-- <span class="badge badge-light">Pending</span> -->
                                    <!-- <?php // elseif($row['status'] == 1): ?> -->
                                        <!-- <span class="badge badge-primary">Packed</span> -->
                                    <!-- <?php //elseif($row['status'] == 2): ?> -->
                                        <span class="badge badge-warning">Out for Delivery</span>
                                    <!-- <?php //elseif($row['status'] == 3): ?> -->
                                        <!-- <span class="badge badge-success">Delivered</span> -->
                                    <!-- <?php// else: ?> -->
                                        <!-- <span class="badge badge-danger">Cancelled</span> -->
                                    <!-- <?php// endif; ?> -->
                                </td>
                                <td>
                                    <button type="button" class="btn  dropdown-icon dropdown-toggle" id="dropdownButton" data-toggle="dropdown">
                                            Action
                                            <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu" id="dropdownMenu" role="menu">
                                        <a class="dropdown-item" href="index.php?page=view_order_list">View Order</a>
                                        <hr>
                                        <a class="dropdown-item delete_data" href="#" data-id=""><i class="fa-solid fa-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>