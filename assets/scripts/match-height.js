jQuery(document).ready(function ($) {
  let count = 0;

  function getMaxCaseHeight() {
    let maxCaseHeight = 0;
    const elements = document.querySelectorAll(".case");

    for (const e of elements) {
      const elementHeight = e.offsetHeight;
      if (maxCaseHeight < elementHeight) {
        maxCaseHeight = elementHeight;
      }
    }

    return maxCaseHeight;
  }

  function matchCaseHeight() {
    count++;
    const maxHeight = getMaxCaseHeight();
    const elements = [...document.querySelectorAll(".case")];
    elements.map((e) => (e.style.height = `${maxHeight}px`));
  }

  matchCaseHeight();

  window.onresize = function () {
    matchCaseHeight();
  };
});
