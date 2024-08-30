$(document).ready(function () {
  const mlcode = $(".mLcode").data("id");
  const llcode = $(".lLcode").data("id");
  //   console.log(mlcode);
  //   console.log(llcode);

  $(".leftside").on("click", function () {
    let row = $(this).closest("tr");
    let w = row.find('input[name="lword"]').val();
    // console.log(w);
    speak(w, llcode);
  });
  $(".rightside").on("click", function () {
    let row = $(this).closest("tr");
    let w = row.find('input[name="rword"]').val();
    // console.log(w);
    speak(w, mlcode);
  });
  function speak(w, lcode) {
    let utterance;
    utterance = new SpeechSynthesisUtterance(w);
    utterance.lang = lcode;
    speechSynthesis.speak(utterance);
    console.log(w);
  }
});
