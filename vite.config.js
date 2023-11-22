import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

//import Pusher from 'pusher-js';

/*const pusher = new Pusher('14a86b5e868d5c8033e9', {
    cluster: 'eu',
    encrypted: true,
});

const channel = pusher.subscribe('chat-channel');

channel.bind('message-sent', function (data) {
    // Actualizar la interfaz con el nuevo mensaje
    console.log(data.message);
});
*/
