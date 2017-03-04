
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php if (sessionExists('success')): ?>

            <div class="alert alert-success" role="alert">
                <?= sessionFlash('success'); ?>
            </div>

            <?php endif; ?>


            <?php if (sessionExists('error')): ?>

            <div class="alert alert-danger" role="alert">
                <?= sessionFlash('error'); ?>
            </div>

            <?php endif; ?>

        </div>
    </div>
</div>
