<?php $__env->startSection('content'); ?>
<h1>Book Seats for <?php echo e($showtime->movie->title); ?></h1>
<form method="POST" action="/bookings">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="showtime_id" value="<?php echo e($showtime->id); ?>">
    <label>Select Seat:</label>
    <select name="seat" class="form-control">
        <?php $__currentLoopData = $availableSeats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!in_array($seat, $bookedSeats)): ?>
                <option value="<?php echo e($seat); ?>"><?php echo e($seat); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button type="submit" class="btn btn-primary mt-2">Book</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\movie-booking\resources\views/bookings/create.blade.php ENDPATH**/ ?>