document.querySelector('.custom-file-input').onchange = function displayFileName() {
  var fileName = this.value.split('\\').pop();
  document.querySelector('.custom-file-label').innerHTML = fileName;
};
