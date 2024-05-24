var search = document.getElementById('search');
var data = document.getElementById('results');

search.addEventListener('keyup', function () {
  // inisiasi objek ajax
  var objAjax = new XMLHttpRequest();

  // cek kesiapan ajax
  objAjax.onreadystatechange = function () {
    if ((objAjax.readyState = 4 && objAjax.status == 200)) {
      data.innerHTML = objAjax.responseText;
    }
  };

  objAjax.open('GET', 'app/helpers/search.php?search=' + search.value, 'true');
  objAjax.send();
});
