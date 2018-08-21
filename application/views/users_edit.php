<?php /*print_r($data);*/ ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($data['alert'])):?>
            <div class="alert <?php echo $data['alert']['type'];?>" role="alert">
                <?php echo $data['alert']['text'];?>
            </div> 
            <?php endif;?>
            <?php if(isset($data['item'])):?>
            <h4>Редактировать ученика</h4>
            <h4><?php echo $data['item']->surname.' '.$data['item']->name.' '.$data['item']->patronymic;?></h4>
            <div class="view">
                <form role="form" action="<?php echo BASE_URL.'users/edit/save/';?>"  method="POST" class="">
                    <input type="hidden" name="id" value="<?php echo $data['item']->id;?>">
                    <div class="form-group">
                        <label for="formsurname">Фамилия</label>
                        <input class="form-control" name="surname" id="formsurname" value="<?php echo $data['item']->surname;?>" type="text" required="required">
                    </div>
                    <div class="form-group">
                        <label for="formname">Имя</label>
                        <input class="form-control" name="name" id="formname" value="<?php echo $data['item']->name;?>" type="text" required="required">
                    </div>
                      <div class="form-group">
                        <label for="formpatronymic">Отчество</label>
                        <input class="form-control" name="patronymic" id="formpatronymic" value="<?php echo $data['item']->patronymic;?>" type="text" required="required">
                    </div>
                    <div class="form-group">
                        <label for="formbirthday">День рождения</label>
                        <input class="form-control" name="birthday" id="formbirthday" value="<?php echo $data['item']->birthday;?>" type="date">
                    </div>
                    
                    <div class="form-group">
                    <select class="selectstatus form-control" name="status" >
                        <option <?php echo ($data['item']->status == 1 ? 'selected' : '') ?> value="1">Активен</option>
                        <option <?php echo ($data['item']->status == 0 ? 'selected' : '') ?> value="0">Неактивен</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                   
                    <a href="<?php echo BASE_URL;?>users/" class="btn btn-primary">Отменить</a>
		</form>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
