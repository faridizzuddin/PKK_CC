<div class="card">
    <div class="card-body">
        <div class="col">
            <h2 class="mb-4">Senarai Cenderamata Yang Ditawarkan</h2>
            <form action="<?= module_url('permohonan/add_cenderamata') ?>" method="post">
                <div class="row">
                    <?php foreach ($data_cend as $i => $list) { ?>
                        <div class="col-md-4 mb-4 product-card" data-id="<?= $list->T04_ID ?>"
                            data-name="<?= $list->T04_CNAMA ?>" data-price="<?= $list->T04_CHARGA ?>">
                            <div class="card border-0 rounded-4 shadow-lg custom-product-card">
                                <div class="position-relative">
                                    <span class="badge bg-danger position-absolute top-0 end-0 m-2">New Arrival</span>
                                    <div class="overflow-hidden">
                                        <img src="<?= base_url('upload/cenderamata/' . $list->T04_GAMBAR) ?>"
                                            class="card-img-top custom-product-image" alt="Product Image">
                                    </div>
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <h5 class="card-title mb-2 fw-bold text-center"><?= $list->T04_CNAMA ?></h5>
                                    <p class="card-text text-muted mb-3 text-center">
                                        Experience crystal clear sound with our latest noise-cancelling technology and
                                        premium
                                        build quality.
                                    </p>
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <span class="fw-semibold">RM <?= number_format($list->T04_CHARGA, 2) ?></span>
                                    </div>

                                    <!-- Form inputs for this product -->
                                    <input type="hidden" name="products[<?= $i ?>][id]" value="<?= $list->T04_ID ?>">
                                    <input type="hidden" name="products[<?= $i ?>][name]" value="<?= $list->T04_CNAMA ?>">
                                    <input type="hidden" name="products[<?= $i ?>][price]" value="<?= $list->T04_CHARGA ?>">

                                    <div class="d-flex justify-content-center align-items-center mt-3">
                                        <div class="input-group input-group-sm counter-container">
                                            <button class="btn btn-outline-secondary btn-minus" type="button">-</button>
                                            <input type="number" name="products[<?= $i ?>][qty]"
                                                class="form-control text-center quantity-input" min="0" value="0">
                                            <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- Add to Cart Button outside of cards -->
                <div class="text-center mt-4" id="add-to-cart-button-container">
                    <button type="submit" class="btn btn-primary px-4 py-2 rounded">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    // // Track selected items and show the 'Add to Cart' button
    // let selectedItems = [];

    // document.querySelectorAll('.product-card').forEach(card => {
    //     card.addEventListener('click', function () {
    //         const productId = card.getAttribute('data-id');

    //         // Check if the item is already selected
    //         if (selectedItems.includes(productId)) {
    //             // If selected, remove it
    //             selectedItems = selectedItems.filter(id => id !== productId);
    //         } else {
    //             // If not selected, add it to the array
    //             selectedItems.push(productId);
    //         }

    //         // Toggle the visibility of the "Add to Cart" button based on selected items
    //         const addToCartButtonContainer = document.getElementById('add-to-cart-button-container');
    //         if (selectedItems.length > 0) {
    //             addToCartButtonContainer.style.display = 'block';
    //         } else {
    //             addToCartButtonContainer.style.display = 'none';
    //         }
    //     });
    // });

    // Increase quantity
    document.querySelectorAll('.btn-plus').forEach(button => {
        button.addEventListener('click', () => {
            let input = button.closest('.input-group').querySelector('.quantity-input');
            input.value = parseInt(input.value) + 1;
        });
    });

    // Decrease quantity
    document.querySelectorAll('.btn-minus').forEach(button => {
        button.addEventListener('click', () => {
            let input = button.closest('.input-group').querySelector('.quantity-input');
            if (parseInt(input.value) > 0) input.value = parseInt(input.value) - 1;
        });
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

    /* Center the counter in the card */
    .counter-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 140px;
    }

    .custom-product-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .custom-product-image {
        height: 250px;
        object-fit: cover;
    }
</style>