<h1>������������������ ������������</h1>

<?php foreach($users as $user): ?>
�����: <?php echo $user->login; ?>
E-mail: <?php echo $user->email; ?>
���� �����������: <?php echo date('d.m.Y H:i', $user->dtime_registration); ?>
<?php endforeach; ?>

<a href="<?php echo $this->createUrl('user/signup'); ?>">������������������</a>