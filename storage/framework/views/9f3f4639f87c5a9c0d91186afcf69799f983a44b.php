<?php $__env->startSection('content'); ?>
<?php if(!empty($tag)): ?>
<?php echo e(Breadcrumbs::render('admin.tags_edit', $tag)); ?>

<?php else: ?>
<?php echo e(Breadcrumbs::render('admin.tags_add')); ?>

<?php endif; ?>

<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            <?php if($method=='add'): ?>
            <h4 class="title">Nuova Tag</h4>
            <?php else: ?>
            <h4 class="title">Modifica Tag (ID <?php echo e($tag->id); ?>)</h4>
            <?php endif; ?>
            <form action="<?php echo e(route('admin.tags_store')); ?>" method="post">
                <?php if(!empty($tag)): ?><input type="hidden" name="id" value="<?php echo e($tag->id); ?>" /><?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="field">
                    <label for="title" class="label">Titolo</label>
                    <div class="control">
                        <input type="text" id="title" name="title" value="<?php echo e(old('title') ? old('title') : (!empty($tag->title) ? $tag->title : '')); ?>" class="input">
                    </div>
                    <p class="help is-danger"><?php echo e($errors->first('title')); ?></p>
                </div>

                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a href="<?php echo e(route('admin.tags_index')); ?>" class="button is-icon"><i class="mdi mdi-24px mdi-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <div class="field is-grouped">
                                <div class="control"><button type="reset" class="button is-primary">Annulla</button></div>
                                <div class="control"><button type="submit" name="save_and_edit" class="button is-primary">Salva e Continua</button></div>
                                <div class="control"><button type="submit" name="save_and_index" class="button is-primary">Salva</button></div>
                            </div>
                        </div>
                    </div>
                </nav>

            </form>
        </article>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>