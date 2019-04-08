<?php $__env->startSection('content'); ?>
<?php if(!empty($bookmark)): ?>
<?php echo e(Breadcrumbs::render('admin.bookmarks_edit', $bookmark)); ?>

<?php else: ?>
<?php echo e(Breadcrumbs::render('admin.bookmarks_add')); ?>

<?php endif; ?>

<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            <?php if($method=='add'): ?>
            <h4 class="title">Nuovo segnalibro</h4>
            <?php else: ?>
            <h4 class="title">Modifica segnalibro (ID <?php echo e($bookmark->id); ?>)</h4>
            <?php endif; ?>
            <form action="<?php echo e(route('admin.bookmarks_store')); ?>" method="post">
                <?php if(!empty($bookmark)): ?><input type="hidden" name="id" value="<?php echo e($bookmark->id); ?>" /><?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="field">
                    <label for="title" class="label">Titolo</label>
                    <div class="control">
                        <input type="text" id="title" name="title" value="<?php echo e(old('title') ? old('title') : (!empty($bookmark->title) ? $bookmark->title : '')); ?>" class="input">
                    </div>
                    <p class="help is-danger"><?php echo e($errors->first('title')); ?></p>
                </div>
                <div class="field">
                    <label for="url" class="label">URL</label>
                    <div class="control">
                        <input type="text" id="url" name="url" value="<?php echo e(old('url') ? old('url') : (!empty($bookmark->url) ? $bookmark->url : '')); ?>" class="input">
                    </div>
                    <p class="help is-danger"><?php echo e($errors->first('url')); ?></p>
                </div>
                <div class="field">
                    <label for="description" class="label">Descrizione</label>
                    <div class="control">
                        <textarea id="description" name="description" class="textarea"><?php echo e(old('description') ? old('description') : (!empty($bookmark->description) ? $bookmark->description : '')); ?></textarea>
                    </div>
                    <p class="help is-danger"><?php echo e($errors->first('description')); ?></p>
                </div>
                <div class="field">
                    <label for="description" class="label">Categoria</label>
                    <div class="select">
                        <select id="category_id" name="category_id">
                            <option>nessuna categoria</option>
                            <?php if(!empty($categories)): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e((old('category_id') && $category->id==old('category_id')) ? 'selected' : ((!empty($bookmark) && $category->id == $bookmark->category_id) ? 'selected' : '')); ?>><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="tags" class="label">Tag</label>
                    <div class="control">
                        
                        <tag-multiselect :selected="<?php echo e($bookmark->tags); ?>"></tag-multiselect>
                        <?php echo e($bookmark->tags); ?>

                    </div>
                </div>
                <!--<div class="field">
                    <label class="checkbox">
                        <input type="checkbox" id="public" name="public" value="<?php echo e(old('title') ? old('title') : (!empty($bookmark->title) ? $bookmark->title : '')); ?>">
                        &Egrave; pubblico
                    </label>
                </div>-->

                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a href="<?php echo e(route('admin.bookmarks_index')); ?>" class="button is-icon"><i class="mdi mdi-24px mdi-arrow-left"></i></a>
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