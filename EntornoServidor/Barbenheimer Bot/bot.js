
const token = '6744615244:AAG2tSYke8D72a6qRNyV6JXck5S2yaPleNM';
const TMDB_API_KEY = '8a63fbb2c57a126f7542a4862c74f4c4';
const TelegramBot = require('node-telegram-bot-api');
const bot = new TelegramBot(token, { polling: true });

import('node-fetch').then(module => {
    bot.onText(/\/start/, (msg) => {
        bot.sendMessage(msg.chat.id, `¡Hola! Soy un bot que te ayuda a encontrar películas o series. Por favor, elige si quieres buscar una serie o una película.`, {
            reply_markup: {
                inline_keyboard: [
                    [
                        { text: 'Películas', callback_data: 'pelicula' },
                        { text: 'Series', callback_data: 'serie' }
                    ]
                ]
            }
        });
    });

    bot.on('callback_query', (query) => {
        const chatId = query.message.chat.id;
        const data = query.data;

        if (data === 'pelicula' || data === 'serie') {
            bot.sendMessage(chatId, `¿Qué categoría prefieres? (Escribe una categoría como acción, drama, comedia, terror, etc.)`, {
                reply_markup: {
                    inline_keyboard: [
                        [
                            { text: 'Acción', callback_data: 'accion' },
                            { text: 'Drama', callback_data: 'drama' },
                            { text: 'Comedia', callback_data: 'comedia' },
                            { text: 'Terror', callback_data: 'terror' }
                        ]
                    ]
                }
            });
        }
    });

    bot.on('callback_query', async (query) => {
        const chatId = query.message.chat.id;
        const messageId = query.message.message_id;
        const data = query.data;
    
        if (data === 'accion' || data === 'drama' || data === 'comedia' || data === 'terror') {
            try {
                const response = await obtenerPeliculasPorGenero(data);
                const movies = response.results.map(movie => ({
                    title: movie.original_title,
                    posterPath: movie.poster_path ? `https://image.tmdb.org/t/p/w500${movie.poster_path}` : null
                }));
                mostrarPeliculas(chatId, messageId, movies);
            } catch (error) {
                console.error('Error al obtener películas:', error);
                bot.sendMessage(chatId, 'Ocurrió un error al obtener películas.');
            }
        }
    });
    
    async function mostrarPeliculas(chatId, messageId, movies) {
        let currentIndex = 0;
        const totalMovies = movies.length;
    
        const sendMovie = async (index) => {
            if (index >= 0 && index < totalMovies) {
                const { title, posterPath } = movies[index];
                const message = `*${title}*\n(${index + 1}/${totalMovies})`;
    
                // Enviar el mensaje con el título actualizado
                await bot.editMessageText(message, {
                    chat_id: chatId,
                    message_id: messageId,
                    parse_mode: 'Markdown'
                });
    
                // Enviar la imagen como archivo adjunto y las flechas de navegación
                if (posterPath) {
                    const imageUrl = encodeURI(posterPath);
                    await bot.sendPhoto(chatId, imageUrl, {
                        caption: message,
                        parse_mode: 'Markdown',
                        reply_markup: {
                            inline_keyboard: [
                                [
                                    { text: '⬅️', callback_data: `prev_${index}` },
                                    { text: '➡️', callback_data: `next_${index}` }
                                ]
                            ]
                        }
                    });
                }
            }
        };
    
        sendMovie(currentIndex);
    
        bot.on('callback_query', async (query) => {
            const data = query.data;
            if (data.startsWith('prev_')) {
                currentIndex = parseInt(data.split('_')[1]) - 1;
                await sendMovie(currentIndex);
            } else if (data.startsWith('next_')) {
                currentIndex = parseInt(data.split('_')[1]) + 1;
                await sendMovie(currentIndex);
            }
        });
    }
    
    function obtenerPeliculasPorGenero(genero) {
        return fetch(`
        https://api.themoviedb.org/3/movie/popular?api_key=${TMDB_API_KEY}`)
            .then(response => response.json());
    }

    

}).catch((error) => {

    console.log("No se ha podido conectar");
});

