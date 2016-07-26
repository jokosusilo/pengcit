<h3>Penggabungan</h3>
<hr>
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo URL; ?>double/hasilpenggabungan">
    <div class="control-group">
        <label class="control-label" >File Gambar 1</label>
        <div class="controls">
            <input type="file" name="image1">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" >File Gambar 2</label>
        <div class="controls">
            <input type="file" name="image2">
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </div>
    </div>
</form>
