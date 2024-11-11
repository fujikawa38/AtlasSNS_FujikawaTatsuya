//アコーディオンメニュー
$(document).ready(function () {
  $('.accordion_arrow').click(function () {
    $(this).toggleClass('active');
    $(this).next('.accordion_content').slideToggle();
  });
});


//モーダル
$(function () {
  $('.modal_open').on('click', function () {
    $('.js_modal').fadeIn();
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');
    $('.modal_post').text(post);
    $('.modal_id').val(post_id);
    return false;
  });

  $('.modal_close').on('click', function () {
    $('.js_modal').fadeOut();
    return false;
  });
});


//trash画像切り替え
$(function () {
  $('.trash').mouseover(function () {
    $(this).attr({
      "src": "images/trash-h.png"
    });
  });
  $('.trash').mouseout(function () {
    $(this).attr({
      "src": "images/trash.png"
    });
  });
});
