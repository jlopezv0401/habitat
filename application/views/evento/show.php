<h2><?php echo $titulo; ?></h2>

<?php foreach ($eventos as $evento): ?>
    <h3><?php echo $evento['nombre'] ?></h3>
    <div id="evento">
        <?php echo $evento['fecha_inicio'] ?> </br>
        <?php echo $evento['fecha_fin'] ?>
    </div>
<?php endforeach ?>


    