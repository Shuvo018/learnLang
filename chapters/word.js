$(document).ready(function () {
  const mlcode = $(".mLcode").data("id");
  const llcode = $(".lLcode").data("id");
  //   console.log(mlcode);
  //   console.log(llcode);

  $(".leftSide").on("click", function () {
    let row = $(this).closest("tr");
    let lw = row.find('input[name="lword"]').val();
    // console.log(lw);
    speak(lw, mlcode);
  });
  $(".rightSide").on("click", function () {
    let row = $(this).closest("tr");
    let rw = row.find('input[name="rword"]').val();
    // console.log(rw);
    speak(rw, llcode);
  });
  function speak(w, lcode) {
    let utterance;
    utterance = new SpeechSynthesisUtterance(w);
    utterance.lang = lcode;
    speechSynthesis.speak(utterance);
    // console.log(w);
  }
});
