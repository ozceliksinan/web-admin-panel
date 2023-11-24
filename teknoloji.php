<?php
require_once 'header.php';
require_once 'sidebar.php'
  ?>
<div class="content-wrapper">
  <section class="content">
    <?php
    if (isset($_GET['teknolojiInsert'])) { ?>
      <div class="box box-primary">
        <div class="content-header">
          <h1>Teknoloji Gönderisi Ekle</h1>
          <hr>
        </div>
        <div class="box-body">
          <?php
          if (isset($_POST['teknoloji_insert'])) {
            $sonuc = $db->insert(
              "teknoloji",
              $_POST,
              [
                "form_name" => "teknoloji_insert",
                "title" => "teknoloji_title",
                "dir" => "teknoloji",
                "file_name" => "teknoloji_file"
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
              <label>Resim Seç (770x385)</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="file" name="teknoloji_file" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Teknoloji Gönderi Meta Description</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="teknoloji_metadesc" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Teknoloji Gönderi Meta Keyword</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="teknoloji_metakeyword" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Teknoloji Gönderi Başlığı</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="teknoloji_title" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Teknoloji Gönderi Ön Yazısı</label>
              <div class="row">
                <div class="col-xs-12">
                  <textarea id="editor2" class="form-control" name="teknoloji_onyazi"></textarea>
                </div>
              </div>
            </div>
            <script>
              CKEDITOR.replace('editor2');
            </script>

            <div class="form-group">
              <label>Teknoloji Gönderi İçeriği</label>
              <div class="row">
                <div class="col-xs-12">
                  <textarea id="editor1" class="form-control" name="teknoloji_content"></textarea>
                </div>
              </div>
            </div>
            <script>
              CKEDITOR.replace('editor1');
            </script>

            <div class="form-group">
              <label>Teknoloji Gönderi Tags</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="teknoloji_tags" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Teknoloji Recent Post Durum</label>
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="teknoloji_recent">
                    <option value="Aktif">Aktif</option>
                    <option value="Pasif">Pasif</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Teknoloji Gönderi Sırası</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="number" name="teknoloji_must" required="" class="form-control">
                </div>
              </div>
            </div>

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="teknoloji_insert">Ekle</button>
            </div>
          </form>
        </div>
      </div>
    <?php } else if (isset($_GET['teknolojiUpdate'])) { ?>
        <div class="box box-primary">
          <div class="content-header">
            <h1>Teknoloji Gönderisi Düzenle</h1>
            <hr>
          </div>
          <div class="box-body">
          <?php
          if (isset($_POST['teknoloji_update'])) {
            $sonuc = $db->update(
              "teknoloji",
              $_POST,
              [
                "form_name" => "teknoloji_update",
                "title" => "teknoloji_title",
                "columns" => "teknoloji_id",
                "dir" => "teknoloji",
                "file_name" => "teknoloji_file",
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
          $sql = $db->wread("teknoloji", "teknoloji_id", $_GET['teknoloji_id']);
          $row = $sql->fetch(PDO::FETCH_ASSOC);
          ?>
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Yüklü Resim</label>
                <div class="row">
                  <div class="col-xs-12">
                    <img width="100" src="dimg/teknoloji/<?php echo $row['teknoloji_file'] ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Resim Seç (770x385)</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="file" name="teknoloji_file" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Teknoloji Gönderi Meta Description</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="teknoloji_metadesc" required=""
                      value="<?php echo $row['teknoloji_metadesc'] ?>" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Teknoloji Gönderi Meta Keyword</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="teknoloji_metakeyword" required=""
                      value="<?php echo $row['teknoloji_metakeyword'] ?>" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Teknoloji Gönderi Başlığı</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="teknoloji_title" required="" value="<?php echo $row['teknoloji_title'] ?>"
                      class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Teknoloji Gönderi Ön Yazısı</label>
                <div class="row">
                  <div class="col-xs-12">
                    <textarea id="editor2" class="form-control"
                      name="teknoloji_onyazi"><?php echo $row['teknoloji_onyazi'] ?>"</textarea>
                  </div>
                </div>
              </div>
              <script>
                CKEDITOR.replace('editor2');
              </script>

              <div class="form-group">
                <label>Teknoloji Gönderi İçeriği</label>
                <div class="row">
                  <div class="col-xs-12">
                    <textarea id="editor1" class="form-control"
                      name="teknoloji_content"><?php echo $row['teknoloji_content'] ?>"</textarea>
                  </div>
                </div>
              </div>
              <script>
                CKEDITOR.replace('editor1');
              </script>

              <div class="form-group">
                <label>Teknoloji Gönderi Tags</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="teknoloji_tags" required="" value="<?php echo $row['teknoloji_tags'] ?>"
                      class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Teknoloji Gönderi Recent Post Durumu</label>
                <div class="row">
                  <div class="col-xs-12">
                    <select class="form-control" name="teknoloji_recent">
                      <option value="Aktif">Aktif</option>
                      <option value="Pasif">Pasif</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Teknoloji Gönderi Sırası</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="text" name="teknoloji_must" required="" value="<?php echo $row['teknoloji_must'] ?>"
                      class="form-control">
                  </div>
                </div>
              </div>

          </div>

          <input type="hidden" name="teknoloji_id" value="<?php echo $row['teknoloji_id']; ?>">
          <input type="hidden" name="delete_file" value="<?php echo $row['teknoloji_file']; ?>">

          <div align="right" class="box-footer">
            <button type="submit" class="btn btn-success" name="teknoloji_update">Düzenle</button>
          </div>
          </form>
        </div>
    <?php }
    ?>
    <div class="box box-primary">

      <div class="content-header">
        <h1>Teknoloji Gönderilerini Listele</h1>
        <div align="right">
          <a href="?teknolojiInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
          <br><br>
        </div>
        <?php
        if (isset($_GET['teknolojiDelete'])) {

          $sonuc = $db->delete("teknoloji", "teknoloji_id", $_GET['teknoloji_id'], $_GET['file_delete']);

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
              <th>Teknoloji Başlık</th>
              <th>Teknoloji Recent Post Durumu</th>
              <th>Gönderi Sıralaması</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody id="sortable">

            <?php

            $sql = $db->read("teknoloji", [
              "columns_name" => "teknoloji_must",
              "columns_sort" => "ASC"
            ]);
            $say = 1;
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

              <tr id="item-<?php echo $row['teknoloji_id'] ?>">
                <td>
                  <?php echo $say++; ?>
                </td>
                <td class="sortable">
                  <?php echo $row['teknoloji_title'] ?>
                </td>
                <td class="sortable">
                  <?php echo $row['teknoloji_recent'] ?>
                </td>
                <td class="sortable">
                  <?php echo $row['teknoloji_must'] ?>
                </td>
                <td align="center" width="5"><a
                    href="?teknolojiUpdate=true&teknoloji_id=<?php echo $row['teknoloji_id'] ?>">
                    <button class="btn btn-primary btn-sm">Güncelle</button></a></td>
                <td align="center" width="5"><a
                    href="?teknolojiDelete=True&teknoloji_id=<?php echo $row['teknoloji_id'] ?>&file_delete=<?php echo $row['teknoloji_file'] ?>">
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