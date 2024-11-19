import axios from 'axios';

const instance = axios.create({
    baseURL: 'http://managepro.test/api', // URL base de tus APIs
    timeout: 10000, // Tiempo de espera
    headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
    },
});

// Interceptores de solicitud (opcional, por ejemplo, para incluir tokens)
instance.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('token'); // Token almacenado
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    (error) => Promise.reject(error)
);

export default instance;

