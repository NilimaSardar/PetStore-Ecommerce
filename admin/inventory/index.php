
<div class="card">
    <div class="inner-card">
        <div class="card-header">
            <h3 class="card-title">List of Inventory</h3>
            <div class="card-tools">
                <a href="index.php?page=manage_inventory_list" class="btn"><i class="fa-solid fa-plus"></i>  Create New</a>
            </div>
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
                        <col width="25%">
                        <col width="10%">
                        <col width="10%">
                        <col width="20%">
                        <col width="20%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Unit</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>parrot</td>
                                <td>pcs</td>
                                <td>NONE</td>
                                <td class="text-right">300,000</td>
                                <td class="text-right">15</td>
                                <td>
                                    <button type="button" class="btn  dropdown-icon dropdown-toggle" id="dropdownButton" data-toggle="dropdown">
                                            Action
                                            <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu" id="dropdownMenu" role="menu">
                                        <a class="dropdown-item" href="index.php?page=manage_inventory_list"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
