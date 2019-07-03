$(function() {
  //フッターをコンテンツが足りなくても最下部に表示する
  var $ftr = $('#footer');
  if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
    $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
  }

  //パスわードを表示するボタンを実装
  var pw = document.getElementById('password');
  var pwRe = document.getElementById('password_confirm');
  var pwCheck = document.getElementById('password-check');
  pwCheck.addEventListener('change', function() {
    if (pwCheck.checked) {
      pw.setAttribute('type', 'text');
      pwRe.setAttribute('type', 'text');
    } else {
      pw.setAttribute('type', 'password');
      pwRe.setAttribute('type', 'password');
    }
  }, false);
});