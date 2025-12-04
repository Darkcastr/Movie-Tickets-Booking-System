<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>My Bookings</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($bookings->isEmpty()): ?>
        <p>You have no bookings yet. <a href="/movies">Browse movies</a> to book one!</p>
    <?php else: ?>
        <div class="row">
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($booking->showtime->movie->title); ?></h5>
                            <p class="card-text">
                                <strong>Seat:</strong> <?php echo e($booking->seat); ?><br>
                                <strong>Showtime:</strong> <?php echo e($booking->showtime->start_time); ?><br>
                                <strong>Movie:</strong> <?php echo e($booking->showtime->movie->description); ?>

                            </p>
                            <a href="/bookings/<?php echo e($booking->id); ?>" class="btn btn-info">View Details</a>
                            <form action="/bookings/<?php echo e($booking->id); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Cancel this booking?')">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    <a href="/movies" class="btn btn-primary mt-3">Back to Movies</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\movie-booking\resources\views/bookings/index.blade.php ENDPATH**/ ?>