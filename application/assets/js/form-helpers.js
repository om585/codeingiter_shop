function toggleLoadingState(form) {
    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.classList.add('loading');
    submitBtn.innerHTML = ' Updating...';
    return true;
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    var forms = document.querySelectorAll('form');
    forms.forEach(function(form) {
      form.addEventListener('submit', function() {
        toggleLoadingState(this);
      });
    });
  });