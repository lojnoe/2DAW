<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('description', $description); ?>

<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php echo $__env->make('_item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($threads->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\AlumnoT\Desktop\Manu\2DAW\ProyectoBaseDatos\resources\views/list.blade.php ENDPATH**/ ?>