<?php $__env->startSection('content'); ?>
<style>
    .card {
        background: rgba(0, 0, 0, 0.8) !important;
        color: #fff !important;
    }
    .card-body h5, .card-body p {
        color: #fff !important;
    }
</style>
<h1>Movies</h1>
<?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5><?php echo e($movie->title); ?></h5>
            <p><?php echo e($movie->description); ?></p>
            <a href="/movies/<?php echo e($movie->id); ?>" class="btn btn-primary">View Showtimes</a>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\movie-booking\resources\views/movies/index.blade.php ENDPATH**/ ?>