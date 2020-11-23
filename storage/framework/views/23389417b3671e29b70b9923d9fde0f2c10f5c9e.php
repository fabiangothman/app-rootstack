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
                    <div class="my-5">
                        <a href="<?php echo e(route('subcategories.index')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Return to list
                        </a>
                        <a href="<?php echo e(route('subcategories.edit', $subcategory)); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </a>
                    </div>                    

                    <h1><strong><?php echo e($subcategory->name); ?></strong></h1>                
                    <div class="px-4 py-5 sm:p-6 bg-gray-100 shadow sm:rounded-lg">
                        <div>
                            <strong>Slug: </strong><?php echo e($subcategory->slug); ?>

                        </div>
                        <div>
                            <strong>description: </strong><?php echo e($subcategory->description); ?>

                        </div>
                        <div class="my-5">
                            <div>
                                <strong>Category: </strong>
                            </div>
                            <div class="my-5">
                                <div class="ml-5 my-2">
                                    <a href="<?php echo e(route('categories.show', $subcategory->category)); ?>"><?php echo e($subcategory->category->name); ?></a>
                                </div>
                            </div>
                            <a href="<?php echo e(route('advertisements.subcategory', $subcategory)); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                See all subcategory Advertisements
                            </a>
                        </div>
                    </div>

                    <div class="my-6">
                        <form action="<?php echo e(route('subcategories.destroy', $subcategory)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Delete</button>
                        </form>
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
<?php endif; ?> <?php /**PATH C:\xampp\htdocs\app-rootstack\resources\views/subcategories/show.blade.php ENDPATH**/ ?>