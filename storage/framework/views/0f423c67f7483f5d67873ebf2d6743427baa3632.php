<?php $__env->startSection('content'); ?>
<?php echo e(Breadcrumbs::render('admin.tags_index')); ?>


<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item"><h4 class="title">Tag</h4></div>
                </div>
                <div class="level-right">
                    <div class="level-item"><a href="<?php echo e(route('admin.tags_add')); ?>" class="is-icon has-text-info" title="Nuova categoria"><i class="mdi mdi-36px mdi-plus-box"></i></a></div>
                </div>
            </nav>
            <div class="table-responsive">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Creata il</th>
                            <th>Modificata il</th>
                            <th colspan="2">Azioni</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Creata il</th>
                            <th>Modificata il</th>
                            <th colspan="2">Azioni</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if(sizeof($tags)>0): ?>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($tag->id); ?></td>
                                <td><?php echo e($tag->title); ?></td>
                                <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tag->created_at)->toDayDateTimeString()); ?></td>
                                <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tag->updated_at)->toDayDateTimeString()); ?></td>
                                <td><a href="<?php echo e(route('admin.tags_edit', ['id' => $tag->id])); ?>" class="is-icon has-text-info"><i class="mdi mdi-24px mdi-playlist-edit"></i></a></td>
                                <td><a href="<?php echo e(route('admin.tags_edit', ['id' => $tag->id])); ?>" class="is-icon has-text-danger"><i class="mdi mdi-24px mdi-delete"></i></a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="6">Nessun tag</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($tags->links('elements.pagination')); ?>

        </article>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>