<?php $__env->startSection('content'); ?>
<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            <?php if($method=='add'): ?>
            <h4 class="title">Nuova Categoria</h4>
            <?php else: ?>
            <h4 class="title">Modifica Categoria (ID <?php echo e($category->id); ?>)</h4>
            <?php endif; ?>

            <form action="<?php echo e(route('categories_edit', ['id' => $category->id])); ?>">
                <div class="field">
                    <label class="label">Titolo</label>
                    <div class="control">
                        <input class="input" type="text" value="<?php echo e($category->title); ?>">
                    </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <a href="<?php echo e(route('categories_index')); ?>" class="button is-text">Indietro</a>
                    </div>
                    <div class="control">
                        <button type="reset" class="button is-primary">Annulla</button>
                    </div>
                    <div class="control">
                        <button type="submit" name="save_continue" class="button is-primary">Salva e Continua</button>
                    </div>
                    <div class="control">
                        <button type="submit" name="save_index" class="button is-primary">Salva</button>
                    </div>
                </div>
            </form>
        </article>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>