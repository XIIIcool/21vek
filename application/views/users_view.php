<?php //print_r($data); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($data['alert'])):?>
            <div class="alert <?php echo $data['alert']['type'];?>" role="alert">
                <?php echo $data['alert']['text'];?>
            </div> 
            <?php endif;?>
            <h4>Школьный журнал</h4>
            <div class="right5-absolute"><a class="btn-user" href="<?php echo BASE_URL.'users/create/' ?>">Добавить ученика</a></div>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>Фио</th>
                        <th>День рождения</th>
                        <th>Возраст</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php if(count($data['list'])>0):?>    
                        <?php foreach ($data['list'] as $element):?>
                        <tr>
                            <td><?php echo $element->surname.' '.$element->name.' '.$element->patronymic; ?></td>
                            <td><?php echo $element->birthday; ?></td>
                            <td><?php echo intval($element->age); ?></td>
                            <td><a class="btn-user" href="<?php echo BASE_URL.'users/edit/'.$element->id.'/'; ?>">Редактировать</a></td>
                            <td><a class="btn-user" href="<?php echo BASE_URL.'users/delete/'.$element->id.'/'; ?>">Удалить</a></td>


                        </tr>
                        <?php endforeach;?>
                    <?php endif;?>    
                    </tbody>
        
                </table>

                <div class="clearfix"></div>
                <?php echo $data['pagination']; ?>
                
            </div> 
        </div>
    </div>
</div>
