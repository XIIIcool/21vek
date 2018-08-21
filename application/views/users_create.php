<?php /*print_r($data);*/ ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($data['alert'])):?>
            <div class="alert <?php echo $data['alert']['type'];?>" role="alert">
                <?php echo $data['alert']['text'];?>
            </div> 
            <?php endif;?>
      
            <h4>Добавить ученика</h4>
            <div class="view">
                <form role="form" action="<?php echo BASE_URL.'users/create/';?>"  method="POST" name="create" class="">
                    <div class="form-group">
                        <label for="formsurname">Фамилия</label>
                        <input class="form-control" name="surname" id="formsurname" value="" type="text" required="required">
                    </div>
                    <div class="form-group">
                        <label for="formname">Имя</label>
                        <input class="form-control" name="name" id="formname" value="" type="text" required="required">
                    </div>
                      <div class="form-group">
                        <label for="formpatronymic">Отчество</label>
                        <input class="form-control" name="patronymic" id="formpatronymic" value="" type="text" required="required">
                    </div>
                    <div class="form-group">
                        <label for="formbirthday">День рождения</label>
                        <input class="form-control" name="birthday" id="formbirthday" value="" type="date" required="required">
                    </div>
                    
                    <div class="form-group">
                    <select class="selectstatus form-control" name="status" >
                        <option value="1">Активен</option>
                        <option value="0">Неактивен</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                   
                    <a href="<?php echo BASE_URL;?>users/" class="btn btn-primary">Отменить</a>
		</form>
            </div>
           
        </div>
    </div>
</div>
