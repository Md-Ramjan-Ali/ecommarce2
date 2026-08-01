<?php $__env->startSection('title','Product Edit'); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/backEnd')); ?>/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/backEnd')); ?>/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />

<style>
    /* Custom Design similar to Create Page */
    .section-title { background: #f1f3f7; padding: 10px 15px; border-radius: 6px; font-weight: 700; color: #343a40; border-left: 4px solid #727cf5; margin-bottom: 20px; font-size: 15px; }
    .form-label { font-weight: 600; font-size: 13px; color: #555; }
    .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); border-radius: 0.75rem; }
    
    /* Image Styling */
    .edit-image { width: 70px; height: 70px; object-fit: cover; margin-right: 5px; border-radius: 5px; border: 1px solid #ddd; }
    
    /* Variant Styling */
    .variant-card { background: #fafbfd; border: 1px solid #e2e7f1; padding: 15px; border-radius: 10px; margin-bottom: 12px; position: relative; }
    .color-group { margin-bottom: 20px; }
    .sizes-wrapper { margin-left: 20px; }
    .size-row { background: #fff; border: 1px solid #dee2e6; }

    /* Toggle Switch */
    .switch { position: relative; display: inline-block; width: 40px; height: 20px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 20px; }
    .slider:before { position: absolute; content: ""; height: 14px; width: 14px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; }
    input:checked + .slider { background-color: #0acf97; }
    input:checked + .slider:before { transform: translateX(20px); }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between py-3">
                <h4 class="page-title mb-0">Edit Product: <?php echo e($edit_data->name); ?></h4>
                <div class="page-title-right">
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary rounded-pill px-4 shadow-sm"><i class="fe-list me-1"></i> Manage Products</a>
                </div>
            </div>
        </div>
    </div>
    <form action="<?php echo e(route('products.update')); ?>" method="POST" data-parsley-validate="" enctype="multipart/form-data" name="editForm">
        <?php echo csrf_field(); ?>
        <input type="hidden" value="<?php echo e($edit_data->id); ?>" name="id" />

        <div class="row">
            <div class="col-lg-8">
                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="section-title"><i class="fe-info me-1"></i> Basic Information</div>

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Product Name *</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="name" value="<?php echo e($edit_data->name); ?>" id="name" required />
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="category_id" class="form-label">Categories *</label>
                                <select class="form-control form-select select2 <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="category_id" id="category_id" required>
                                    <optgroup>
                                        <option value="">Select..</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php if($edit_data->category_id==$category->id): ?> selected <?php endif; ?>>
                                                <?php echo e($category->name); ?>

                                            </option>
                                            <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($childCategory->id); ?>" <?php if($edit_data->category_id==$childCategory->id): ?> selected <?php endif; ?>>
                                                    - <?php echo e($childCategory->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                </select>
                                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="subcategory_id" class="form-label">SubCategories</label>
                                <select class="form-control form-select select2 <?php $__errorArgs = ['subcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="subcategory_id" name="subcategory_id">
                                    <optgroup>
                                        <option value="">Select..</option>
                                        <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>" <?php if($edit_data->subcategory_id==$value->id): ?> selected <?php endif; ?>>
                                                <?php echo e($value->subcategoryName); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                </select>
                                <?php $__errorArgs = ['subcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="childcategory_id" class="form-label">Child Categories</label>
                                <select class="form-control form-select select2 <?php $__errorArgs = ['childcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="childcategory_id" name="childcategory_id">
                                    <optgroup>
                                        <option value="">Select..</option>
                                        <?php $__currentLoopData = $childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>" <?php if($edit_data->childcategory_id==$value->id): ?> selected <?php endif; ?>>
                                                <?php echo e($value->childcategoryName); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                </select>
                                <?php $__errorArgs = ['childcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" rows="6"
                                      class="summernote form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php echo e($edit_data->description); ?>

                            </textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group mb-0">
                            <label for="note" class="form-label">Note</label>
                            <textarea name="note" rows="2"
                                      class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($edit_data->note); ?></textarea>
                            <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="d-block form-label">Wholesale Product</label>
                            <label class="switch">
                                <input type="checkbox" value="1" name="is_wholesale" id="is_wholesale" <?php echo e(old('is_wholesale', $edit_data->is_wholesale ?? 0) ? 'checked' : ''); ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>

                
                <div id="wholesale_area" style="<?php echo e(old('is_wholesale', $edit_data->is_wholesale ?? 0) ? 'display:block;' : 'display:none;'); ?>" class="card mb-4">
                    <div class="card-body">
                        <div class="section-title d-flex justify-content-between align-items-center">
                            <span><i class="fe-dollar-sign me-1"></i> Wholesale Pricing Tiers</span>
                            <button type="button" class="btn btn-sm btn-success add-wholesale-tier rounded-pill px-3"><i class="fa fa-plus me-1"></i> Add New Tier</button>
                        </div>
                        
                        <div id="wholesale-wrapper">
                            <?php if($wholesalePrices && $wholesalePrices->count() > 0): ?>
                                <?php $__currentLoopData = $wholesalePrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="variant-card">
                                        <div class="row align-items-end">
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Min Quantity</label>
                                                <input type="number" name="wholesale_price[<?php echo e($key); ?>][min_quantity]" class="form-control" 
                                                       value="<?php echo e(old('wholesale_price.'.$key.'.min_quantity', $tier->min_quantity)); ?>">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Max Quantity</label>
                                                <input type="number" name="wholesale_price[<?php echo e($key); ?>][max_quantity]" class="form-control" 
                                                       value="<?php echo e(old('wholesale_price.'.$key.'.max_quantity', $tier->max_quantity)); ?>" placeholder="Optional">
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">Wholesale Price</label>
                                                <input type="number" step="0.01" name="wholesale_price[<?php echo e($key); ?>][wholesale_price]" class="form-control" 
                                                       value="<?php echo e(old('wholesale_price.'.$key.'.wholesale_price', $tier->wholesale_price)); ?>">
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">Stock Qty</label>
                                                <input type="number" name="wholesale_price[<?php echo e($key); ?>][stock]" class="form-control" 
                                                       value="<?php echo e(old('wholesale_price.'.$key.'.stock', $tier->stock ?? 0)); ?>" placeholder="0">
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <?php if($loop->first): ?>
                                                    <button type="button" class="btn btn-success add-wholesale-tier w-100"><i class="fa fa-plus"></i></button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-danger btn-remove-wholesale w-100"><i class="fa fa-trash"></i></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="variant-card">
                                    <div class="row align-items-end">
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Min Quantity</label>
                                            <input type="number" name="wholesale_price[0][min_quantity]" class="form-control" placeholder="e.g. 10">
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Max Quantity</label>
                                            <input type="number" name="wholesale_price[0][max_quantity]" class="form-control" placeholder="e.g. 50 (optional)">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Wholesale Price</label>
                                            <input type="number" step="0.01" name="wholesale_price[0][wholesale_price]" class="form-control" placeholder="0.00">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Stock Qty</label>
                                            <input type="number" name="wholesale_price[0][stock]" class="form-control" placeholder="0">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <button type="button" class="btn btn-success add-wholesale-tier w-100"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                
                <div class="card mb-4" id="variant_section">
                    <div class="card-body">
                        <div class="section-title d-flex justify-content-between align-items-center">
                            <span><i class="fe-layers me-1"></i> Product Variants (Color & Size)</span>
                            <button type="button" class="btn btn-sm btn-success add-variant rounded-pill px-3"><i class="fa fa-plus me-1"></i> Add New Variant</button>
                        </div>

                        <div id="variant-wrapper">
                            <?php
                                // Group variants by color_id, then by size_id
                                // First, group by color_id (including null colors)
                                $groupedByColor = $edit_data->variantPrices->groupBy(function($variant) {
                                    return $variant->color_id ?? 'no_color';
                                });
                                $variantIndex = 0;
                            ?>
                            
                            <?php $__empty_1 = true; $__currentLoopData = $groupedByColor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colorId => $variantsForColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    // Get all size IDs for this color group
                                    $sizeIds = $variantsForColor->pluck('size_id')->filter()->toArray();
                                    $firstVariant = $variantsForColor->first();
                                ?>
                                <div class="variant-card variant-item">
                                    <div class="row align-items-end">
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Color</label>
                                            <select name="variant_price[<?php echo e($variantIndex); ?>][color_id]" class="form-control select2 variant-color-select">
                                                <option value="">Select Color (Optional)</option>
                                                <?php $__currentLoopData = $totalcolors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($color->id); ?>" <?php echo e($colorId == $color->id ? 'selected' : ''); ?>>
                                                        <?php echo e($color->colorName ?? $color->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Size</label>
                                            <select name="variant_price[<?php echo e($variantIndex); ?>][size_id][]" class="form-control select2 variant-size-select" multiple>
                                                <?php $__currentLoopData = $totalsizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($size->id); ?>" <?php echo e(in_array($size->id, $sizeIds) ? 'selected' : ''); ?>>
                                                        <?php echo e($size->sizeName ?? $size->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Price</label>
                                            <input type="number" step="0.01" name="variant_price[<?php echo e($variantIndex); ?>][price]"
                                                   value="<?php echo e($firstVariant->price); ?>" class="form-control" placeholder="Enter Price">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Stock</label>
                                            <input type="number" name="variant_price[<?php echo e($variantIndex); ?>][stock]"
                                                   value="<?php echo e($firstVariant->stock); ?>" class="form-control" placeholder="0">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Variant Image</label>
                                            <?php
                                                $variantColorId = ($colorId === 'no_color') ? null : $colorId;
                                                $variantImages = $edit_data->images->filter(function($img) use ($variantColorId, $sizeIds) {
                                                    $colorMatch = ($img->color_id == $variantColorId) || (empty($img->color_id) && empty($variantColorId));
                                                    $sizeMatch = empty($sizeIds) ? empty($img->size_id) : in_array($img->size_id, $sizeIds);
                                                    return $colorMatch && $sizeMatch;
                                                })->unique('image');
                                            ?>
                                            <?php if($variantImages->isNotEmpty()): ?>
                                                <div class="variant-existing-imgs d-flex flex-wrap gap-1 mb-2">
                                                    <?php $__currentLoopData = $variantImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="position-relative">
                                                            <img src="<?php echo e(asset($vImg->image)); ?>" class="rounded border" style="width:50px;height:50px;object-fit:cover;" alt="">
                                                            <a href="<?php echo e(route('products.image.destroy', ['id' => $vImg->id])); ?>" class="btn btn-xs btn-danger position-absolute top-0 end-0 rounded-circle" style="padding:0 4px;top:-4px;right:-4px;" onclick="return confirm('Delete this image?')"><i class="mdi mdi-close"></i></a>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="variant-img-upload">
                                                <input type="file" name="variant_image[<?php echo e($variantIndex); ?>][image]" class="form-control form-control-sm variant-img-input" accept="image/*">
                                                <div class="variant-img-preview mt-1" style="display:none;">
                                                    <img src="" alt="Preview" class="rounded border" style="max-width:60px;max-height:60px;object-fit:cover;">
                                                    <button type="button" class="btn btn-sm btn-danger variant-img-clear ms-1" title="Remove"><i class="fe-x"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-1 mb-2 d-flex justify-content-end">
                                            <?php if($loop->first): ?>
                                                <button type="button" class="btn btn-success add-variant" style="margin-top:5px;">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-danger remove-variant" style="margin-top:5px;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <small class="text-muted">
                                                <i class="fa fa-info-circle"></i> 
                                                আপনি শুধু Color, শুধু Size, অথবা Color + Size উভয় add করতে পারবেন
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php $variantIndex++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="variant-card variant-item">
                                    <div class="row align-items-end">
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Color <small class="text-muted">(Optional)</small></label>
                                            <select name="variant_price[0][color_id]" class="form-control select2 variant-color-select">
                                                <option value="">Select Color (Optional)</option>
                                                <?php $__currentLoopData = $totalcolors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($color->id); ?>"><?php echo e($color->colorName ?? $color->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Size <small class="text-muted">(Optional)</small></label>
                                            <select name="variant_price[0][size_id][]" class="form-control select2 variant-size-select" multiple>
                                                <?php $__currentLoopData = $totalsizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($size->id); ?>"><?php echo e($size->sizeName ?? $size->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Price <small class="text-muted">(Optional)</small></label>
                                            <input type="number" step="0.01" name="variant_price[0][price]"
                                                   class="form-control" placeholder="Enter Price">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Stock</label>
                                            <input type="number" name="variant_price[0][stock]" class="form-control" placeholder="0">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Variant Image</label>
                                            <div class="variant-img-upload">
                                                <input type="file" name="variant_image[0][image]" class="form-control form-control-sm variant-img-input" accept="image/*">
                                                <div class="variant-img-preview mt-1" style="display:none;">
                                                    <img src="" alt="Preview" class="rounded border" style="max-width:60px;max-height:60px;object-fit:cover;">
                                                    <button type="button" class="btn btn-sm btn-danger variant-img-clear ms-1" title="Remove"><i class="fe-x"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-1 mb-2 d-flex justify-content-end">
                                            <button type="button" class="btn btn-success add-variant" style="margin-top:5px;">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <small class="text-muted">
                                                <i class="fa fa-info-circle"></i> 
                                                আপনি শুধু Color, শুধু Size, অথবা Color + Size উভয় add করতে পারবেন
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="section-title"><i class="fe-search me-1"></i> SEO Configuration</div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control"
                                       value="<?php echo e($edit_data->meta_title ?? $edit_data->name); ?>"
                                       placeholder="Enter meta title">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                       value="<?php echo e($edit_data->meta_keywords ?? ''); ?>"
                                       placeholder="meta1, meta2, meta3">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control" rows="3"
                                          placeholder="Enter short SEO description..."><?php echo e($edit_data->meta_description ?? \Illuminate\Support\Str::limit(strip_tags($edit_data->description), 160)); ?></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="meta_image" class="form-label">Meta Image (og:image)</label>
                                <input type="file" name="meta_image" id="meta_image" class="form-control">

                                <?php if(!empty($edit_data->meta_image)): ?>
                                    <div class="mt-2">
                                        <img src="<?php echo e(asset($edit_data->meta_image)); ?>" alt="Meta Image"
                                             class="border rounded" width="120">
                                    </div>
                                <?php endif; ?>
                                <small class="text-muted d-block mt-1">Recommended size: 1200x630px</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                
                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="section-title"><i class="fe-dollar-sign me-1"></i> Pricing & Inventory</div>

                        <div class="form-group mb-3">
                            <label for="purchase_price" class="form-label">Purchase Price <small class="text-muted">(Optional)</small></label>
                            <input type="text" class="form-control border-primary <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="purchase_price" value="<?php echo e($edit_data->purchase_price); ?>" id="purchase_price" placeholder="0" />
                            <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="old_price" class="form-label">Old Price</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['old_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="old_price" value="<?php echo e($edit_data->old_price); ?>" id="old_price" />
                                <?php $__errorArgs = ['old_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="new_price" class="form-label">New Price <small class="text-muted">(Optional)</small></label>
                                <input type="text" class="form-control font-weight-bold <?php $__errorArgs = ['new_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="new_price" value="<?php echo e($edit_data->new_price); ?>" id="new_price" placeholder="0" />
                                <?php $__errorArgs = ['new_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="stock" class="form-label">Total Stock <small class="text-muted">(Optional)</small></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="stock" value="<?php echo e($edit_data->stock); ?>" id="stock" placeholder="0" />
                                <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pro_unit" class="form-label">Unit</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['pro_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="pro_unit" value="<?php echo e($edit_data->pro_unit); ?>" id="pro_unit" />
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="brand_id" class="form-label">Brand</label>
                            <select class="form-control select2 <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="brand_id">
                                <option value="">Select..</option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" <?php if($edit_data->brand_id==$value->id): ?> selected <?php endif; ?>>
                                        <?php echo e($value->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="section-title"><i class="fe-image me-1"></i> Media & Video</div>

                        <div class="form-group mb-3">
                            <label class="form-label">Product Gallery Images</label>
                            <div class="increment-wrapper">
                                <div class="control-group increment mb-2 image-row">
                                    <div class="row align-items-end g-2">
                                        <div class="col-md-10">
                                            <label class="form-label small">Image</label>
                                            <input type="file" name="image[]" class="form-control form-control-sm <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*" />
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-success btn-increment btn-sm w-100" type="button"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            
                            <div class="clone hide" style="display: none;">
                                <div class="control-group mt-2 image-row">
                                    <div class="row align-items-end g-2">
                                        <div class="col-md-10">
                                            <label class="form-label small">Image</label>
                                            <input type="file" name="image[]" class="form-control form-control-sm" accept="image/*" />
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger btn-remove-image btn-sm w-100" type="button"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product_img mt-3 d-flex flex-wrap">
                                <?php $__currentLoopData = $edit_data->images->filter(fn($img) => !$img->color_id && !$img->size_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="position-relative me-2 mb-2">
                                        <img src="<?php echo e(asset($image->image)); ?>" class="edit-image border" alt="">
                                        <a href="<?php echo e(route('products.image.destroy',['id'=>$image->id])); ?>"
                                           class="btn btn-xs btn-danger waves-effect waves-light position-absolute top-0 end-0 rounded-circle"
                                           style="padding: 0px 4px; top: -5px; right: -5px;"
                                           onclick="return confirm('Delete this image?')">
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php $colorSizeImages = $edit_data->images->filter(fn($img) => $img->color_id || $img->size_id); ?>
                            <?php if($colorSizeImages->isNotEmpty()): ?>
                            <div class="mt-3">
                                <label class="form-label small text-muted">Color/Size Images</label>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php $__currentLoopData = $colorSizeImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="position-relative">
                                            <img src="<?php echo e(asset($img->image)); ?>" class="edit-image border" alt="">
                                            <span class="badge bg-info position-absolute bottom-0 start-0" style="font-size:9px;">
                                                <?php echo e($img->color ? ($img->color->colorName ?? $img->color->name) : '-'); ?> / <?php echo e($img->size ? ($img->size->sizeName ?? $img->size->name) : '-'); ?>

                                            </span>
                                            <a href="<?php echo e(route('products.image.destroy',['id'=>$img->id])); ?>" class="btn btn-xs btn-danger position-absolute top-0 end-0 rounded-circle" style="padding:0 4px;top:-5px;right:-5px;" onclick="return confirm('Delete?')"><i class="mdi mdi-close"></i></a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        
                        <?php
                            $existingVideoType = $edit_data->pro_video_type ?? ($edit_data->pro_video ? 'youtube' : null);
                        ?>
                        <div class="form-group mb-0">
                            <label class="form-label fw-semibold">প্রোডাক্ট ভিডিও</label>
                            <div class="d-flex gap-3 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pro_video_source"
                                           id="vs_yt_e" value="youtube"
                                           <?php echo e($existingVideoType !== 'upload' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="vs_yt_e">
                                        <i class="fa fa-youtube-play text-danger me-1"></i> YouTube লিংক
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pro_video_source"
                                           id="vs_up_e" value="upload"
                                           <?php echo e($existingVideoType === 'upload' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="vs_up_e">
                                        <i class="fa fa-upload text-primary me-1"></i> ভিডিও আপলোড
                                    </label>
                                </div>
                            </div>

                            
                            <div id="yt_section_e" style="<?php echo e($existingVideoType === 'upload' ? 'display:none;' : ''); ?>">
                                <input type="text" name="pro_video" id="pro_video_e"
                                       class="form-control <?php $__errorArgs = ['pro_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e($edit_data->pro_video); ?>"
                                       placeholder="YouTube URL বা Video ID">
                                <?php $__errorArgs = ['pro_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback"><strong><?php echo e($message); ?></strong></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php if($edit_data->pro_video): ?>
                                <div id="yt_preview_e" class="mt-2">
                                    <iframe id="yt_iframe_e" width="100%" height="200"
                                            src="https://www.youtube.com/embed/<?php echo e($edit_data->pro_video); ?>"
                                            frameborder="0" allowfullscreen
                                            style="border-radius:8px;"></iframe>
                                </div>
                                <?php else: ?>
                                <div id="yt_preview_e" class="mt-2" style="display:none;">
                                    <iframe id="yt_iframe_e" width="100%" height="200"
                                            src="" frameborder="0" allowfullscreen
                                            style="border-radius:8px;"></iframe>
                                </div>
                                <?php endif; ?>
                                <small class="text-muted">YouTube full URL অথবা শুধু Video ID উভয়ই চলবে।</small>
                            </div>

                            
                            <div id="up_section_e" style="<?php echo e($existingVideoType === 'upload' ? '' : 'display:none;'); ?>">
                                <?php if($existingVideoType === 'upload' && $edit_data->pro_video_path): ?>
                                <div class="mb-2 p-2 bg-light rounded d-flex align-items-center gap-2">
                                    <i class="fa fa-film text-primary"></i>
                                    <span style="font-size:12px;">বর্তমান ভিডিও: <strong><?php echo e(basename($edit_data->pro_video_path)); ?></strong></span>
                                    <a href="<?php echo e(asset($edit_data->pro_video_path)); ?>" target="_blank"
                                       class="btn btn-xs btn-outline-primary ms-auto" style="font-size:11px;padding:2px 8px;">
                                        <i class="fa fa-play"></i> দেখুন
                                    </a>
                                </div>
                                <?php endif; ?>
                                <input type="file" name="pro_video_file" id="pro_video_file_e"
                                       class="form-control" accept="video/mp4,video/webm,video/ogg">
                                <div id="up_preview_e" class="mt-2" style="display:none;">
                                    <video id="up_video_e" width="100%" height="220" controls
                                           style="border-radius:8px;background:#000;"></video>
                                </div>
                                <small class="text-muted">নতুন ভিডিও বেছে না নিলে পুরনোটাই থাকবে। MP4, WebM, OGG | সর্বোচ্চ 40MB।</small>
                            </div>
                        </div>
                        
                    </div>
                </div>

                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="section-title"><i class="fe-settings me-1"></i> Product Settings</div>

                        <?php
                            $currentType = old('product_type', $edit_data->is_digital ? 'digital' : 'physical');
                            $isDigital   = $currentType === 'digital';
                        ?>

                        <div class="form-group mb-3">
                            <label for="product_type" class="form-label">Product Type</label>
                            <select class="form-control bg-light" id="product_type" name="product_type">
                                <option value="physical" <?php echo e($currentType === 'physical' ? 'selected' : ''); ?>>Physical Product</option>
                                <option value="digital"  <?php echo e($currentType === 'digital'  ? 'selected' : ''); ?>>Digital Product</option>
                            </select>
                        </div>

                        
                        <div id="advance_area" style="<?php echo e($isDigital ? 'display:none;' : 'display:block;'); ?>">
                            <div class="form-group mb-3">
                                <label for="advance_amount" class="form-label">Advance Payment</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['advance_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="advance_amount" id="advance_amount"
                                       value="<?php echo e(old('advance_amount', $edit_data->advance_amount)); ?>" />
                                <?php $__errorArgs = ['advance_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        
                        <div class="form-group mb-3">
                            <label class="form-label">Free Delivery</label>
                            <div class="d-flex align-items-center">
                                <label class="switch me-3">
                                    <input type="checkbox" value="1" name="free_delivery" <?php echo e(old('free_delivery', $edit_data->free_delivery) ? 'checked' : ''); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small class="text-muted">Enable free delivery for this product (No shipping charge will be applied)</small>
                            </div>
                        </div>

                        
                        <div id="digital_area" style="<?php echo e($isDigital ? 'display:block;' : 'display:none;'); ?>" class="p-2 border rounded mb-3 bg-light">
                            <div class="mb-3">
                                <?php if($edit_data->digital_file): ?>
                                    <label class="form-label d-block text-truncate">Current: <code><?php echo e($edit_data->digital_file); ?></code></label>
                                <?php endif; ?>
                                <label for="digital_file" class="form-label">Change Digital File</label>
                                <input type="file" class="form-control" name="digital_file" id="digital_file">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label"><small>Limit</small></label>
                                    <input type="number" class="form-control form-control-sm"
                                           name="download_limit" id="download_limit"
                                           value="<?php echo e(old('download_limit', $edit_data->download_limit ?? 5)); ?>" min="1">
                                </div>
                                <div class="col-6">
                                    <label class="form-label"><small>Days Exp.</small></label>
                                    <input type="number" class="form-control form-control-sm"
                                           name="download_expire_days" id="download_expire_days"
                                           value="<?php echo e(old('download_expire_days', $edit_data->download_expire_days ?? 7)); ?>" min="1">
                                </div>
                            </div>
                        </div>

                        
                        <div class="card mb-3" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px;">
                            <div class="card-body p-3 text-start">
                                <label class="form-label font-weight-bold mb-2 text-dark" style="font-size: 13.5px;"><i class="fe-layout me-1 text-primary"></i> Homepage Display Sections</label>
                                <small class="text-muted d-block mb-3">হোমপেজের যে সেকশনে প্রোডাক্টটি দেখাতে চান তা ON করুন:</small>
                                
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="p-2 bg-white border rounded d-flex align-items-center justify-content-between">
                                            <span style="font-size: 12px; font-weight: 600; color: #334155;"><i class="fa fa-star text-warning me-1"></i> Featured</span>
                                            <label class="switch mb-0">
                                                <input type="checkbox" value="1" name="feature_product" <?php echo e(old('feature_product', $edit_data->feature_product ?? 0) ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white border rounded d-flex align-items-center justify-content-between">
                                            <span style="font-size: 12px; font-weight: 600; color: #334155;"><i class="fa fa-heart text-danger me-1"></i> Pet Treats</span>
                                            <label class="switch mb-0">
                                                <input type="checkbox" value="1" name="is_treats" <?php echo e(old('is_treats', $edit_data->is_treats ?? 0) ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white border rounded d-flex align-items-center justify-content-between">
                                            <span style="font-size: 12px; font-weight: 600; color: #334155;"><i class="fa fa-bolt text-success me-1"></i> Hot Deal</span>
                                            <label class="switch mb-0">
                                                <input type="checkbox" value="1" name="topsale" <?php echo e(old('topsale', $edit_data->topsale ?? 0) ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white border rounded d-flex align-items-center justify-content-between">
                                            <span style="font-size: 12px; font-weight: 600; color: #334155;"><i class="fa fa-fire text-primary me-1"></i> Flash Sale</span>
                                            <label class="switch mb-0">
                                                <input type="checkbox" value="1" name="flashsale" <?php echo e(old('flashsale', $edit_data->flashsale ?? 0) ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white border rounded d-flex align-items-center justify-content-between">
                                            <span style="font-size: 12px; font-weight: 600; color: #334155;"><i class="fa fa-tint text-info me-1"></i> Wet Food</span>
                                            <label class="switch mb-0">
                                                <input type="checkbox" value="1" name="is_wet_food" <?php echo e(old('is_wet_food', $edit_data->is_wet_food ?? 0) ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white border rounded d-flex align-items-center justify-content-between">
                                            <span style="font-size: 12px; font-weight: 600; color: #334155;"><i class="fa fa-cookie-bite text-warning me-1"></i> Dry Food</span>
                                            <label class="switch mb-0">
                                                <input type="checkbox" value="1" name="is_dry_food" <?php echo e(old('is_dry_food', $edit_data->is_dry_food ?? 0) ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white border rounded d-flex align-items-center justify-content-between">
                                            <span style="font-size: 12px; font-weight: 600; color: #334155;"><i class="fa fa-heartbeat text-danger me-1"></i> Pet Care</span>
                                            <label class="switch mb-0">
                                                <input type="checkbox" value="1" name="is_pet_care" <?php echo e(old('is_pet_care', $edit_data->is_pet_care ?? 0) ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white border rounded d-flex align-items-center justify-content-between">
                                            <span style="font-size: 12px; font-weight: 600; color: #334155;"><i class="fa fa-trophy text-warning me-1"></i> Best Seller</span>
                                            <label class="switch mb-0">
                                                <input type="checkbox" value="1" name="is_bestseller" <?php echo e(old('is_bestseller', $edit_data->is_bestseller ?? 0) ? 'checked' : ''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row text-center mb-3 align-items-center">
                            <div class="col-6 mb-2">
                                <label for="status" class="d-block form-label">Status (Active)</label>
                                <label class="switch">
                                    <input type="checkbox" value="1" name="status" <?php if($edit_data->status==1): ?> checked <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>

                            <div class="col-6 mb-2 text-start">
                                <label for="sold" class="form-label">Sold Count</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['sold'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="sold" value="<?php echo e($edit_data->sold); ?>" id="sold" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 shadow rounded-pill"><i class="fe-check-circle me-1"></i> Update Product</button>

                    </div>
                </div>
            </div>
            </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/pages/form-validation.init.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/select2/js/select2.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/pages/form-advanced.init.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs//summernote/summernote-lite.min.js"></script>

<script>
    $(".summernote").summernote({
        placeholder: "Enter Your Text Here",
    });
</script>

<script>
    $(document).ready(function () {
        // Gallery image add
        $(".increment-wrapper .btn-increment").click(function () {
            var html = $(".clone").html();
            $(".increment-wrapper").append(html);
        });
        $("body").on("click", ".btn-remove-image", function () {
            $(this).parents(".control-group").remove();
        });

        $(".select2").select2();
    });
</script>

<script>
    // Category to subcategory & childcategory
    $("#category_id").on("change", function () {
        var ajaxId = $(this).val();
        if (ajaxId) {
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('ajax-product-subcategory')); ?>?category_id=" + ajaxId,
                success: function (res) {
                    if (res) {
                        $("#subcategory_id").empty();
                        $("#subcategory_id").append('<option value="0">Choose...</option>');
                        $.each(res, function (key, value) {
                            $("#subcategory_id").append('<option value="' + key + '">' + value + "</option>");
                        });
                    } else {
                        $("#subcategory_id").empty();
                    }
                },
            });
        } else {
            $("#subcategory_id").empty();
        }
    });

    $("#subcategory_id").on("change", function () {
        var ajaxId = $(this).val();
        if (ajaxId) {
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('ajax-product-childcategory')); ?>?subcategory_id=" + ajaxId,
                success: function (res) {
                    if (res) {
                        $("#childcategory_id").empty();
                        $("#childcategory_id").append('<option value="0">Choose...</option>');
                        $.each(res, function (key, value) {
                            $("#childcategory_id").append('<option value="' + key + '">' + value + "</option>");
                        });
                    } else {
                        $("#childcategory_id").empty();
                    }
                },
            });
        } else {
            $("#childcategory_id").empty();
        }
    });

    // Set selected values on load
    document.forms["editForm"].elements["category_id"].value = "<?php echo e($edit_data->category_id); ?>";
    document.forms["editForm"].elements["subcategory_id"].value = "<?php echo e($edit_data->subcategory_id); ?>";
    document.forms["editForm"].elements["childcategory_id"].value = "<?php echo e($edit_data->childcategory_id); ?>";
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    let variantIndex = <?php echo e($edit_data->variantPrices->count() ?? 1); ?>;
    
    // Initialize Select2 with multiple for size
    $('.variant-size-select').select2({
        multiple: true,
        width: '100%'
    });
    
    $('.variant-color-select').select2({
        width: '100%'
    });

    // Add new variant row
    document.body.addEventListener('click', function (e) {
        const target = e.target.closest('.add-variant, .remove-variant');
        if (!target) return;

        if (target.classList.contains('add-variant')) {
            const wrapper = document.getElementById('variant-wrapper');
            const firstRow = wrapper.querySelector('.variant-item');
            if (!firstRow) return;

            const newRow = $(firstRow.cloneNode(true));
            newRow.find('.select2-container').remove();

            newRow.find('.variant-existing-imgs').remove();
            newRow.find('input, select').each(function () {
                const oldName = $(this).attr('name');
                if (oldName) {
                    if (oldName.includes('[size_id][]')) {
                        $(this).attr('name', 'variant_price[' + variantIndex + '][size_id][]');
                    } else if (oldName.includes('variant_image')) {
                        $(this).attr('name', 'variant_image[' + variantIndex + '][image]');
                    } else {
                        $(this).attr('name', oldName.replace(/\[\d+\]/, '[' + variantIndex + ']'));
                    }
                }
                if ($(this).attr('type') === 'file') {
                    $(this).val('');
                    $(this).siblings('.variant-img-preview').hide().find('img').attr('src', '');
                } else if ($(this).is('input')) $(this).val('');
                else if ($(this).is('select')) $(this).val(null).trigger('change');
            });

            newRow.find('.add-variant')
                .removeClass('btn-success add-variant')
                .addClass('btn-danger remove-variant')
                .html('<i class="fa fa-trash"></i>');

            newRow.appendTo(wrapper);

            // Reinitialize Select2 for new row
            setTimeout(() => {
                newRow.find('.variant-size-select').select2({
                    multiple: true,
                    width: '100%',
                    dropdownParent: $('#variant-wrapper')
                });
                newRow.find('.variant-color-select').select2({
                    width: '100%',
                    dropdownParent: $('#variant-wrapper')
                });
            }, 100);

            variantIndex++;
        }

        if (target.classList.contains('remove-variant')) {
            target.closest('.variant-item').remove();
        }
    });

    // Variant Image Preview & Clear
    $(document).on('change', '.variant-img-input', function() {
        var $input = $(this);
        var $preview = $input.siblings('.variant-img-preview');
        var $img = $preview.find('img');
        var file = this.files[0];
        if (file && file.type.startsWith('image/')) {
            var reader = new FileReader();
            reader.onload = function(e) { $img.attr('src', e.target.result); $preview.show(); };
            reader.readAsDataURL(file);
        } else { $preview.hide(); $img.attr('src', ''); }
    });
    $(document).on('click', '.variant-img-clear', function() {
        var $preview = $(this).closest('.variant-img-preview');
        $preview.siblings('.variant-img-input').val('');
        $preview.find('img').attr('src', '');
        $preview.hide();
    });
    
    // Handle form submission - expand multiple sizes into separate entries
    $('form[name="editForm"]').on('submit', function(e) {
        let formData = new FormData(this);
        let variantData = [];
        let variantIndex = 0;
        let rowIndex = 0;
        
            $('#variant-wrapper .variant-item').each(function() {
                let $row = $(this);
                let colorId = $row.find('.variant-color-select').val() || null;
                let selectedSizes = $row.find('.variant-size-select').val() || [];
                let price = $row.find('input[name*="[price]"]').val() || 0;
                let stock = $row.find('input[name*="[stock]"]').val() || 0;
                
                // Validate: At least color or size must be selected
                if (!colorId && selectedSizes.length === 0) {
                    // Skip if neither color nor size is selected
                    return;
                }
                
                // If sizes are selected, create separate entry for each size
                if (selectedSizes.length > 0) {
                    selectedSizes.forEach(function(sizeId) {
                        variantData.push({ index: variantIndex++, color_id: colorId, size_id: sizeId, price: price, stock: stock, image_row: rowIndex });
                    });
                } else {
                    variantData.push({ index: variantIndex++, color_id: colorId, size_id: null, price: price, stock: stock, image_row: rowIndex });
                }
                rowIndex++;
            });
        
        $(this).find('input[name*="variant_price"]:not([type="file"]), select[name*="variant_price"]').remove();
        
        // Add new hidden inputs for each variant
        variantData.forEach(function(variant) {
            $('<input>').attr({
                type: 'hidden',
                name: 'variant_price[' + variant.index + '][color_id]',
                value: variant.color_id
            }).appendTo($('form[name="editForm"]'));
            
            $('<input>').attr({
                type: 'hidden',
                name: 'variant_price[' + variant.index + '][size_id]',
                value: variant.size_id
            }).appendTo($('form[name="editForm"]'));
            
            $('<input>').attr({
                type: 'hidden',
                name: 'variant_price[' + variant.index + '][price]',
                value: variant.price
            }).appendTo($('form[name="editForm"]'));
            
            $('<input>').attr({
                type: 'hidden',
                name: 'variant_price[' + variant.index + '][stock]',
                value: variant.stock
            }).appendTo($('form[name="editForm"]'));
            
            $('<input>').attr({
                type: 'hidden',
                name: 'variant_price[' + variant.index + '][image_row]',
                value: variant.image_row
            }).appendTo($('form[name="editForm"]'));
        });
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    function toggleFields() {
        let type = document.getElementById('product_type').value;
        if (type === 'digital') {
            document.getElementById('digital_area').style.display = 'block';
            document.getElementById('advance_area').style.display = 'none';
        } else {
            document.getElementById('digital_area').style.display = 'none';
            document.getElementById('advance_area').style.display = 'block';
        }
    }

    document.getElementById('product_type').addEventListener('change', toggleFields);
    
    // Wholesale toggle
    document.getElementById('is_wholesale').addEventListener('change', function() {
        var wholesaleArea = document.getElementById('wholesale_area');
        if (this.checked) {
            wholesaleArea.style.display = 'block';
            wholesaleArea.querySelectorAll('input').forEach(function(input) {
                input.setAttribute('required', 'required');
            });
        } else {
            wholesaleArea.style.display = 'none';
            wholesaleArea.querySelectorAll('input').forEach(function(input) {
                input.removeAttribute('required');
            });
        }
    });
    toggleFields(); // initial
    // Wholesale pricing tiers
    let wholesaleIndex = <?php echo e(($wholesalePrices && $wholesalePrices->count() > 0) ? $wholesalePrices->count() : 1); ?>;
    $('.add-wholesale-tier').on('click', function() {
        let wrapper = $('#wholesale-wrapper');
        let firstRow = wrapper.find('.variant-card').first().clone();
        
        firstRow.find('input').each(function(){
            let oldName = $(this).attr('name');
            $(this).attr('name', oldName.replace(/\[\d+\]/, '[' + wholesaleIndex + ']'));
            $(this).val('');
        });

        firstRow.find('.btn-remove-wholesale').removeClass('d-none');
        wrapper.append(firstRow);
        wholesaleIndex++;
    });
    
    $("body").on("click", ".btn-remove-wholesale", function () {
        $(this).parents(".variant-card").remove();
    });

    // Variant Image Add/Remove
    let variantImgIndex = 1;
    $(".add-variant-image").click(function () {
        let wrapper = $("#variant-image-wrapper");
        let firstRow = wrapper.find(".variant-image-row").first().clone();
        firstRow.find('.select2-container').remove();
        firstRow.find('input[type="file"]').val('');
        firstRow.find('select').each(function(){
            let name = $(this).attr('name');
            if (name) $(this).attr('name', name.replace(/\[\d+\]/, '[' + variantImgIndex + ']'));
            $(this).val(null);
        });
        firstRow.find('input[type="file"]').each(function(){
            let name = $(this).attr('name');
            if (name) $(this).attr('name', name.replace(/\[\d+\]/, '[' + variantImgIndex + ']'));
        });
        firstRow.find('.btn-remove-variant-img').show();
        wrapper.append(firstRow);
        firstRow.find('.variant-img-color, .variant-img-size').select2({ width: '100%' });
        variantImgIndex++;
    });
    $("body").on("click", ".btn-remove-variant-img", function () {
        $(this).closest(".variant-image-row").remove();
    });
});

// ===== VIDEO SOURCE SWITCHER (Edit) =====
(function () {
    var radios = document.querySelectorAll('input[name="pro_video_source"]');
    var ytSec  = document.getElementById('yt_section_e');
    var upSec  = document.getElementById('up_section_e');

    function switchVideo(val) {
        if (val === 'upload') {
            if (ytSec) ytSec.style.display = 'none';
            if (upSec) upSec.style.display = '';
        } else {
            if (ytSec) ytSec.style.display = '';
            if (upSec) upSec.style.display = 'none';
        }
    }

    radios.forEach(function (r) {
        r.addEventListener('change', function () { switchVideo(this.value); });
    });

    // YouTube live preview
    var ytInput = document.getElementById('pro_video_e');
    if (ytInput) {
        ytInput.addEventListener('input', function () {
            var val = this.value.trim();
            var id  = extractYtId(val);
            var box = document.getElementById('yt_preview_e');
            var fr  = document.getElementById('yt_iframe_e');
            if (id && box && fr) {
                fr.src = 'https://www.youtube.com/embed/' + id;
                box.style.display = '';
            } else if (box && fr) {
                fr.src = '';
                box.style.display = 'none';
            }
        });
    }

    // Upload local preview
    var upInput = document.getElementById('pro_video_file_e');
    if (upInput) {
        upInput.addEventListener('change', function () {
            var file = this.files[0];
            var box  = document.getElementById('up_preview_e');
            var vid  = document.getElementById('up_video_e');
            if (file && box && vid) {
                vid.src = URL.createObjectURL(file);
                box.style.display = '';
            }
        });
    }

    function extractYtId(input) {
        if (!input) return null;
        if (/^[a-zA-Z0-9_-]{11}$/.test(input)) return input;
        var m = input.match(/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
        return m ? m[1] : null;
    }
})();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Programming capture\New folder\E-Commerce2\ecommerce2\resources\views/backEnd/product/edit.blade.php ENDPATH**/ ?>