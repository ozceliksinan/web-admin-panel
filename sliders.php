<?php
require_once 'header.php';
require_once 'sidebar.php'
  ?>
<div class="content-wrapper">
  <section class="content">
    <?php
    if (isset($_GET['slidersInsert'])) { ?>
      <div class="box box-primary">
        <div class="content-header">
          <h1>Sliders Gönderisi Ekle</h1>
          <hr>
        </div>
        <div class="box-body">
          <?php
          if (isset($_POST['sliders_insert'])) {
            $sonuc = $db->insert(
              "sliders",
              $_POST,
              [
                "form_name" => "sliders_insert",
                "title" => "sliders_title",
                "dir" => "sliders",
                "file_name" => "sliders_file"
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
              <label>Resim Seç (801x792)</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="file" name="sliders_file" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Sliders Gönderi Ön Yazı</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="sliders_onyazi" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Sliders Gönderi İçeriği</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="sliders_content" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Sliders Gönderi Button Yazısı</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="sliders_button" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Sliders Gönderi Button Link</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="sliders_buttonlink" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Sliders Gönderi Sırası</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="number" name="sliders_must" required="" class="form-control">
                </div>
              </div>
            </div>

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="sliders_insert">Ekle</button>
            </div>
          </form>
        </div>
      </div>
    <?php } else if (isset($_GET['slidersUpdate'])) { ?>
        <div class="box box-primary">
          <div class="content-header">
            <h1>Sliders Gönderisi Düzenle</h1>
            <hr>
          </div>
          <div class="box-body">
          <?php
          if (isset($_POST['sliders_update'])) {
            $sonuc = $db->update(
              "sliders",
              $_POST,
              [
                "form_name" => "sliders_update",
                "title" => "sliders_title",
                "columns" => "sliders_id",
                "dir" => "sliders",
                "file_name" => "sliders_file",
                "file_delete" => "delete_file"
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
          $sql = $db->wread("sliders", "sliders_id", $_GET['sliders_id']);
          $row = $sql->fetch(PDO::FETCH_ASSOC);
          ?>
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Yüklü Resim</label>
                <div class="row">
                  <div class="col-xs-12">
                    <img width="100" src="dimg/sliders/<?php echo $row['sliders_file'] ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Resim Seç (801x792)</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="file" name="sliders_file" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Sliders Gönderi Ön Yazısı</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="sliders_onyazi" required="" value="<?php echo $row['sliders_onyazi'] ?>"
                      class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Sliders Gönderi İçeriği</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="sliders_content" required="" value="<?php echo $row['sliders_content'] ?>"
                      class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Sliders Gönderi Button Yazısı</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="sliders_button" required="" value="<?php echo $row['sliders_button'] ?>"
                      class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Sliders Gönderi Button Link</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="sliders_buttonlink" required=""
                      value="<?php echo $row['sliders_buttonlink'] ?>" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Sliders Gönderi Sırası</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="sliders_must" required="" value="<?php echo $row['sliders_must'] ?>"
                      class="form-control">
                  </div>
                </div>
              </div>

          </div>

          <input type="hidden" name="sliders_id" value="<?php echo $row['sliders_id']; ?>">
          <input type="hidden" name="delete_file" value="<?php echo $row['sliders_file']; ?>">

          <div align="right" class="box-footer">
            <button type="submit" class="btn btn-success" name="sliders_update">Düzenle</button>
          </div>
          </form>
        </div>
    <?php }
    ?>
    <div class="box box-primary">

      <div class="content-header">
        <h1>Sliders Gönderilerini Listele</h1>
        <div align="right">
          <a href="?slidersInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
          <br><br>
        </div>
        <?php
        if (isset($_GET['slidersDelete'])) {

          $sonuc = $db->delete("sliders", "sliders_id", $_GET['sliders_id'], $_GET['file_delete']);

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
              <th>Sliders Ön Yazı</th>
              <th>Sliders İçeriği</th>
              <th>Sliders Button Yazısı</th>
              <th>Sliders Button Link</th>



              <th>Gönderi Sıralaması</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody id="sortable">

            <?php

            $sql = $db->read("sliders", [
              "columns_name" => "sliders_must",
              "columns_sort" => "ASC"
            ]);
            $say = 1;
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

              <tr id="item-<?php echo $row['sliders_id'] ?>">
                <td>
                  <?php echo $say++; ?>
                </td>
                <td class="sortable">
                  <?php echo $row['sliders_onyazi'] ?>
                </td>
                <td class="sortable">
                  <?php echo $row['sliders_content'] ?>
                </td>
                <td class="sortable">
                  <?php echo $row['sliders_button'] ?>
                </td>
                <td class="sortable">
                  <?php echo $row['sliders_buttonlink'] ?>
                </td>
                <td class="sortable">
                  <?php echo $row['sliders_must'] ?>
                </td>
                <td align="center" width="5"><a href="?slidersUpdate=true&sliders_id=<?php echo $row['sliders_id'] ?>">
                    <button class="btn btn-primary btn-sm">Güncelle</button></a></td>
                <td align="center" width="5"><a
                    href="?slidersDelete=True&sliders_id=<?php echo $row['sliders_id'] ?>&file_delete=<?php echo $row['sliders_file'] ?>">
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