
function rechercher() {
  var lname = document.getElementById("lname").value;
  var url = "http://localhost/web_php/test/test.php";

  fetch(url)
      .then((response) => {
          if (response.ok) {
              return response.json();
          } else {
              console.error("Erreur lors de la requête : " + response.status);
          }
      })
      .then((data) => {
          var resultsList = document.getElementById("results");
          resultsList.innerHTML = ""; // Efface les résultats précédents

          for (var i = 0; i < data.length; i++) {
              if (data[i].lastname.toLowerCase().startsWith(lname.toLowerCase())) {
                  var listItem = document.createElement("li");
                  console.log(data[i].lastname);
                  listItem.textContent = data[i].firstname + " " + data[i].lastname;
                  resultsList.appendChild(listItem);
              }
          }
      })
      .catch((error) => {
          console.error("Erreur lors de la récupération du JSON : " + error);
      });
}
