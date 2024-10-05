<!-- cart section -->
    <section class="show-cart">
        <div class="container">
            <div class="row">
                <button class="btn " type="button" id="empty_cart">Empty Cart</button>
            </div>
        
                <div class="card-body">
                    <h3><b>Cart List</b></h3>
                    <hr class="border-dark">
    
                        <div class="cart-item">
                            <div class="align-items-center">
                                <span class="trash"><a href="#" class="btn"><i class="fa-solid fa-trash"></i></a></span>
                                <div class="image">
                                    <img src="uploads/cat4.jpg" class="cart-prod-img" alt="">
                                </div>
                                <div class="product-detail">
                                    <p class="description">Baby Cat</p>
                                    <p class="description"><small><b>Size:</b> small</small></p>
                                    <p class="description"><small><b>Price:</b> <span class="price">20,000</span></small></p>
    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn-inc" type="button" id="button-addon1"><i class="fa fa-minus"></i></button>
                                        </div>
                                        <input type="text" class="text-center" value="1" readonly>
                                        <div class="input-group-append">
                                            <button class="btn-inc" type="button" id="button-addon1"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="col text-right">
                                <h4><b class="total-amount">20,000</b></h4>
                            </div>
                        </div>
    
                        <div class="cart-item">
                            <div class="align-items-center">
                                <span class="trash"><a href="#" class="btn"><i class="fa-solid fa-trash"></i></a></span>
                                <div class="image">
                                    <img src="uploads/cat4.jpg" class="cart-prod-img" alt="">
                                </div>
                                <div class="product-detail">
                                    <p class="description">Baby Cat</p>
                                    <p class="description"><small><b>Size:</b> small</small></p>
                                    <p class="description"><small><b>Price:</b> <span class="price">20,000</span></small></p>
    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn-inc" type="button" id="button-addon1"><i class="fa fa-minus"></i></button>
                                        </div>
                                        <input type="text" class="text-center" value="1" readonly>
                                        <div class="input-group-append">
                                            <button class="btn-inc" type="button" id="button-addon1"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="col text-right">
                                <h4><b class="total-amount">20,000</b></h4>
                            </div>
                        </div>
                   
                    <div class="border-bottom">
                        <div class="total"><h4>Grand Total:</h4></div>
                        <div class="total-value"><h4 id="grand-total">78542</h4></div>
                    </div>
                </div>
         
            <div class="checkout">
                <a href="index.php?page=checkout" class="btn">Checkout</a>
            </div>
        </div>
    </section>