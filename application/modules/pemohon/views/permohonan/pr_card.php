<?php
$cart_items = $this->session->userdata('cart_items');
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="mb-4">Your Shopping Cart</h2>
            <?php if (!empty($cart_items)): ?>
                <form method="post" action="<?php echo module_url('permohonan/update_cart'); ?>">
                    <div class="table-responsive">
                        <table class="table table-hover border text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <!-- <th>Item ID</th> -->
                                    <th>Name</th>
                                    <th>Price (RM)</th>
                                    <th>Quantity</th>
                                    <th>Subtotal (RM)</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php foreach ($cart_items as $item_id => $item): ?>
                                    <?php $subtotal = $item['price'] * $item['qty']; ?>
                                    <tr>
                                        <!-- <td><?php echo $item['id']; ?></td> -->
                                        <td><?php echo $item['name']; ?></td>
                                        <td class="text-right"><?php echo number_format($item['price'], 2); ?></td>
                                        <td class="text-center">
                                            <div class="input-group" style="max-width: 120px; margin: 0 auto;">
                                                <input type="hidden" name="<?php echo $item_id; ?>[rowid]"
                                                    value="<?php echo $item_id; ?>">
                                                <input type="number" class="form-control" name="<?php echo $item_id; ?>[qty]"
                                                    value="<?php echo $item['qty']; ?>" min="0">
                                            </div>
                                        </td>
                                        <td class="text-right"><?php echo number_format($subtotal, 2); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm remove-item"
                                                data-item-id="<?php echo $item_id; ?>">
                                                <i class="fas fa-trash-alt"></i> Remove
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $total += $subtotal; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                    <td class="text-right"><strong>RM <?php echo number_format($total, 2); ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="<?php echo module_url('permohonan/form_cenderamata1'); ?>"
                            class="btn btn-secondary">Continue
                            Shopping</a>
                        <div>
                            <button type="submit" class="btn btn-primary">Update
                                Cart</button>
                            <a href="<?php echo module_url('permohonan/mohon_cenderamata'); ?>"
                                class="btn btn-success">Checkout</a>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i> Your cart is empty.
                </div>
                <a href="<?php echo module_url('permohonan/form_cenderamata1'); ?>" class="btn btn-secondary">Continue
                    Shopping</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.remove-item').click(function () {
            var itemId = $(this).data('item-id');
            // Use AJAX to call a function in your controller to remove the item from the session
            $.ajax({
                url: '<?php echo module_url('permohonan/remove_item'); ?>', // Replace with the actual URL for removing an item
                type: 'POST',
                data: { item_id: itemId },
                success: function (response) {
                    // Handle the response from the server (e.g., update the cart display)
                    if (response === 'success') {
                        // Reload the page or update the cart table dynamically
                        window.location.reload(); // Simplest way: reload the page
                    } else {
                        alert('Error removing item.'); // Basic error handling
                    }
                },
                error: function () {
                    alert('Failed to remove item.'); // Handle AJAX errors
                }
            });
        });
    });
</script>