<?php $__env->startSection('content'); ?>
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">Welcome to Movie Booking!</h1>
        <p class="lead mb-4">Book tickets for the latest movies easily. Browse showtimes and reserve your seats now.</p>

        <div class="d-flex justify-content-center flex-wrap gap-2 mb-5">
            <?php if(Session::has('user_id')): ?>
                <a href="/movies" class="btn btn-primary btn-lg px-4 py-2">
                    <i class="bi bi-film"></i> Browse Movies
                </a>
                <a href="/my-bookings" class="btn btn-outline-light btn-lg px-4 py-2">
                    <i class="bi bi-ticket-perforated"></i> My Bookings
                </a>
            <?php else: ?>
                <a href="/movies" class="btn btn-primary btn-lg px-4 py-2">
                    <i class="bi bi-film"></i> Browse Movies
                </a>
                <a href="/login" class="btn btn-outline-light btn-lg px-4 py-2">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
                <a href="/register" class="btn btn-outline-light btn-lg px-4 py-2">
                    <i class="bi bi-person-plus"></i> Register
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container my-5">
    <h3 class="text-center mb-4 fw-bold">Featured Movies</h3>
    <p class="text-center text-muted mb-4">Check out our latest releases!</p>

    <?php
        $featuredMovies = App\Models\Movie::take(3)->get();
    ?>

    <?php if($featuredMovies->isEmpty()): ?>
        <p class="text-center text-muted">No featured movies available at the moment.</p>
    <?php else: ?>
        <div class="row g-4 justify-content-center">
            <?php $__currentLoopData = $featuredMovies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                        <img src="<?php echo e($movie->image ?? 'https://via.placeholder.com/300x200?text=Movie+Poster'); ?>"
                             class="card-img-top" alt="<?php echo e($movie->title); ?> Poster" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?php echo e($movie->title); ?></h5>
                            <p class="card-text text-muted flex-grow-1"><?php echo e(Str::limit($movie->description, 100)); ?></p>
                            <?php if(isset($movie->genre)): ?>
                                <small class="text-primary mb-2"><i class="bi bi-tag"></i> <?php echo e($movie->genre); ?></small>
                            <?php endif; ?>
                            <?php if(isset($movie->rating)): ?>
                                <small class="text-warning mb-3">
                                    <i class="bi bi-star-fill"></i> <?php echo e($movie->rating); ?>/10
                                </small>
                            <?php endif; ?>
                            <a href="/movies/<?php echo e($movie->id); ?>" class="btn btn-primary mt-auto">
                                <i class="bi bi-eye"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\movie-booking\resources\views/home.blade.php ENDPATH**/ ?>