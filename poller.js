var LOGGED_IN_USER=1;

function pollMessageStream(userId) {
  $.getJSON("api.php?action=getmessagestream");
}

$(document).ready(function() {
  pollMessageStream(LOGGED_IN_USER);
});
