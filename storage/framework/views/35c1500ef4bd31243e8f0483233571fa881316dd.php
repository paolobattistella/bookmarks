<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="box">
        <div class="field has-addons">
            <div class="control is-expanded">
                <input class="input has-text-centered" type="search" placeholder="» » » » » scrivi qualcosa « « « « «">
            </div>
            <div class="control">
                <a class="button is-info">Cerca</a>
            </div>
        </div>
    </div>

    <?php if($bookmarks->count() > 0): ?>
    <div class="tile is-ancestor">
        <?php $__currentLoopData = $bookmarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookmark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tile is-3 is-parent">
            <article class="tile is-child box">
                <figure class="image">
                    <img width="240" src="https://images.unsplash.com/photo-1475778057357-d35f37fa89dd?dpr=1&auto=compress,format&fit=crop&w=1920&h=&q=80&cs=tinysrgb&crop=" alt="Image">
                </figure>
                <p class="title is-4 no-padding"><?php echo e($bookmark->title); ?> <a href="<?php echo e(route('admin.bookmarks_goto', ['id' => $bookmark->id])); ?>"><i class="mdi mdi-24px mdi-open-in-new"></i></a></p>
                <p class="subtitle is-6"><?php echo e($bookmark->category->title); ?></p>
                <?php if(sizeof($bookmark->tags)>0): ?>
                <div class="field is-grouped is-grouped-multiline">
                    <?php $__currentLoopData = $bookmark->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="control">
                        <a class="tag is-link"><?php echo e($tag->title); ?></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </article>
        </div>
        <?php if(($loop->iteration % 4) == 0): ?>
    </div><div class="tile is-ancestor">
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>