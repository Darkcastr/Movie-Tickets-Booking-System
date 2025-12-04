<?php $__env->startSection('content'); ?>
<h1><?php echo e($movie->title); ?></h1>
<p><?php echo e($movie->description); ?></p>
<h3>Showtimes</h3>
<?php $__currentLoopData = $showtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($showtime->start_time); ?> at <?php echo e($showtime->theater); ?></p>
    <a href="/bookings/create/<?php echo e($showtime->id); ?>" class="btn btn-success">Book Now</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\movie-booking\resources\views/movies/show.blade.php ENDPATH**/ ?>