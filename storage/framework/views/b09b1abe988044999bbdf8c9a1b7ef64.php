<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Booking Details</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($booking->showtime->movie->title); ?></h5>
            <p class="card-text">
                <strong>Seat:</strong> <?php echo e($booking->seat); ?><br>
                <strong>Showtime:</strong> <?php echo e($booking->showtime->start_time); ?><br>
                <strong>Theater:</strong> <?php echo e($booking->showtime->theater); ?><br>
                <strong>Movie Description:</strong> <?php echo e($booking->showtime->movie->description); ?><br>
                <strong>Duration:</strong> <?php echo e($booking->showtime->movie->duration); ?> minutes
            </p>
            <a href="/my-bookings" class="btn btn-secondary">Back to My Bookings</a>
            <form action="/bookings/<?php echo e($booking->id); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Cancel this booking?')">Cancel Booking</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\movie-booking\resources\views/bookings/show.blade.php ENDPATH**/ ?>