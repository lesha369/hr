    <div class="col-md-6">
        <h3 class="text-center">загрузите список</h3>
        <br>


        <?php echo $error;?>
        <?php echo form_open_multipart(WEB_SERVER.'/main/do_upload');?>
        <div class="form-group">
            <label for="exampleInputFile">Загрузить файл excel: </label>
            <input type="file" id="exampleInputFile" name="userfile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        </div>
        <button type="submit" class="btn btn-info">Отправить</button>


        </form>

    </div>
    <div class="col-md-3">

    </div>
</div>

</body>
</html>