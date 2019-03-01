    <div class="col-md-6">
        <h3 class="text-center">Заполните информацию</h3>
        <br>
<?php echo validation_errors(); ?>
<form action="<?=WEB_SERVER?>/main" method="post">
   <div class="form-group">
        <label for="exampleInputEmail1">Отдел</label>
        <input type="text" class="form-control" placeholder="АНО" name="otdel" value="<?php echo set_value('otdel'); ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Должность</label>
        <input type="text" class="form-control" placeholder="Главный штурман" name="dolzhnost" value="<?php echo set_value('dolzhnost'); ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">ФИО</label>
        <input type="text" class="form-control" placeholder="Иванов Иван Иванович" name="fio" value="<?php echo set_value('fio'); ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Табельный номер</label>
        <input type="text" class="form-control" placeholder="0001234" name="tabel" value="<?php echo set_value('tabel'); ?>">
    </div>
   <div class="form-group">
        <label for="exampleInputEmail1">Количество календарных дней</label>
        <input type="text" class="form-control" placeholder="20" name="time" value="<?php echo set_value('time'); ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Дата запланированная</label>
        <input type="date" class="form-control" name="date" value="<?php echo set_value('date'); ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Номер уведомления</label>
        <input type="text" class="form-control" placeholder="1427-о" name="nomer" value="<?php echo set_value('nomer'); ?>">
    </div>
        <button name="send" class="btn btn-info">Отправить</button>
        </form>
<hr>




    </div>
    <div class="col-md-3">

    </div>
</div>

</body>
</html>