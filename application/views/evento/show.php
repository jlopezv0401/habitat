<?php echo form_open('evento/show') ?>
<h2><?php echo $titulo; ?></h2>
<div class="row">
        <div class="span9">
                <table class="table table-striped table-bordered tablesorter" id="tcontacts">
                        <thead>
                                <tr>
                                        <th><i class="icon-tags"></i> ID</th>
                                        <th><i class="icon-user"></i> Nombre</th>
                                        <th><i class="icon-flag"></i> Ubicacion</th>
                                        <th><i class="icon-chevron-right"></i> Inicio</th>
                                        <th><i class="icon-chevron-left"></i> Fin</th>
                                        <th><i class="icon-road"></i> Acciones</th>
                                </tr>
                        </thead>
                        <tbody>
                        <? foreach($eventos as $evento): ?>
                                <tr>
                                        <td><?=$evento['id']?></td>
                                        <td><?=$evento['nombre']?></td>
                                        <td><?=$evento['ubicacion']?></td>
                                        <td><?=$evento['fecha_inicio']?></td>
                                        <td><?=$evento['fecha_inicio']?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn" name="submit" value="ver"> Ver Carpas</button>
                                                <button class="btn" name="submit" value="editar"> Editar</button>
                                                <button class="btn" name="submit" value="borrar"> Borrar</button>
                                            </div>
                                        </td>

                                </tr>
                                <? endforeach;?>
                        </tbody>
                </table>
        </div>
</div>
</form>
