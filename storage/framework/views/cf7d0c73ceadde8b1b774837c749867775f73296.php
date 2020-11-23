 <?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.welcome','data' => []]); ?>
<?php $component->withName('jet-welcome'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> -->
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur quia modi nihil et architecto alias assumenda quibusdam numquam animi beatae, autem sit incidunt nulla esse nemo iure tempora ducimus officiis!</p>
                <p>Odio iusto dolore numquam soluta ad, laboriosam eaque minus vitae nostrum reprehenderit qui corporis corrupti molestiae aspernatur repellat aperiam id. Aliquid culpa ab labore, rem doloribus tempore officiis adipisci exercitationem.</p>
                <p>Et natus excepturi hic sapiente reiciendis provident explicabo, perferendis obcaecati tempora voluptatem similique. Rem, porro itaque soluta labore aperiam voluptatibus, ipsum ea molestiae ratione, quidem laudantium sunt dolorum eaque officiis.</p>
                <p>Laborum ea quis consectetur quidem illo sequi ut autem exercitationem laudantium odit neque voluptatem repellat inventore excepturi vel tempore suscipit pariatur delectus nostrum totam placeat, fugit quo quisquam porro! Optio.</p>
                <p>Incidunt expedita assumenda dolores accusamus omnis eligendi qui molestias saepe quo quidem provident ut maiores perferendis quisquam, delectus quibusdam voluptate accusantium ipsam sit voluptatibus. Aperiam, cum? Deserunt omnis eaque consectetur?</p>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH C:\xampp\htdocs\app-rootstack\resources\views/dashboard.blade.php ENDPATH**/ ?>