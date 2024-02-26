document.addEventListener('DOMContentLoaded', function () {
    loadMessages_forum(); // Carrega as mensagens imediatamente
});

function loadMessages_forum() {
    fetch('server.php')
        .then(response => response.json())
        .then(messages => {
            displayMessages_forum(messages);
        })
        .catch(error => console.error('Error fetching messages:', error));
}

function sendMessage_forum() {
    const messageInput = document.getElementById('message_forum');
    const message = messageInput.value;

    if (!message) {
        return; // Evita enviar mensagens vazias
    }

    fetch('server.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'message=' + encodeURIComponent(message),
    })
        .then(response => response.json())
        .then(() => {
            messageInput.value = '';
            loadMessages_forum(); // Recarrega as mensagens após enviar uma nova
        })
        .catch(error => console.error('Error sending message:', error));
}

function displayMessages_forum(messages) {
    const messagesDiv = document.getElementById('messages_forum');
    messagesDiv.innerHTML = '';

    messages.forEach(message => {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message_forum');

        const iconUserElement = document.createElement('i');
        iconUserElement.classList.add('fas', 'fa-user');
        iconUserElement.style.color = '#8a63a1';
        iconUserElement.style.marginRight = '10px';

        const contentElement = document.createElement('span');
        contentElement.textContent = message.content;

        messageElement.appendChild(iconUserElement);
        messageElement.appendChild(contentElement);
        messagesDiv.appendChild(messageElement);
    });
}