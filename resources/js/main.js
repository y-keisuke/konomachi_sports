//フッターをコンテンツが足りなくても最下部に表示する
var $ftr = $('#footer');
if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
  $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
}

$(function() {
  //フラッシュメッセージ
  function flashMsg(){
    $('.flash-msg').fadeOut(3000);
  }
  setTimeout(flashMsg, 3000 );
});