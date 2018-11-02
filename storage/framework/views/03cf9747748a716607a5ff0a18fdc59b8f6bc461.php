<?php if($paginator->hasPages()): ?>
<br/>
<nav class="pagination is-right" role="navigation" aria-label="pagination">
    
    <?php if($paginator->onFirstPage()): ?>
        <span class="pagination-previous"><i class="mdi mdi-24px mdi-arrow-collapse-left"></i></span>
    <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="pagination-previous"><i class="mdi mdi-24px mdi-arrow-left"></i></a>
    <?php endif; ?>

    
    <?php if(!empty($elements)): ?>
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="disabled" aria-disabled="true"><span><?php echo e($element); ?></span></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="active" aria-current="page"><span><?php echo e($page); ?></span></li>
                    <?php else: ?>
                        <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    
    <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="pagination-previous"><i class="mdi mdi-24px mdi-arrow-right"></i></a>
    <?php else: ?>
        <span class="pagination-previous"><i class="mdi mdi-24px mdi-arrow-collapse-right"></i></span>
    <?php endif; ?>
</ul>
<?php endif; ?>
