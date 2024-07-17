$(document).ready(function () {
  $(".contentLi").click(function () {
    let cpter = $(".contentLi").data("id");

    console.log(cpter);

    $.ajax({
      url: "php_functions/content.php",
      type: "POST",
      data: {
        chapter: cpter,
        action: "content",
      },
      success: function (response) {},
    });
  });
});
