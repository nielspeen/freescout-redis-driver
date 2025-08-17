fetch('/customapp/content')
    .then(response => response.text())
    .then(data => {
        document.getElementById('customapp-content').innerHTML = data;
    })
    .catch(error => {
        console.error('Error loading customapp content:', error);
    });


