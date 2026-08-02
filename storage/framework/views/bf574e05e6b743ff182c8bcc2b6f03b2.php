 
<?php $__env->startSection('title','Shop All Products'); ?>

<?php $__env->startPush('css'); ?>
<style>
    .shop-product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 22px;
        width: 100%;
    }
    .shop-product-card {
        background: #ffffff;
        border: 1px solid #eef0f3;
        border-radius: 8px;
        padding: 16px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 100%;
        box-sizing: border-box;
        transition: all 0.25s ease;
    }
    .shop-product-card:hover {
        border-color: #1e73be;
        box-shadow: 0 10px 25px rgba(30, 115, 190, 0.12);
        transform: translateY(-4px);
    }
    .shop-badge-discount {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #ff3b30;
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 8px;
        border-radius: 20px;
        z-index: 2;
        box-shadow: 0 2px 6px rgba(255, 59, 48, 0.3);
    }
    .shop-img-box {
        width: 100%;
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 12px;
    }
    .shop-img-box img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    .shop-product-card:hover .shop-img-box img {
        transform: scale(1.05);
    }
    .shop-title-link {
        color: #2c3e50;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 40px;
        margin-bottom: 8px;
        transition: color 0.2s;
    }
    .shop-title-link:hover {
        color: #1e73be;
    }
    .shop-btn-cart {
        width: 100% !important;
        background: #1e73be;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 12.5px;
        text-transform: uppercase;
        padding: 10px 12px;
        border-radius: 6px;
        border: none;
        letter-spacing: 0.5px;
        white-space: nowrap;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .shop-btn-cart:hover {
        background: #155a96;
        box-shadow: 0 4px 12px rgba(30, 115, 190, 0.3);
        color: #ffffff !important;
    }
</style>
<?php $__env->stopPush(); ?> 

<?php $__env->startSection('content'); ?>
<section class="product-section" style="padding: 35px 0; background: #f8fafc;">
    <div class="container">
        
        <!-- Filter & Header Bar -->
        <div class="sorting-section mb-4" style="background: #ffffff; padding: 16px 22px; border-radius: 8px; border: 1px solid #eef0f3; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
            <div class="row align-items-center">
                <div class="col-md-6 mb-2 mb-md-0">
                    <div class="category-breadcrumb d-flex align-items-center" style="font-size: 14px; gap: 8px; color: #64748b;">
                        <a href="<?php echo e(route('home')); ?>" style="color: #64748b; text-decoration: none; font-weight: 500;">Home</a>
                        <i class="fa-solid fa-chevron-right" style="font-size: 10px; color: #94a3b8;"></i>
                        <strong style="color: #0f172a; font-weight: 700;">Shop All Products</strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-md-end gap-3">
                        <span style="font-size: 13.5px; color: #64748b; white-space: nowrap;">
                            Showing <strong style="color: #0f172a;"><?php echo e($products->firstItem() ?? 0); ?>-<?php echo e($products->lastItem() ?? 0); ?></strong> of <strong style="color: #0f172a;"><?php echo e($products->total()); ?></strong> Results
                        </span>
                        <div style="min-width: 170px;">
                            <form action="" class="sort-form">
                                <select name="sort" class="form-select sort" style="font-size: 13px; border-radius: 6px; border-color: #cbd5e1; cursor: pointer;">
                                    <option value="1" <?php if(request()->get('sort')==1): ?>selected <?php endif; ?>>Product: Latest</option>
                                    <option value="2" <?php if(request()->get('sort')==2): ?>selected <?php endif; ?>>Product: Oldest</option>
                                    <option value="3" <?php if(request()->get('sort')==3): ?>selected <?php endif; ?>>Price: High To Low</option>
                                    <option value="4" <?php if(request()->get('sort')==4): ?>selected <?php endif; ?>>Price: Low To High</option>
                                    <option value="5" <?php if(request()->get('sort')==5): ?>selected <?php endif; ?>>Name: A-Z</option>
                                    <option value="6" <?php if(request()->get('sort')==6): ?>selected <?php endif; ?>>Name: Z-A</option>
                                </select>
                                <input type="hidden" name="min_price" value="<?php echo e(request()->get('min_price')); ?>" />
                                <input type="hidden" name="max_price" value="<?php echo e(request()->get('max_price')); ?>" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="row">
            <div class="col-12">
                <div class="shop-product-grid">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="shop-product-card">
                        
                        <!-- Discount Badge -->
                        <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                            <?php 
                                $discount = ((($value->old_price - $value->new_price) * 100) / $value->old_price);
                            ?>
                            <div class="shop-badge-discount">
                                -<?php echo e(number_format($discount, 0)); ?>% OFF
                            </div>
                        <?php endif; ?>

                        <div>
                            <!-- Product Image -->
                            <div class="shop-img-box">
                                <a href="<?php echo e(route('product', $value->slug)); ?>" style="display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">
                                    <img src="<?php echo e(asset($value->image ? $value->image->image : 'public/uploads/no-image.png')); ?>"
                                         alt="<?php echo e($value->name); ?>"
                                         loading="lazy" />
                                </a>
                            </div>

                            <!-- Product Category / Subtitle -->
                            <div style="font-size: 11px; color: #94a3b8; font-weight: 600; text-transform: uppercase; margin-bottom: 4px; letter-spacing: 0.5px;">
                                <?php echo e($value->category ? $value->category->name : 'PET SUPPLIES'); ?>

                            </div>

                            <!-- Product Title -->
                            <a href="<?php echo e(route('product', $value->slug)); ?>" class="shop-title-link" title="<?php echo e($value->name); ?>">
                                <?php echo e($value->name); ?>

                            </a>

                            <!-- Star Rating -->
                            <?php
                                $averageRating = $value->reviews ? $value->reviews->avg('ratting') : 0; 
                                $filledStars = floor($averageRating);
                                $hasHalfStar = $averageRating - $filledStars >= 0.5;
                                $emptyStars = 5 - $filledStars - ($hasHalfStar ? 1 : 0);
                            ?>
                            <div class="mb-2" style="font-size: 11px; color: #f59e0b; display: flex; gap: 2px;">
                                <?php if($averageRating > 0 && $averageRating <= 5): ?>
                                    <?php for($i = 0; $i < $filledStars; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                    <?php if($hasHalfStar): ?>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php endif; ?>
                                    <?php for($i = 0; $i < $emptyStars; $i++): ?>
                                        <i class="far fa-star" style="color: #cbd5e1;"></i>
                                    <?php endfor; ?>
                                <?php else: ?>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <?php endif; ?>
                            </div>

                            <!-- Price Section -->
                            <div style="margin-bottom: 16px; display: flex; align-items: baseline; gap: 8px;">
                                <span style="font-size: 16.5px; font-weight: 700; color: #0f172a;">
                                    ৳ <?php echo e(number_format($value->new_price, 2)); ?>

                                </span>
                                <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                    <del style="font-size: 13px; color: #94a3b8;">৳ <?php echo e(number_format($value->old_price, 2)); ?></del>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Button Section -->
                        <div>
                            <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                <a href="<?php echo e(route('product', $value->slug)); ?>" class="shop-btn-cart">
                                    <i class="fa-solid fa-cart-shopping"></i> অর্ডার করুন
                                </a>
                            <?php else: ?>
                                <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                    <input type="hidden" name="qty" value="1" />
                                    <button type="submit" class="shop-btn-cart">
                                        <i class="fa-solid fa-cart-shopping"></i> ADD TO CART
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center py-5" style="background: #ffffff; border-radius: 8px; border: 1px solid #eef0f3;">
                        <i class="fa-solid fa-box-open" style="font-size: 45px; color: #cbd5e1; margin-bottom: 15px;"></i>
                        <h4 style="color: #475569; font-weight: 600;">No products found!</h4>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <?php echo e($products->links('pagination::bootstrap-4')); ?>

                </div>
            </div>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $(".sort").change(function(){
       if ($('#loading').length) { $('#loading').show(); }
       $(".sort-form").submit();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontEnd.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Programming capture\New folder\E-Commerce2\ecommerce2\resources\views/frontEnd/layouts/pages/shop.blade.php ENDPATH**/ ?>