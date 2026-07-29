<?php $__env->startSection('title', $seo->meta_title ?? 'Home'); ?>

<?php $__env->startPush('seo'); ?>
<meta name="app-url" content="<?php echo e(url('/')); ?>" />
<meta name="robots" content="index, follow" />

<meta name="description" content="<?php echo e($seo->meta_description ?? ''); ?>" />
<meta name="keywords" content="<?php echo e($seo->meta_tags ?? ''); ?>" />

<!-- Open Graph data -->
<meta property="og:title" content="<?php echo e($seo->meta_title ?? ''); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo e(url()->current()); ?>" />
<meta property="og:image" content="<?php echo e(asset($generalsetting->og_baner ?? 'public/logo.png')); ?>" />
<meta property="og:description" content="<?php echo e($seo->meta_description ?? ''); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="slider-section">
    <div class="container">
        <div class="row">

            
            <div class="col-sm-12">
                <div class="home-slider-container">
                    <div class="main_slider owl-carousel">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="slider-item">
                                <img src="<?php echo e(asset($value->image)); ?>"
                                     alt="Slider"
                                     class="img-fluid w-100" />
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- slider end -->


<?php if(isset($sliderbottomads) && !$sliderbottomads->isEmpty()): ?>
<section class="bottoads_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="bottoads_inner">
                    <?php $__currentLoopData = $sliderbottomads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="ads_item">
                            <a href="<?php echo e($value->link); ?>">
                                <img src="<?php echo e(asset($value->image)); ?>"
                                     alt="Ads"
                                     class="img-fluid"
                                     loading="lazy" />
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<section class="featured-products-section" style="padding: 30px 0 20px 0; background: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Section Header -->
                <div class="featured-sec-header" style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #ededed; padding-bottom: 8px; margin-bottom: 22px; position: relative;">
                    <h3 style="font-size: 19px; font-weight: 700; color: #444444; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; position: relative; display: inline-block;">
                        FEATURED PRODUCTS
                        <span style="position: absolute; bottom: -10px; left: 0; width: 75px; height: 2px; background: #1e73be;"></span>
                    </h3>
                    <a href="<?php echo e(route('shop')); ?>" style="font-size: 14px; color: #555555; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 5px; transition: color 0.2s;">
                        Browse all <i class="fa-solid fa-chevron-right" style="font-size: 11px;"></i>
                    </a>
                </div>
            </div>

            <?php if(!$featured_products->isEmpty()): ?>
                <div class="col-sm-12">
                    <div class="product_slider owl-carousel">
                        <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured-card-item" style="border: 1px solid #eef0f3; border-radius: 4px; background: #ffffff; padding: 16px; margin: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between; min-height: 380px; transition: transform 0.2s, box-shadow 0.2s;">
                                
                                <!-- Image Container -->
                                <div class="pro_img" style="text-align: center; margin-bottom: 14px; height: 170px; display: flex; align-items: center; justify-content: center; width: 100%;">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>" style="display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">
                                        <img src="<?php echo e(asset($value->image ? $value->image->image : 'public/uploads/no-image.png')); ?>"
                                             alt="<?php echo e($value->name); ?>"
                                             style="max-height: 160px; max-width: 100%; object-fit: contain;"
                                             loading="lazy" />
                                    </a>
                                </div>

                                <!-- Title -->
                                <div class="pro_des" style="margin-bottom: 10px;">
                                    <div class="pro_name" style="height: 42px; overflow: hidden;">
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" style="color: #333333; font-size: 13.5px; font-weight: 500; text-decoration: none; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="<?php echo e($value->name); ?>">
                                            <?php echo e($value->name); ?>

                                        </a>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="pro_price" style="margin-bottom: 14px;">
                                    <span style="font-size: 16px; font-weight: 700; color: #111111;">
                                        <?php echo e(number_format($value->new_price, 2)); ?>৳
                                    </span>
                                    <?php if($value->old_price): ?>
                                        <del style="font-size: 13px; color: #888888; margin-left: 6px;"><?php echo e(number_format($value->old_price, 2)); ?>৳</del>
                                    <?php endif; ?>
                                </div>

                                <!-- ADD TO CART Button -->
                                <div class="pro_btn">
                                    <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; text-decoration: none; display: block; text-align: center; border: none; letter-spacing: 0.5px;">
                                            ADD TO CART
                                        </a>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <button type="submit" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; border: none; letter-spacing: 0.5px; width: 100%;">
                                                ADD TO CART
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- Empty State Component -->
                <div class="col-sm-12">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 35px 20px; text-align: center; margin-bottom: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-box-open" style="font-size: 38px; color: #94a3b8; margin-bottom: 10px; display: block; text-align: center;"></i>
                        <h5 style="color: #475569; font-weight: 600; font-size: 14.5px; margin-bottom: 6px; text-align: center; width: 100%;">No Featured Products Available</h5>
                        <p style="color: #94a3b8; font-size: 12.5px; margin: 0; text-align: center; width: 100%;">Turn ON "Featured" switch in Admin Panel -> Edit Product to display products here.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php if(isset($hitdealsbaner) && !$hitdealsbaner->isEmpty()): ?>
<section>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $hitdealsbaner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12">
                <a href="<?php echo e($hotads->link); ?>?sold=show">
                    <img class="img-fluid w-100"
                         src="<?php echo e(asset($hotads->image)); ?>"
                         alt="Hot Deals Banner"
                         loading="lazy" />
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<section class="homeproduct">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h3 class="section-title-header">
                        <div class="timer_inner">
                            <div>
                                <span class="section-title-name"> Hot Deal </span>
                            </div>
                            <div>
                                <div class="offer_timer" id="simple_timer"></div>
                            </div>
                        </div>
                    </h3>
                </div>
            </div>

            <?php if(!$hotdeal_top->isEmpty()): ?>
                <div class="col-sm-12">
                    <div class="product_slider owl-carousel">
                        <?php $__currentLoopData = $hotdeal_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product_item wist_item wow zoomIn"
                                 data-wow-duration="1.5s"
                                 data-wow-delay="0.<?php echo e($key); ?>s">
                                <div class="product_item_inner">
                                    <?php if($value->old_price): ?>
                                    <div class="sale-badge">
                                        <div class="sale-badge-inner">
                                            <div class="sale-badge-box">
                                                <span class="sale-badge-text">
                                                    <p>
                                                        <?php
                                                            $discount = ((($value->old_price - $value->new_price) * 100) / $value->old_price);
                                                        ?>
                                                        <?php echo e(number_format($discount, 0)); ?>%
                                                    </p>
                                                    ছাড়
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="pro_img">
                                        <a href="<?php echo e(route('product', $value->slug)); ?>">
                                            <img src="<?php echo e(asset($value->image ? $value->image->image : '')); ?>"
                                                 alt="<?php echo e($value->name); ?>"
                                                 class="img-fluid"
                                                 loading="lazy" />
                                        </a>
                                    </div>

                                    <div class="pro_des">
                                        <div class="pro_name">
                                            <a href="<?php echo e(route('product', $value->slug)); ?>">
                                                <?php echo e(Str::limit($value->name, 35)); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    $averageRating = $value->reviews->avg('ratting');
                                    $filledStars   = floor($averageRating);
                                    $hasHalfStar   = $averageRating - $filledStars >= 0.5;
                                    $emptyStars    = 5 - $filledStars - ($hasHalfStar ? 1 : 0);
                                ?>

                                <?php if($averageRating >= 0 && $averageRating <= 5): ?>
                                    <?php for($i = 0; $i < $filledStars; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                    <?php if($hasHalfStar): ?>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php endif; ?>
                                    <?php for($i = 0; $i < $emptyStars; $i++): ?>
                                        <i class="far fa-star"></i>
                                    <?php endfor; ?>
                                <?php else: ?>
                                    <span>Invalid rating range</span>
                                <?php endif; ?>

                                <div class="pro_price">
                                    <p>
                                        <?php if($value->old_price): ?>
                                            <del>৳ <?php echo e($value->old_price); ?></del>
                                        <?php endif; ?>
                                        ৳ <?php echo e($value->new_price); ?>

                                    </p>
                                </div>

                                
                                <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                    
                                    <div class="pro_btn">
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" class="order-btn-link">
                                            অর্ডার করুন
                                        </a>
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" class="cart-icon-link">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    
                                    <div class="pro_btn">
                                        <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <input type="hidden" name="order_now" value="1">
                                            <button type="submit" class="order-btn">অর্ডার করুন</button>
                                        </form>

                                        <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <button type="submit" class="cart-icon-btn cart_store" data-id="<?php echo e($value->id); ?>">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- Empty State Component -->
                <div class="col-sm-12">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 35px 20px; text-align: center; margin-bottom: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-bolt" style="font-size: 38px; color: #94a3b8; margin-bottom: 10px; display: block; text-align: center;"></i>
                        <h5 style="color: #475569; font-weight: 600; font-size: 14.5px; margin-bottom: 6px; text-align: center; width: 100%;">No Hot Deal Products Available</h5>
                        <p style="color: #94a3b8; font-size: 12.5px; margin: 0; text-align: center; width: 100%;">Turn ON "Hot Deal" switch in Admin Panel -> Edit Product to display products here.</p>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>


<section class="treats-products-section" style="padding: 25px 0 20px 0; background: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Section Header -->
                <div class="featured-sec-header" style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #ededed; padding-bottom: 8px; margin-bottom: 22px; position: relative;">
                    <h3 style="font-size: 19px; font-weight: 700; color: #444444; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; position: relative; display: inline-block;">
                        TASTY TREATS FOR PETS
                        <span style="position: absolute; bottom: -10px; left: 0; width: 75px; height: 2px; background: #1e73be;"></span>
                    </h3>
                    <a href="<?php echo e(route('shop')); ?>" style="font-size: 14px; color: #555555; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 5px; transition: color 0.2s;">
                        Browse All <i class="fa-solid fa-chevron-right" style="font-size: 11px;"></i>
                    </a>
                </div>
            </div>

            <?php if(!$treats_products->isEmpty()): ?>
                <div class="col-sm-12">
                    <div class="product_slider owl-carousel">
                        <?php $__currentLoopData = $treats_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured-card-item" style="border: 1px solid #eef0f3; border-radius: 4px; background: #ffffff; padding: 16px; margin: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between; min-height: 380px; position: relative; transition: transform 0.2s, box-shadow 0.2s;">
                                
                                <!-- Discount Badge -->
                                <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                    <?php 
                                        $discount = ((($value->old_price - $value->new_price) * 100) / $value->old_price);
                                    ?>
                                    <div style="position: absolute; top: 12px; left: 12px; background: #008080; color: #ffffff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; z-index: 2; box-shadow: 0 2px 6px rgba(0,128,128,0.3);">
                                        -<?php echo e(number_format($discount, 0)); ?>%
                                    </div>
                                <?php endif; ?>

                                <!-- Image Container -->
                                <div class="pro_img" style="text-align: center; margin-bottom: 14px; height: 170px; display: flex; align-items: center; justify-content: center; width: 100%;">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>" style="display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">
                                        <img src="<?php echo e(asset($value->image ? $value->image->image : 'public/uploads/no-image.png')); ?>"
                                             alt="<?php echo e($value->name); ?>"
                                             style="max-height: 160px; max-width: 100%; object-fit: contain;"
                                             loading="lazy" />
                                    </a>
                                </div>

                                <!-- Title -->
                                <div class="pro_des" style="margin-bottom: 10px;">
                                    <div class="pro_name" style="height: 42px; overflow: hidden;">
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" style="color: #333333; font-size: 13.5px; font-weight: 500; text-decoration: none; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="<?php echo e($value->name); ?>">
                                            <?php echo e($value->name); ?>

                                        </a>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="pro_price" style="margin-bottom: 14px;">
                                    <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                        <del style="font-size: 13px; color: #888888; margin-right: 6px;"><?php echo e(number_format($value->old_price, 2)); ?>৳</del>
                                    <?php endif; ?>
                                    <span style="font-size: 16px; font-weight: 700; color: #111111;">
                                        <?php echo e(number_format($value->new_price, 2)); ?>৳
                                    </span>
                                </div>

                                <!-- ADD TO CART Button -->
                                <div class="pro_btn">
                                    <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; text-decoration: none; display: block; text-align: center; border: none; letter-spacing: 0.5px;">
                                            ADD TO CART
                                        </a>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <button type="submit" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; border: none; letter-spacing: 0.5px; width: 100%;">
                                                ADD TO CART
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- Empty State Component -->
                <div class="col-sm-12">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 35px 20px; text-align: center; margin-bottom: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-box-open" style="font-size: 38px; color: #94a3b8; margin-bottom: 10px; display: block; text-align: center;"></i>
                        <h5 style="color: #475569; font-weight: 600; font-size: 14.5px; margin-bottom: 6px; text-align: center; width: 100%;">No Pet Treats Products Available</h5>
                        <p style="color: #94a3b8; font-size: 12.5px; margin: 0; text-align: center; width: 100%;">Turn ON "Pet Treats" switch in Admin Panel -> Edit Product to display products here.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="wet-food-products-section" style="padding: 25px 0 20px 0; background: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Section Header Matching Screenshot -->
                <div class="featured-sec-header" style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #ededed; padding-bottom: 8px; margin-bottom: 22px; position: relative;">
                    <h3 style="font-size: 19px; font-weight: 700; color: #444444; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; position: relative; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-gear text-secondary" style="font-size: 16px;"></i> HEALTHY WET FOOD
                        <span style="position: absolute; bottom: -10px; left: 0; width: 75px; height: 2px; background: #1e73be;"></span>
                    </h3>
                    <a href="<?php echo e(route('shop')); ?>" style="font-size: 14px; color: #555555; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 5px; transition: color 0.2s;">
                        Browse All <i class="fa-solid fa-chevron-right" style="font-size: 11px;"></i>
                    </a>
                </div>
            </div>

            <?php if(!$wet_food_products->isEmpty()): ?>
                <div class="col-sm-12">
                    <div class="product_slider owl-carousel">
                        <?php $__currentLoopData = $wet_food_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured-card-item" style="border: 1px solid #eef0f3; border-radius: 4px; background: #ffffff; padding: 16px; margin: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between; min-height: 380px; position: relative; transition: transform 0.2s, box-shadow 0.2s;">
                                
                                <!-- Discount Badge -->
                                <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                    <?php 
                                        $discount = ((($value->old_price - $value->new_price) * 100) / $value->old_price);
                                    ?>
                                    <div style="position: absolute; top: 12px; left: 12px; background: #008080; color: #ffffff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; z-index: 2; box-shadow: 0 2px 6px rgba(0,128,128,0.3);">
                                        -<?php echo e(number_format($discount, 0)); ?>%
                                    </div>
                                <?php endif; ?>

                                <!-- Image Container -->
                                <div class="pro_img" style="text-align: center; margin-bottom: 14px; height: 170px; display: flex; align-items: center; justify-content: center; width: 100%;">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>" style="display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">
                                        <img src="<?php echo e(asset($value->image ? $value->image->image : 'public/uploads/no-image.png')); ?>"
                                             alt="<?php echo e($value->name); ?>"
                                             style="max-height: 160px; max-width: 100%; object-fit: contain;"
                                             loading="lazy" />
                                    </a>
                                </div>

                                <!-- Title -->
                                <div class="pro_des" style="margin-bottom: 10px;">
                                    <div class="pro_name" style="height: 42px; overflow: hidden;">
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" style="color: #333333; font-size: 13.5px; font-weight: 500; text-decoration: none; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="<?php echo e($value->name); ?>">
                                            <?php echo e($value->name); ?>

                                        </a>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="pro_price" style="margin-bottom: 14px;">
                                    <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                        <del style="font-size: 13px; color: #888888; margin-right: 6px;"><?php echo e(number_format($value->old_price, 2)); ?>৳</del>
                                    <?php endif; ?>
                                    <span style="font-size: 16px; font-weight: 700; color: #111111;">
                                        <?php echo e(number_format($value->new_price, 2)); ?>৳
                                    </span>
                                </div>

                                <!-- ADD TO CART Button -->
                                <div class="pro_btn">
                                    <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; text-decoration: none; display: block; text-align: center; border: none; letter-spacing: 0.5px;">
                                            ADD TO CART
                                        </a>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <button type="submit" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; border: none; letter-spacing: 0.5px; width: 100%;">
                                                ADD TO CART
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- Empty State Component -->
                <div class="col-sm-12">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 35px 20px; text-align: center; margin-bottom: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-tint" style="font-size: 38px; color: #94a3b8; margin-bottom: 10px; display: block; text-align: center;"></i>
                        <h5 style="color: #475569; font-weight: 600; font-size: 14.5px; margin-bottom: 6px; text-align: center; width: 100%;">No Healthy Wet Food Products Available</h5>
                        <p style="color: #94a3b8; font-size: 12.5px; margin: 0; text-align: center; width: 100%;">Turn ON "Wet Food" switch in Admin Panel -> Edit Product to display products here.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="dry-food-products-section" style="padding: 25px 0 20px 0; background: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Section Header Matching Screenshot -->
                <div class="featured-sec-header" style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #ededed; padding-bottom: 8px; margin-bottom: 22px; position: relative;">
                    <h3 style="font-size: 19px; font-weight: 700; color: #444444; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; position: relative; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-check text-secondary" style="font-size: 16px;"></i> PREMIUM DRY PETS FOOD
                        <span style="position: absolute; bottom: -10px; left: 0; width: 75px; height: 2px; background: #1e73be;"></span>
                    </h3>
                    <a href="<?php echo e(route('shop')); ?>" style="font-size: 14px; color: #555555; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 5px; transition: color 0.2s;">
                        Browse all <i class="fa-solid fa-chevron-right" style="font-size: 11px;"></i>
                    </a>
                </div>
            </div>

            <?php if(!$dry_food_products->isEmpty()): ?>
                <div class="col-sm-12">
                    <div class="product_slider owl-carousel">
                        <?php $__currentLoopData = $dry_food_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured-card-item" style="border: 1px solid #eef0f3; border-radius: 4px; background: #ffffff; padding: 16px; margin: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between; min-height: 380px; position: relative; transition: transform 0.2s, box-shadow 0.2s;">
                                
                                <!-- Discount Badge -->
                                <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                    <?php 
                                        $discount = ((($value->old_price - $value->new_price) * 100) / $value->old_price);
                                    ?>
                                    <div style="position: absolute; top: 12px; left: 12px; background: #008080; color: #ffffff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; z-index: 2; box-shadow: 0 2px 6px rgba(0,128,128,0.3);">
                                        -<?php echo e(number_format($discount, 0)); ?>%
                                    </div>
                                <?php endif; ?>

                                <!-- Image Container -->
                                <div class="pro_img" style="text-align: center; margin-bottom: 14px; height: 170px; display: flex; align-items: center; justify-content: center; width: 100%;">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>" style="display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">
                                        <img src="<?php echo e(asset($value->image ? $value->image->image : 'public/uploads/no-image.png')); ?>"
                                             alt="<?php echo e($value->name); ?>"
                                             style="max-height: 160px; max-width: 100%; object-fit: contain;"
                                             loading="lazy" />
                                    </a>
                                </div>

                                <!-- Title -->
                                <div class="pro_des" style="margin-bottom: 10px;">
                                    <div class="pro_name" style="height: 42px; overflow: hidden;">
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" style="color: #333333; font-size: 13.5px; font-weight: 500; text-decoration: none; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="<?php echo e($value->name); ?>">
                                            <?php echo e($value->name); ?>

                                        </a>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="pro_price" style="margin-bottom: 14px;">
                                    <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                        <del style="font-size: 13px; color: #888888; margin-right: 6px;"><?php echo e(number_format($value->old_price, 2)); ?>৳</del>
                                    <?php endif; ?>
                                    <span style="font-size: 16px; font-weight: 700; color: #111111;">
                                        <?php echo e(number_format($value->new_price, 2)); ?>৳
                                    </span>
                                </div>

                                <!-- ADD TO CART Button -->
                                <div class="pro_btn">
                                    <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; text-decoration: none; display: block; text-align: center; border: none; letter-spacing: 0.5px;">
                                            ADD TO CART
                                        </a>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <button type="submit" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; border: none; letter-spacing: 0.5px; width: 100%;">
                                                ADD TO CART
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- Empty State Component -->
                <div class="col-sm-12">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 35px 20px; text-align: center; margin-bottom: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-cookie-bite" style="font-size: 38px; color: #94a3b8; margin-bottom: 10px; display: block; text-align: center;"></i>
                        <h5 style="color: #475569; font-weight: 600; font-size: 14.5px; margin-bottom: 6px; text-align: center; width: 100%;">No Premium Dry Pets Food Products Available</h5>
                        <p style="color: #94a3b8; font-size: 12.5px; margin: 0; text-align: center; width: 100%;">Turn ON "Dry Food" switch in Admin Panel -> Edit Product to display products here.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="pet-care-products-section" style="padding: 25px 0 20px 0; background: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Section Header Matching Screenshot -->
                <div class="featured-sec-header" style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #ededed; padding-bottom: 8px; margin-bottom: 22px; position: relative;">
                    <h3 style="font-size: 19px; font-weight: 700; color: #444444; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; position: relative; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-heartbeat text-danger" style="font-size: 16px;"></i> PET CARE & HEALTH
                        <span style="position: absolute; bottom: -10px; left: 0; width: 75px; height: 2px; background: #1e73be;"></span>
                    </h3>
                    <a href="<?php echo e(route('shop')); ?>" style="font-size: 14px; color: #555555; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 5px; transition: color 0.2s;">
                        Browse all <i class="fa-solid fa-chevron-right" style="font-size: 11px;"></i>
                    </a>
                </div>
            </div>

            <?php if(!$pet_care_products->isEmpty()): ?>
                <div class="col-sm-12">
                    <div class="product_slider owl-carousel">
                        <?php $__currentLoopData = $pet_care_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured-card-item" style="border: 1px solid #eef0f3; border-radius: 4px; background: #ffffff; padding: 16px; margin: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between; min-height: 380px; position: relative; transition: transform 0.2s, box-shadow 0.2s;">
                                
                                <!-- Discount Badge -->
                                <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                    <?php 
                                        $discount = ((($value->old_price - $value->new_price) * 100) / $value->old_price);
                                    ?>
                                    <div style="position: absolute; top: 12px; left: 12px; background: #008080; color: #ffffff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; z-index: 2; box-shadow: 0 2px 6px rgba(0,128,128,0.3);">
                                        -<?php echo e(number_format($discount, 0)); ?>%
                                    </div>
                                <?php endif; ?>

                                <!-- Image Container -->
                                <div class="pro_img" style="text-align: center; margin-bottom: 14px; height: 170px; display: flex; align-items: center; justify-content: center; width: 100%;">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>" style="display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">
                                        <img src="<?php echo e(asset($value->image ? $value->image->image : 'public/uploads/no-image.png')); ?>"
                                             alt="<?php echo e($value->name); ?>"
                                             style="max-height: 160px; max-width: 100%; object-fit: contain;"
                                             loading="lazy" />
                                    </a>
                                </div>

                                <!-- Title -->
                                <div class="pro_des" style="margin-bottom: 10px;">
                                    <div class="pro_name" style="height: 42px; overflow: hidden;">
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" style="color: #333333; font-size: 13.5px; font-weight: 500; text-decoration: none; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="<?php echo e($value->name); ?>">
                                            <?php echo e($value->name); ?>

                                        </a>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="pro_price" style="margin-bottom: 14px;">
                                    <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                        <del style="font-size: 13px; color: #888888; margin-right: 6px;"><?php echo e(number_format($value->old_price, 2)); ?>৳</del>
                                    <?php endif; ?>
                                    <span style="font-size: 16px; font-weight: 700; color: #111111;">
                                        <?php echo e(number_format($value->new_price, 2)); ?>৳
                                    </span>
                                </div>

                                <!-- ADD TO CART Button -->
                                <div class="pro_btn">
                                    <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; text-decoration: none; display: block; text-align: center; border: none; letter-spacing: 0.5px;">
                                            ADD TO CART
                                        </a>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <button type="submit" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; border: none; letter-spacing: 0.5px; width: 100%;">
                                                ADD TO CART
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- Empty State Component -->
                <div class="col-sm-12">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 35px 20px; text-align: center; margin-bottom: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-heartbeat" style="font-size: 38px; color: #94a3b8; margin-bottom: 10px; display: block; text-align: center;"></i>
                        <h5 style="color: #475569; font-weight: 600; font-size: 14.5px; margin-bottom: 6px; text-align: center; width: 100%;">No Pet Care & Health Products Available</h5>
                        <p style="color: #94a3b8; font-size: 12.5px; margin: 0; text-align: center; width: 100%;">Turn ON "Pet Care" switch in Admin Panel -> Edit Product to display products here.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="bestseller-products-section" style="padding: 25px 0 20px 0; background: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Section Header Matching Screenshot -->
                <div class="featured-sec-header" style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #ededed; padding-bottom: 8px; margin-bottom: 22px; position: relative;">
                    <h3 style="font-size: 19px; font-weight: 700; color: #444444; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; position: relative; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-trophy text-warning" style="font-size: 16px;"></i> OUR BEST SELLERS
                        <span style="position: absolute; bottom: -10px; left: 0; width: 75px; height: 2px; background: #1e73be;"></span>
                    </h3>
                    <a href="<?php echo e(route('shop')); ?>" style="font-size: 14px; color: #555555; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 5px; transition: color 0.2s;">
                        Browse All <i class="fa-solid fa-chevron-right" style="font-size: 11px;"></i>
                    </a>
                </div>
            </div>

            <?php if(!$bestseller_products->isEmpty()): ?>
                <div class="col-sm-12">
                    <div class="product_slider owl-carousel">
                        <?php $__currentLoopData = $bestseller_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured-card-item" style="border: 1px solid #eef0f3; border-radius: 4px; background: #ffffff; padding: 16px; margin: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between; min-height: 380px; position: relative; transition: transform 0.2s, box-shadow 0.2s;">
                                
                                <!-- Discount Badge -->
                                <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                    <?php 
                                        $discount = ((($value->old_price - $value->new_price) * 100) / $value->old_price);
                                    ?>
                                    <div style="position: absolute; top: 12px; left: 12px; background: #008080; color: #ffffff; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; z-index: 2; box-shadow: 0 2px 6px rgba(0,128,128,0.3);">
                                        -<?php echo e(number_format($discount, 0)); ?>%
                                    </div>
                                <?php endif; ?>

                                <!-- Image Container -->
                                <div class="pro_img" style="text-align: center; margin-bottom: 14px; height: 170px; display: flex; align-items: center; justify-content: center; width: 100%;">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>" style="display: flex; width: 100%; height: 100%; align-items: center; justify-content: center;">
                                        <img src="<?php echo e(asset($value->image ? $value->image->image : 'public/uploads/no-image.png')); ?>"
                                             alt="<?php echo e($value->name); ?>"
                                             style="max-height: 160px; max-width: 100%; object-fit: contain;"
                                             loading="lazy" />
                                    </a>
                                </div>

                                <!-- Title -->
                                <div class="pro_des" style="margin-bottom: 10px;">
                                    <div class="pro_name" style="height: 42px; overflow: hidden;">
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" style="color: #333333; font-size: 13.5px; font-weight: 500; text-decoration: none; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="<?php echo e($value->name); ?>">
                                            <?php echo e($value->name); ?>

                                        </a>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="pro_price" style="margin-bottom: 14px;">
                                    <?php if($value->old_price && $value->old_price > $value->new_price): ?>
                                        <del style="font-size: 13px; color: #888888; margin-right: 6px;"><?php echo e(number_format($value->old_price, 2)); ?>৳</del>
                                    <?php endif; ?>
                                    <span style="font-size: 16px; font-weight: 700; color: #111111;">
                                        <?php echo e(number_format($value->new_price, 2)); ?>৳
                                    </span>
                                </div>

                                <!-- ADD TO CART Button -->
                                <div class="pro_btn">
                                    <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                        <a href="<?php echo e(route('product', $value->slug)); ?>" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; text-decoration: none; display: block; text-align: center; border: none; letter-spacing: 0.5px;">
                                            ADD TO CART
                                        </a>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <button type="submit" class="btn w-100" style="background: #1e73be; color: #ffffff; font-weight: 700; font-size: 13px; text-transform: uppercase; padding: 9px 12px; border-radius: 3px; border: none; letter-spacing: 0.5px; width: 100%;">
                                                ADD TO CART
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- Empty State Component -->
                <div class="col-sm-12">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 35px 20px; text-align: center; margin-bottom: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-trophy" style="font-size: 38px; color: #94a3b8; margin-bottom: 10px; display: block; text-align: center;"></i>
                        <h5 style="color: #475569; font-weight: 600; font-size: 14.5px; margin-bottom: 6px; text-align: center; width: 100%;">No Best Seller Products Available</h5>
                        <p style="color: #94a3b8; font-size: 12.5px; margin: 0; text-align: center; width: 100%;">Turn ON "Best Seller" switch in Admin Panel -> Edit Product to display products here.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>




<?php if(isset($homepageads) && !$homepageads->isEmpty()): ?>
<section>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $homepageads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12">
                <a href="<?php echo e($homeads->link); ?>?sold=show">
                    <img class="img-fluid w-100"
                         src="<?php echo e(asset($homeads->image)); ?>"
                         alt="Homepage Ads"
                         loading="lazy" />
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if($homeproducts && $homeproducts->count() > 0): ?>
    <?php $__currentLoopData = $homeproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homecat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="homeproduct">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="sec_title">
                            <h3 class="section-title-header">
                                <span class="section-title-name"><?php echo e($homecat->name); ?></span>
                                <a href="<?php echo e(route('category', $homecat->slug)); ?>" class="view_more_btn">
                                    View More
                                </a>
                            </h3>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="product_slider owl-carousel">
                            <?php $__currentLoopData = $homecat->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product_item wist_item wow zoomIn"
                                     data-wow-duration="1.5s"
                                     data-wow-delay="0.<?php echo e($key); ?>s">
                                    <div class="product_item_inner">
                                        <?php if($value->old_price): ?>
                                        <div class="sale-badge">
                                            <div class="sale-badge-inner">
                                                <div class="sale-badge-box">
                                                    <span class="sale-badge-text">
                                                        <p>
                                                            <?php
                                                                $discount = ((($value->old_price - $value->new_price) * 100) / $value->old_price);
                                                            ?>
                                                            <?php echo e(number_format($discount, 0)); ?>%
                                                        </p>
                                                        ছাড়
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <div class="pro_img">
                                            <a href="<?php echo e(route('product', $value->slug)); ?>">
                                                <img src="<?php echo e(asset($value->image ? $value->image->image : '')); ?>"
                                                     alt="<?php echo e($value->name); ?>"
                                                     class="img-fluid"
                                                     loading="lazy" />
                                            </a>
                                        </div>

                                        <div class="pro_des">
                                            <div class="pro_name">
                                                <a href="<?php echo e(route('product', $value->slug)); ?>">
                                                    <?php echo e(Str::limit($value->name, 35)); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $averageRating = $value->reviews->avg('ratting');
                                        $filledStars   = floor($averageRating);
                                        $hasHalfStar   = $averageRating - $filledStars >= 0.5;
                                        $emptyStars    = 5 - $filledStars - ($hasHalfStar ? 1 : 0);
                                    ?>

                                    <?php if($averageRating >= 0 && $averageRating <= 5): ?>
                                        <?php for($i = 0; $i < $filledStars; $i++): ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                        <?php if($hasHalfStar): ?>
                                            <i class="fas fa-star-half-alt"></i>
                                        <?php endif; ?>
                                        <?php for($i = 0; $i < $emptyStars; $i++): ?>
                                            <i class="far fa-star"></i>
                                        <?php endfor; ?>
                                    <?php else: ?>
                                        <span>Invalid rating range</span>
                                    <?php endif; ?>

                                    <div class="pro_price">
                                        <p>
                                            <?php if($value->old_price): ?>
                                                <del>৳ <?php echo e($value->old_price); ?></del>
                                            <?php endif; ?>
                                            ৳ <?php echo e($value->new_price); ?>

                                        </p>
                                    </div>

                                    
                                    <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                                        <div class="pro_btn">
                                            <a href="<?php echo e(route('product', $value->slug)); ?>" class="order-btn-link">
                                                অর্ডার করুন
                                            </a>
                                            <a href="<?php echo e(route('product', $value->slug)); ?>" class="cart-icon-link">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="pro_btn">
                                            <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                                <input type="hidden" name="qty" value="1" />
                                                <input type="hidden" name="order_now" value="1">
                                                <button type="submit" class="order-btn">অর্ডার করুন</button>
                                            </form>

                                            <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                                <input type="hidden" name="qty" value="1" />
                                                <button type="submit" class="cart-icon-btn cart_store" data-id="<?php echo e($value->id); ?>">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            </form>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php if(isset($homepageads2) && !$homepageads2->isEmpty()): ?>
<section>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $homepageads2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeads2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12">
                <a href="<?php echo e($homeads2->link); ?>?sold=show">
                    <img class="img-fluid w-100"
                         src="<?php echo e(asset($homeads2->image)); ?>"
                         alt="Homepage Ads 2"
                         loading="lazy" />
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>








<?php if(($generalsetting?->vendor_enabled ?? 1) == 1 && isset($vendors) && $vendors->count() > 0): ?>
<section class="homeproduct vendor-shops-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h3 class="section-title-header">
                        <span class="section-title-name">Our Featured Shops</span>
                    </h3>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row vendor-shop-grid">
                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <a href="<?php echo e(route('vendor.shop', $vendor->slug)); ?>" class="vendor-shop-item">
                            
                            <div class="shop-banner-bg" style="background-image: url('<?php echo e($vendor->banner ? asset($vendor->banner) : asset('public/frontEnd/images/default-banner.jpg')); ?>');">
                            </div>
                            
                            
                            <div class="shop-content-wrapper">
                                <div class="shop-logo-container">
                                    <div class="shop-logo-circle">
                                        <?php if($vendor->logo): ?>
                                            <img src="<?php echo e(asset($vendor->logo)); ?>" alt="<?php echo e($vendor->shop_name); ?>" />
                                        <?php else: ?>
                                            <div class="shop-logo-initial">
                                                <?php echo e(strtoupper(substr($vendor->shop_name, 0, 1))); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($vendor->verification_status == 'approved'): ?>
                                    <div class="shop-verified-badge">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="shop-details">
                                    <h4 class="shop-title"><?php echo e($vendor->shop_name); ?></h4>
                                    
                                    
                                    <div class="shop-rating-stars">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php if($i <= floor($vendor->average_rating)): ?>
                                                <i class="fas fa-star"></i>
                                            <?php elseif($i - 0.5 <= $vendor->average_rating): ?>
                                                <i class="fas fa-star-half-alt"></i>
                                            <?php else: ?>
                                                <i class="far fa-star"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                        <span class="shop-review-text">(<?php echo e($vendor->total_reviews); ?> reviews)</span>
                                    </div>
                                </div>
                                
                                
                                <div class="shop-visit-btn">
                                    <span class="visit-btn-icon"><i class="fas fa-arrow-right"></i></span>
                                    <span class="visit-btn-text">VISIT STORE</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(isset($blogs) && $blogs->count() > 0): ?>
<section class="homeproduct blog-home-section">
    <div class="container">

        
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h3 class="section-title-header">
                        <span class="section-title-name">Latest Blogs</span>
                        <a href="<?php echo e(route('blogs')); ?>" class="view_more_btn">
                            View All
                        </a>
                    </h3>
                </div>
            </div>
        </div>

        
        <div class="row">

            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 mb-4">

                <div class="blog-home-card">

                    
                    <div class="blog-home-img">
                        <a href="<?php echo e(route('blog.details', $blog->slug)); ?>">
                            <?php if($blog->image): ?>
                        <img 
                            src="<?php echo e(url('public/'.$blog->image)); ?>"
                            alt="<?php echo e($blog->title); ?>"
                            loading="lazy"
                            width="100%"
                            height="220"
                        >
                    <?php else: ?>
                        <img 
                            src="<?php echo e(url('public/no-image.png')); ?>"
                            alt="No Image"
                            loading="lazy"
                            width="100%"
                            height="220"
                        >
                    <?php endif; ?>
                        </a>
                    </div>

                    
                    <div class="blog-home-content">

                        <div class="blog-home-meta">
                           <?php echo e($blog->created_at->format('d M Y')); ?>

                            |<?php echo e($blog->views); ?>

                        </div>

                        <h5 class="blog-home-title">
                            <a href="<?php echo e(route('blog.details', $blog->slug)); ?>">
                                <?php echo e(Str::limit($blog->title, 55)); ?>

                            </a>
                        </h5>

                        <p>
                            <?php echo e(Str::limit($blog->short_description, 110)); ?>

                        </p>

                        <a href="<?php echo e(route('blog.details', $blog->slug)); ?>"
                           class="read-more-link">
                            Read More →
                        </a>

                    </div>

                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>
</section>
<?php endif; ?>


<?php if(isset($footertopads) && count($footertopads) > 0): ?>
<section class="footertopads_area py-4" style="background: #f8fafc;">
    <div class="container">
        <div class="row g-3">
            <?php $__currentLoopData = $footertopads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-sm-6">
                    <a href="<?php echo e($value->link); ?>">
                        <img src="<?php echo e(asset($value->image)); ?>"
                             alt="Footer Ads"
                             class="img-fluid w-100"
                             style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.06);"
                             loading="lazy" />
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>













<style>
/* ===== CLEAR BRAND LOGO SECTION ===== */
.brand-section {
    background: #ffffff;
}

/* brand card */
.brand-section .brand-item {
    display: block;
    background: #ffffff;
    border-radius: 10px;
    padding: 20px 15px;
    text-decoration: none;
    border: 1px solid #eaeaea;
    transition: all 0.3s ease;
}

.brand-section .brand-item:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transform: translateY(-4px);
}

/* logo container */
.brand-section .brand-img {
    height: 95px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff; /* white bg for clarity */
}

/* LOGO IMAGE – FULL CLEAR */
.brand-section .brand-img img {
    max-height: 80px;
    max-width: 100%;
    object-fit: contain;

    /* IMPORTANT FOR CLEAR LOGO */
    filter: none !important;
    opacity: 1 !important;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
}

/* brand name */
.brand-section .brand-name {
    margin-top: 10px;
    font-size: 14px;
    font-weight: 600;
    color: #000;
    text-align: center;
}

/* mobile */
@media (max-width: 576px) {
    .brand-section .brand-img {
        height: 75px;
    }
    .brand-section .brand-img img {
        max-height: 55px;
    }
}

</style>


















<style>
.blog-home-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #eee;
    height: 100%;
    transition: all .3s ease;
}

.blog-home-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.08);
}

.blog-home-img img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.blog-home-content {
    padding: 16px;
}

.blog-home-meta {
    font-size: 13px;
    color: #777;
    margin-bottom: 6px;
}

.blog-home-title a {
    font-size: 17px;
    font-weight: 600;
    color: #222;
    text-decoration: none;
}

.blog-home-title a:hover {
    color: #0d6efd;
}

.read-more-link {
    display: inline-block;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #0d6efd;
    text-decoration: none;
}

.read-more-link:hover {
    text-decoration: underline;
}

/* ===== VENDOR SHOPS SECTION ===== */
.vendor-shops-section {
    background: #ffffff;
}

.vendor-shop-item {
    display: block;
    position: relative;
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    text-decoration: none;
    border: 1px solid #eaeaea;
    transition: all 0.3s ease;
    height: 100%;
}

.vendor-shop-item:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transform: translateY(-4px);
    text-decoration: none;
}

/* Background Banner */
.shop-banner-bg {
    position: relative;
    width: 100%;
    height: 100px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* Shop Content Wrapper */
.shop-content-wrapper {
    position: relative;
    padding: 15px;
    text-align: center;
    padding-top: 50px;
}

/* Logo Container */
.shop-logo-container {
    position: relative;
    margin-top: -50px;
    margin-bottom: 12px;
    display: flex;
    justify-content: center;
}

.shop-logo-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #ffffff;
    border: 4px solid #ffffff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
}

.shop-logo-circle img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.shop-logo-initial {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

/* Verified Badge */
.shop-verified-badge {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 24px;
    height: 24px;
    background: #0d6efd;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid #ffffff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

.shop-verified-badge i {
    color: #ffffff;
    font-size: 12px;
}

/* Shop Details */
.shop-details {
    margin-bottom: 12px;
}

.shop-title {
    font-size: 15px;
    font-weight: 600;
    color: #222;
    margin: 0 0 4px 0;
    line-height: 1.3;
}

.shop-type {
    font-size: 11px;
    color: #666;
    margin: 0 0 8px 0;
}

.shop-rating-stars {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 2px;
    margin-bottom: 0;
}

.shop-rating-stars i {
    font-size: 11px;
    color: #ffc107;
}

.shop-rating-stars .far.fa-star {
    color: #ddd;
}

.shop-review-text {
    font-size: 10px;
    color: #777;
    margin-left: 4px;
}

/* Visit Store Button */
.shop-visit-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 8px 12px;
    background: #f0f0f0;
    border-radius: 20px;
    color: #333;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    margin-top: 8px;
}

.vendor-shop-item:hover .shop-visit-btn {
    background: #0d6efd;
    color: #ffffff;
}

.visit-btn-icon {
    width: 24px;
    height: 24px;
    background: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.visit-btn-icon i {
    font-size: 10px;
    color: #333;
    transition: all 0.3s ease;
}

.vendor-shop-item:hover .visit-btn-icon {
    background: rgba(255,255,255,0.2);
}

.vendor-shop-item:hover .visit-btn-icon i {
    color: #ffffff;
}

/* Responsive */
@media (max-width: 768px) {
    .shop-banner-bg {
        height: 80px;
    }
    
    .shop-logo-circle {
        width: 70px;
        height: 70px;
    }
    
    .shop-content-wrapper {
        padding-top: 40px;
    }
    
    .shop-title {
        font-size: 14px;
    }
    
    .shop-type {
        font-size: 10px;
    }
}

@media (max-width: 576px) {
    .shop-banner-bg {
        height: 70px;
    }
    
    .shop-logo-circle {
        width: 60px;
        height: 60px;
    }
    
    .shop-content-wrapper {
        padding: 12px;
        padding-top: 35px;
    }
    
    .shop-logo-initial {
        font-size: 28px;
    }
}
</style>








<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('public/frontEnd/js/jquery.syotimer.min.js')); ?>"></script>
<script>
    $("#simple_timer").syotimer({
        date: new Date(2015, 0, 1),
        layout: "hms",
        doubleNumbers: false,
        effectType: "opacity",
        periodUnit: "d",
        periodic: true,
        periodInterval: 1,
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontEnd.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Programming capture\New folder\E-Commerce2\ecommerce2\resources\views/frontEnd/layouts/pages/index.blade.php ENDPATH**/ ?>