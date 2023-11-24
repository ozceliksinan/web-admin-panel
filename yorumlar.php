<?php
require_once 'header.php';
require_once 'sidebar.php'
  ?>
<div class="content-wrapper">
  <section class="content">
    <?php
    if (isset($_GET['yorumlarInsert'])) { ?>
      <div class="box box-primary">
        <div class="content-header">
          <h1>Yorumlar Gönderisi Ekle</h1>
          <hr>
        </div>
        <div class="box-body">
          <?php
          if (isset($_POST['yorumlar_insert'])) {
            $sonuc = $db->insert(
              "yorumlar",
              $_POST,
              [
                "form_name" => "yorumlar_insert",
                "title" => "yorumlar_title",
              ]
            );
            if ($sonuc['status']) { ?>
              <div class="alert alert-success">
                Kayıt Başarılı
              </div>
            <?php } else { ?>

              <div class="alert alert-danger">
                Kayıt Başarısız.
                <?php echo $sonuc['error'] ?>
              </div>
            <?php }
          }
          ?>
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Yorumlar Gönderi İçeriği</label>
              <div class="row">
                <div class="col-xs-12">
                  <textarea id="editor1" class="form-control" name="yorumlar_content"></textarea>
                </div>
              </div>
            </div>
            <script>
              CKEDITOR.replace('editor1');
            </script>

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="yorumlar_insert">Ekle</button>
            </div>
          </form>
        </div>
      </div>
    <?php } else if (isset($_GET['yorumlarUpdate'])) { ?>
        <div class="box box-primary">
          <div class="content-header">
            <h1>Yorumlar Gönderisi Düzenle</h1>
            <hr>
          </div>
          <div class="box-body">
          <?php
          if (isset($_POST['yorumlar_update'])) {
            $sonuc = $db->update(
              "yorumlar",
              $_POST,
              [
                "form_name" => "yorumlar_update",
                "columns" => "yorumlar_id"
              ]
            );
            if ($sonuc['status']) { ?>
                <div class="alert alert-success">
                  Kayıt Başarılı
                </div>
            <?php } else { ?>
                <div class="alert alert-danger">
                  Kayıt Başarısız.
                <?php echo $sonuc['error'] ?>
                </div>
            <?php }
          }
          $sql = $db->wread("yorumlar", "yorumlar_id", $_GET['yorumlar_id']);
          $row = $sql->fetch(PDO::FETCH_ASSOC);
          ?>
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Yorumlar Gönderi İçeriği</label>
                <div class="row">
                  <div class="col-xs-12">
                    <textarea id="editor1" class="form-control"
                      name="yorumlar_content"><?php echo $row['yorumlar_content'] ?>"</textarea>
                  </div>
                </div>
              </div>
              <script>
                CKEDITOR.replace('editor1');
              </script>
          </div>

          <input type="hidden" name="yorumlar_id" value="<?php echo $row['yorumlar_id']; ?>">

          <div align="right" class="box-footer">
            <button type="submit" class="btn btn-success" name="yorumlar_update">Düzenle</button>
          </div>
          </form>
        </div>
    <?php }
    ?>
    <div class="box box-primary">

      <div class="content-header">
        <h1>Yorumlar Gönderilerini Listele</h1>
        <div align="right">
          <a href="?yorumlarInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
          <br><br>
        </div>
        <?php
        if (isset($_GET['yorumlarDelete'])) {

          $sonuc = $db->delete("yorumlar", "yorumlar_id", $_GET['yorumlar_id'], $_GET['file_delete']);

          if ($sonuc['status']) { ?>
            <div class="alert alert-success">
              Silme Başarılı
            </div>
          <?php } else { ?>

            <div class="alert alert-danger ">
              Silme Başarısız.
              <?php echo $sonuc['error'] ?>
            </div>
          <?php }
        }
        ?>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th align="center" width="5">#</th>
              <th>Yorumlar Content</th>
              <th>Gönderi Sıralaması</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody id="sortable">

            <?php

            $sql = $db->read("yorumlar", [
              "columns_name" => "yorumlar_must",
              "columns_sort" => "ASC"
            ]);
            $say = 1;
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

              <tr id="item-<?php echo $row['yorumlar_id'] ?>">
                <td>
                  <?php echo $say++; ?>
                </td>
                <td class="sortable">
                  <?php echo $row['yorumlar_content'] ?>
                </td>
                <td class="sortable">
                  <?php echo $row['yorumlar_must'] ?>
                </td>
                <td align="center" width="5"><a href="?yorumlarUpdate=true&yorumlar_id=<?php echo $row['yorumlar_id'] ?>">
                    <button class="btn btn-primary btn-sm">Güncelle</button></a></td>
                <td align="center" width="5"><a
                    href="?yorumlarDelete=True&yorumlar_id=<?php echo $row['yorumlar_id'] ?>&file_delete=<?php echo $row['yorumlar_file'] ?>">
                    <button class="btn btn-danger btn-sm">Sil</button></a></td>
              </tr>
            <?php } ?>
        </table>
      </div>
    </div>
  </section>
</div>
<?php require_once 'footer.php'; ?>
<script type="text/javascript">
  $(function () {
    $("#sortable").sortable({
      revert: true,
      handle: ".sortable",
      stop: function (event, ui) {
        var data = $(this).sortable('serialize');

        $.ajax({
          type: "POST",
          dataType: "json",
          data: data,
          url: "netting/order-ajax.php?settings_must=true",
          success: function (msg) {
            if (msg.islemMsj) {
              swal({
                title: "Başarılı",
                text: "Yeni düzenlemeniz başarılı bir şekilde kaydedildi.",
                icon: "success",
                button: "Kapat",
              });
            } else {
              swal({
                title: "Hata",
                text: "Düzenleme sırasında bir hata oluştu",
                icon: "warning",
                button: "Kapat",
              });
            }
          }
        });
      }
    });
    $("#sortable").disableSelection();
  });
</script>