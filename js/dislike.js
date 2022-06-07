let dislikeBtn = document.querySelector("#dislike").addEventListener("click", function (e) {
    e.preventDefault();
    dislike(e);
});

function dislike(e) {
    let dislike = document.querySelector("#dislike");
    let userId = e.target.dataset.user;
    let topicId = e.target.dataset.id;

    let data = new FormData();
    data.append("topicId", topicId);
    data.append("userId", userId);

    fetch('ajax/dislike_handler.php', {
        method: 'POST',
        body: data,
    })
    .then(response => response.json())
    .then(data => {
        dislike.innerHTML = data['totaldislikes'] + " dislikes";
        dislike.classList.toggle("disliked");
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}