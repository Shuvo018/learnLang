$(document).ready(function () {
  console.log("works");
  $(".form-check").click(function () {
    let curTerm = $("input[name=lang]:checked").val();
    console.log(curTerm);
  });
});
