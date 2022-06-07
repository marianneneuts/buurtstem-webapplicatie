document.querySelector(".submitComment").addEventListener("click", function(event){
    event.preventDefault();
    let topicId = document.querySelector(".submitComment").dataset.topicid;
    let text = document.querySelector("#commentText").value;

    const formData = new FormData();
    formData.append('topicId', topicId);
    formData.append('text', text);

    fetch('./ajax/save_comment.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        document.querySelector("#commentText").value = " ";

        let newComment = document.createElement('li');
        
        let firstname = document.createElement('h4');
        firstname.classList.add("detailsText");
        firstname.innerHTML = result.firstname + " reageerde:";

        let text = document.createElement('p');
        text.innerHTML = result.body;
        
        newComment.appendChild(firstname);
        newComment.appendChild(text);

        document.querySelector(".CommentList").appendChild(newComment);

    })
    .catch(error => {
        console.error('Error:', error);
    });
});