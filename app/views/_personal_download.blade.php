<?php 
  if ($my_download) {
?>

<div class="am-cf am-padding">
  <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">我的下载</strong> / <small>Personal Download</small></div>
</div>

<?php 
    if (isset($user['downloads']) && count($user['downloads'])) {
?>

<!-- table start -->
<div class="am-g">
  <div class="am-u-sm-12">
    <form class="am-form">
      <table class="am-table am-table-striped am-table-hover table-main">
        <thead>
          <tr>
            <th class="table-title">文件名</th><th class="table-type">我已下载</th><th class="table-type">下载人数</th><th class="table-author am-hide-sm-only">发布人</th><th class="table-date am-hide-sm-only">上传日期</th><th class="table-set">操作</th>
          </tr>
        </thead>
        <tbody>
          <!-- tbody start -->
          <?php 
          foreach ($user['downloads'] as $download) {
          ?>
            <tr>
              <td>{{ $download->filename }}</td>
              <td><?php if (!isset($download->my_record) || !count($download->my_record) ) { ?>未下载<?php } else { ?><a href="javascript:;" data-am-popover="{content: '您在{{ $download->my_record->updated_at }}时下载', trigger: 'hover focus'}">已下载</a><?php } ?></td>
              <td><a href="javascript:;" <?php if (!isset($download->downloaders) || !count($download->downloaders) ) { echo '>0'; } else { ?> data-am-popover="{content: '<?php 
                foreach($download->downloaders as $k => $v) {
                  if ($k != 0) {
                    echo '，';
                  }
                  echo $v;
                }
              ?>等人已下载', trigger: 'hover focus'}">{{ count($download->downloaders) }} <?php } ?></a></td>
              <td><a href="javascript:;" data-id="{{ $download->user->id }}" class="user-link">{{ $download->user->name }}</a></td>
              <td class="am-hide-sm-only">{{ $download->updated_at }}</td>
              <td>
                <div class="am-btn-toolbar" data-file-id="{{ $download->id }}" data-user-id="{{ $user_id }}">
                  <div class="am-btn-group am-btn-group-xs">
                    <?php 
                    if ($downloads_download === true) {
                    ?>

                    <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary download"><span class="am-icon-download"></span> 下载</button>

                    <?php
                    } 
                    if ($downloads_delete === true) {
                    ?>

                    <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delete"><span class="am-icon-trash-o"></span> 删除</button>

                    <?php
                    }
                    ?>
                  </div>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
          <!-- tbody end -->
        </tbody>
      </table>
      <hr />
    </form>
  </div>
</div>
<!-- table end -->

<?php
    } else {
?>
  <p class="am-padding-left">{{ $no_downloads }}</p>
<?php
    }
  }
?>
