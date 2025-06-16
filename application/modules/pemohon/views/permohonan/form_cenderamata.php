<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <?php foreach ($data_cend as $list) { ?>
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 shadow-lg custom-product-card">
                            <div class="position-relative">
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">New Arrival</span>
                                <div class="overflow-hidden">
                                    <img src="<?= base_url('upload/cenderamata/' . $list->T04_GAMBAR) ?>"
                                        class="card-img-top custom-product-image" alt="Product Image">
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <h5 class="card-title mb-2 fw-bold"><?= $list->T04_CNAMA ?></h5>
                                <p class="card-text text-muted mb-3">Experience crystal clear sound with our latest
                                    noise-cancelling technology and premium build quality.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold">RM <?= number_format($list->T04_CHARGA, 2) ?></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="input-group input-group-sm" style="width: 140px;">
                                        <button class="btn btn-outline-secondary btn-minus" type="button">-</button>
                                        <input type="number" class="form-control text-center quantity-input" min="1"
                                            value="1">
                                        <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                    </div>
                                    <button class="btn btn-gradient text-white btn-sm rounded-pill btn-add-to-cart">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="fw-bold">Cart Summary</h5>
                    <div class="cart-container p-3 rounded-3 shadow-sm">
                        <ul id="cart-summary" class="list-group mb-2"></ul>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Total:</span>
                            <span id="cart-total" class="fw-semibold text-success">RM 0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cart = [];

        // Handle minus button click
        document.querySelectorAll('.btn-minus').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.nextElementSibling;
                const value = parseInt(input.value);
                if (value > 1) input.value = value - 1;
            });
        });

        // Handle plus button click
        document.querySelectorAll('.btn-plus').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.previousElementSibling;
                input.value = parseInt(input.value) + 1;
            });
        });

        // Handle add to cart button click
        document.querySelectorAll('.btn-add-to-cart').forEach(button => {
            button.addEventListener('click', function () {
                const card = this.closest('.card');
                const name = card.querySelector('.card-title').textContent.trim();
                const price = parseFloat(card.querySelector('.fw-semibold').textContent.replace('RM', '').trim());
                const quantity = parseInt(card.querySelector('.quantity-input').value);

                const existing = cart.find(item => item.name === name);
                if (existing) {
                    existing.quantity += quantity;
                } else {
                    cart.push({ name, price, quantity });
                }

                updateCartDisplay();
            });
        });

        // Function to update cart display
        function updateCartDisplay() {
            const cartList = document.getElementById('cart-summary');
            const cartTotal = document.getElementById('cart-total');
            cartList.innerHTML = '';
            let total = 0;

            cart.forEach((item, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center border-bottom';
                li.innerHTML = `
                    <div class="d-flex justify-content-between w-100">
                        <span>${item.name} x ${item.quantity}</span>
                        <span class="badge bg-primary rounded-pill">RM ${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                `;

                // Create remove button
                const removeButton = document.createElement('button');
                removeButton.className = 'btn btn-danger btn-sm ms-3 custom-remove-btn';
                removeButton.textContent = 'Remove';
                removeButton.addEventListener('click', function () {
                    // Remove item from the cart
                    cart.splice(index, 1);
                    updateCartDisplay();
                });

                li.appendChild(removeButton); // Add remove button to the list item
                cartList.appendChild(li);

                total += item.price * item.quantity;
            });

            cartTotal.textContent = `RM ${total.toFixed(2)}`;
        }
    });
</script>

<style>
    /* Enhanced Styling for Product Cards */
    .custom-product-card {
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .custom-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .custom-product-image {
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .custom-product-card:hover .custom-product-image {
        transform: scale(1.05);
    }

    /* Gradient button for 'Add to Cart' */
    .btn-gradient {
        background: linear-gradient(45deg, #3498db, #2ecc71);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Cart Container */
    .cart-container {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        border: 1px solid #ddd;
    }

    /* Remove button styling */
    .custom-remove-btn {
        background-color: #e74c3c;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }

    .custom-remove-btn:hover {
        background-color: #c0392b;
        transform: scale(1.1);
    }

    /* Cart Items List */
    #cart-summary {
        max-height: 300px;
        overflow-y: auto;
    }

    .fw-semibold {
        font-weight: 600;
    }

    /* Enhanced Cart Total */
    #cart-total {
        font-size: 1.2rem;
        font-weight: 700;
        color: #27ae60;
    }

    /* Cart Summary Header */
    .cart-summary-header {
        margin-bottom: 20px;
    }
</style>