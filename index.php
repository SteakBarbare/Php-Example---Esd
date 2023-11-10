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

  function getSceneById(Id) {
    let url = "getSceneId.php?id=" + Id;
    fetch(url, { method: "GET" })
      .then((response) => {
        // Before parsing (i.e. decoding) the JSON data
        if (!response.ok) {
          // check for any errors.
          // In case of an error, throw.
          throw new Error("Something went wrong!");
        }
        let parsedResponse = response.json();
        return parsedResponse; // Parse the JSON data.
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
  getSceneById(1);

  function getEnemyById(requiredId) {
    let url = "getEnemyById.php?id=" + requiredId;
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

  getEnemyById(1);

  function getNames() {
    fetch('getPoil.php')
      .then((response) => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        let parsedResponse = response.json();
        return parsedResponse;
      })
      .then((data) => {
        console.log(data);
        return data;
      })
      .catch((error) => {
        console.log('There has been a problem:', error);
      });
  }
  getNames();

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