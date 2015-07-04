$(document).ready(function() {
  var category = $('.gift-for');
  var url = '/berry/'
  if (category) {
    category.change(function(e) {
      url += category.find(":selected").data('meta');
      window.location = url;
    });
  }
});
