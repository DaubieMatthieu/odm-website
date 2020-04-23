window.onload = function() {
    var hash = location.hash.replace('#','');

    if(hash != ''){
      removeAnchorFromUrl();
      jumpToAnchor(hash);
    }
};

function removeAnchorFromUrl() {
  // remove fragment as much as it can go without adding an entry in browser history:
  window.location.replace("#");

  // slice off the remaining '#' in HTML5:
  if (typeof window.history.replaceState == 'function') {
    history.replaceState({}, '', window.location.href.slice(0, -1));
  }
}

function jumpToAnchor(anchor) {
    var url = location.href;               //Save down the URL without hash.
    location.href = "#"+anchor;                 //Go to the target element.
    history.replaceState(null,null,url);   //Don't like hashes. Changing it back.
}
