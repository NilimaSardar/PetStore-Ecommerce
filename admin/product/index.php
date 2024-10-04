<div class="card">
    <div class="inner-card">
        <div class="card-header">
            <h3 class="card-title">List of Products</h3>
            <div class="card-tools">
                <a href="index.php?page=manage_product_list" class="btn"><i class="fa-solid fa-plus"></i>  Create New</a>
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
                        <col width="15%">
                        <col width="15%">
                        <col width="20%">
                        <col width="30%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>2024:05:12 12:09</td>
                                <td>Dog Food</td>
                                <td ><p class="truncate-1 m-0">healthy food</p></td>
                                <td class="text-center">
                                
                                        <!-- <span class="badge badge-success">Active</span> -->
                                
                                        <span class="badge badge-danger">Inactive</span>
                                
                                </td>
                                <td>
                                    <button type="button" class="btn  dropdown-icon" id="dropdownButton" data-toggle="dropdown">
                                            Action
                                            <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu" id="dropdownMenu" role="menu">
                                        <a class="dropdown-item" href="index.php?page=manage_product_list"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
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