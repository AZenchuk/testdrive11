<div class="form">
<?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($form)?>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'login')?>*:
        <?php echo CHtml::activeTextField($form,'login'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'password'); ?>*:
        <?php echo CHtml::activePasswordField($form,'password'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'password_repeat'); ?>*:
        <?php echo CHtml::activePasswordField($form,'password_repeat'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'email'); ?>*:
        <?php echo CHtml::activeTextField($form,'email') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Зарегистрироваться'); ?>
    </div>

<?php echo CHtml::endForm(); ?>
</div>