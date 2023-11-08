<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="uneClasse">Poil</div>
</body>

</html>

<script>

  function getSauceName(requiredId) {
    let url = "getSauceById.php?id=" + requiredId;
    fetch(url, { method: 'GET' })
      .then((response) => {
        // Before parsing (i.e. decoding) the JSON data
        if (!response.ok) {
          // check for any errors.
          // In case of an error, throw.
          throw new Error("Something went wrong!");
        }

        let parsedResponse = response.json();
        return parsedResponse // Parse the JSON data.
      })
      .then((data) => {
        // This is where you handle what to do with the response.
        console.log(data);
        return data;
      })
      .catch((error) => {
        // This is where you handle errors.
      });
  }

  getSauceName(1);


  function createNewSauce(sauceName) {
    let url = "createNewSauce.php";
    let formData = new FormData();
    formData.append("name", sauceName);
    fetch(url, { method: 'POST', body: formData })
      .then((response) => {
        // Show Response Text
        console.log(response.text);
        return response.text
      })
  }
  const unTexte = "Nom du nouvel utilisateur";
  createNewSauce(unTexte);


</script>