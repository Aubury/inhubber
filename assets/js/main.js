//Видео
(function() {
  function initVideoLightbox() {
    if (typeof GLightbox === 'function') {
      GLightbox({
        selector: ".videoModal",
        autoplayVideos: true,
      });
      return true;
    }
    return false;
  }

  if (!initVideoLightbox()) {
    var elapsed = 0;
    var interval = setInterval(function() {
      elapsed += 100;
      if (initVideoLightbox() || elapsed >= 10000) {
        clearInterval(interval);
      }
    }, 100);
  }
})();
//Видео
