let likeBtn = document.querySelector("#like").addEventListener("click", function (e) {
    e.preventDefault();
    like(e);
});

function like(e) {
    let like = document.querySelector("#like");
    let userId = e.target.dataset.user;
    let topicId = e.target.dataset.id;

    let data = new FormData();
    data.append("topicId", topicId);
    data.append("userId", userId);

    fetch('ajax/like_handler.php', {
        method: 'POST',
        body: data,
    })
    .then(response => response.json())
    .then(data => {
        like.innerHTML = data['totallikes'] + ' <i class="fa fa-thumbs-up" style="color: #C78743;"></i>';
        like.classList.toggle("liked");
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}