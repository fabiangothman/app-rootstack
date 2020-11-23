 <?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Subcategories')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-4 py-5 bg-white sm:p-6">

                    <h1>SUBCATEGORIES LIST</h1>
                    <a href="<?php echo e(route('subcategories.create')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Create
                    </a>

                    <div class="my-5">
                        <?php echo e($subcategories->links()); ?>

                    </div>

                    <div class="list">
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="my-5">
                                <a href="<?php echo e(route('subcategories.show', $subcategory)); ?>">
                                    <div class="px-4 py-5 sm:p-6 bg-gray-100 shadow sm:rounded-lg">
                                        <div>
                                            <strong>Name: </strong><?php echo e($subcategory->name); ?>

                                        </div>
                                        <div>
                                            <strong>Slug: </strong><?php echo e($subcategory->slug); ?>

                                        </div>
                                        <div>
                                            <strong>description: </strong><?php echo e($subcategory->description); ?>

                                        </div>
                                        <div>
                                            <strong>Category: </strong><?php echo e($subcategory->category_id); ?>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH C:\xampp\htdocs\app-rootstack\resources\views/subcategories/index.blade.php ENDPATH**/ ?>