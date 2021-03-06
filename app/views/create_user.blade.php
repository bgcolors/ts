<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{{ $user_title }}}</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="assets/i/logo.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
  </head>
  <body>
  <div id="data" data-user-fail="{{ $user_fail }}" data-chose-tutor="{{ $chose_tutor }}"></div>
    <!--[if lte IE 9]>
    <p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
  <![endif]-->
  @include('_navbar')
  
  <div class="am-cf admin-main">
    <!-- sidebar start -->
    @include('_sidebar')
    <!-- sidebar end -->
    <!-- content start -->
    <div class="admin-content">
      <!-- profile start -->
      <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">基本资料</strong> / <small>Basic Information</small></div>
      </div>

      <div class="am-g am-padding-vertical am-margin-vertical" >
        <div class="am-u-sm-12 am-u-md-8 am-u-end">
          <form class="am-form am-form-horizontal" id="user-form">
            
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-2 am-form-label">用户名</label>
              <div class="am-u-sm-9 am-u-end">
                <input type="text" id="user-name" placeholder="用户名 / Username" name="username" class="am-form-field">
              </div>
            </div>

            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-2 am-form-label">姓名</label>
              <div class="am-u-sm-9 am-u-end">
                <input type="text" id="user-name" placeholder="姓名 / Name" name="name" class="am-form-field">
              </div>
            </div>

            <div class="am-form-group">
              <label for="user-email" class="am-u-sm-2 am-form-label">项目</label>
              <div class="am-u-sm-9 am-u-end">
                <select data-am-selected="{searchBox: 1,maxHeight: 250}" name="project_id">
                  <?php 
                  if (isset($projects) && count($projects)) {
                    foreach ($projects as $k => $p) {
                  ?>
                  <option value="{{ $p->id }}" <?php echo $k == 0 ? 'selected' : ''; ?>>{{ $p->name }}</option>
                  <?php
                    }
                  }
                  ?>
                  
                </select> 
              </div>
            </div>

            <div class="am-form-group">
              <label for="user-email" class="am-u-sm-2 am-form-label">身份</label>
              <div class="am-u-sm-9 am-u-end">
                <select data-am-selected="{searchBox: 1,maxHeight: 250}" name="role">
                  <option value="1">学徒</option>
                  <option value="2">评估师</option>
                  <option value="3" selected>内审员</option>
                  <option value="4">外审员</option>
                  <option value="5">系统管理员</option>
                </select>     
              </div>
            </div>
            
            <div class="am-form-group" id="tutor-group" style="display: none">
              <label for="user-email" class="am-u-sm-2 am-form-label">导师</label>
              <div class="am-u-sm-9 am-u-end">
                <select data-am-selected="{searchBox: 1,maxHeight: 250}" name="tutor_id">
                <?php 
                if (isset($tutors) && count($tutors)) {
                ?>
                <option value="0" selected>无</option>
                <?php
                  foreach ($tutors as $k => $t) {
                ?>
                <option value="{{ $t->id }}">{{ $t->name }} -> <?php 
                  $roleArr = array(
                    '学徒',
                    '评估师',
                    '内审员',
                    '外审员',
                    '系统管理员'
                  );
                  $role = Session::get('role'); 
                  echo $roleArr[$t->role - 1];
          ?></option>
                <?php
                  }
                }
                ?>
                </select>     
              </div>
            </div>
              
            <div class="am-form-group">
              <label for="user-email" class="am-u-sm-2 am-form-label">电子邮件</label>
              <div class="am-u-sm-9 am-u-end">
                <input type="email" id="user-email" placeholder="输入你的电子邮件 / Email" name="email" class="am-form-field">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-phone" class="am-u-sm-2 am-form-label">电话</label>
              <div class="am-u-sm-9 am-u-end">
                <input type="text" id="user-phone" placeholder="输入你的电话号码 / Telephone" name="phone_no" class="am-form-field">
              </div>
            </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-2">
                <button class="am-btn am-btn-primary" id="profile-btn">添加</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- profile end -->

    </div>
    <!-- content end -->
    
    <footer class="am-g">
      <hr>
      <p class="am-padding-left am-text-center">{{{ $powered_by }}}</p>
    </footer>
    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/polyfill/rem.min.js"></script>
    <script src="assets/js/polyfill/respond.min.js"></script>
    <script src="assets/js/amazeui.legacy.js"></script>
    <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/amazeui.min.js"></script>
    <script src="assets/js/jquery.form.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/common.js"></script>
    <!--<![endif]-->
    <script>
    (function(){
      var createSuccess = false;
      $(document).on("click", "#modal-alert .am-modal-btn", function() {

          location.reload();

      });


      $("#user-form").validate({
       // errorElement: '<div class="am-alert am-alert-danger" data-am-alert><button type="button" class="am-close">&times;</button></div>',
       errorElement: 'label',
       errorClass: 'am-form-error',
       // errorPlacement: function(error, element) {
       //     var group = element.closest(".am-form-group");
       //     group.after('<div class="am-alert am-alert-danger am-u-md-6" data-am-alert><button type="button" class="am-close">&times;</button></div>');
       //     // log(.am-alert);
       //     error.appendTo(group.next(".am-alert"));
       // },
       highlight: function(element, errorClass, validClass) {
         $(element).closest('.am-form-group').addClass(errorClass);
       },
       unhighlight: function(element, errorClass, validClass) {
         $(element).closest('.am-form-group').removeClass(errorClass);
       },
       messages: {
         username: "请输入正确的用户名3-20位",
         name: "请输入用户姓名，长度2-10",
         email: "请正确输入email",
         phone_no: "请正确输入电话号码"
       },
       rules: {
         username : {
           required: true,
           minlength: 3,
           maxlength: 20
         },
         name : {
           required: true,
           minlength: 2,
           maxlength: 10
         },
         email: {
          email: true
         },
         phone_no : {
           digits: true,
           minlength: 7,
           maxlength: 20
         },
       },
       submitHandler: function(form) {
           var formData = {
            username: $("[name=username]").val(),
            name: $("[name=name]").val(),
            email: $("[name=email]").val(),
            phone_no: $("[name=phone_no]").val(),
            role: $("[name=role]").val()
           };

           if (5 != $("[name=role]").val()) {
            formData.project_id = $("[name=project_id]").val();
           }

           if (1 == $("[name=role]").val()) {
            if (0 == $("[name=tutor_id]").val()) {
              $.modalAlert({
                 type: 'info',
                 message: $("#data").attr("data-chose-tutor")
               });
              return false;
            }
            formData.tutor_id = $("[name=tutor_id]").val();
           }

           if (2 == $("[name=role]").val()) {
            if ($("[name=tutor_id]").val()) {
              formData.tutor_id = $("[name=tutor_id]").val();
            }
           }

           $.ajax({
            url: window.baseUrl + 'user/create',
            type: 'post',
            data: formData,
            success: function(data) {
               $.modalAlert({
                 type: data.status == 'success' ? 'info' : 'warning',
                 message: data.message,
               });

               if (data.status == 'success') {
                createSuccess = true;
               }
               $(form)[0].reset();
             },
             fail: function() {
               $.modalAlert({
                 type: data.status == 'success' ? 'info' : 'warning',
                 message: $("#data").attr("data-user-fail")
               });
             }
           });
         }
      });

      $("[name=role]").on("change",function(){
        if (1 == $(this).val() || 2 == $(this).val()) {
          $("#tutor-group").show();
        } else {
          $("#tutor-group").hide();
        }
      });

    })();
    
    </script>
  </body>
</html>
