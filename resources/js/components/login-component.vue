<template>
    <div class="login-container">
        <h2>Login</h2>
        <form @submit.prevent="login">
            <div class="form-group">
                <label for="email">Email:</label>
                <input v-model="email" type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input v-model="password" type="password" name="password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <p>No tienes una cuenta? <router-link to="/register">Crear usuario</router-link></p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: '',
        };
    },
    methods: {
        async login() {
            try {
                // Realizar la solicitud de inicio de sesión al servidor
                const response = await axios.post('/login', {
                    email: this.email,
                    password: this.password,
                });

                console.log('Respuesta del servidor:', response.data);

                // Verificar si la respuesta del servidor indica un inicio de sesión exitoso
                if (response.data.success) {
                    console.log('Redirigiendo a:', response.data.redirectTo);

                    // Redirigir al usuario a la ruta proporcionada por el servidor
                    window.location.href = response.data.redirectTo;
                } else {
                    // Manejar lógica de inicio de sesión fallida
                    console.error('Inicio de sesión fallido:', response.data.message);
                }
            } catch (error) {
                console.error('Error en la solicitud de inicio de sesión:', error);
            }
        },
    },
};
</script>

<style scoped>
.login-container {
    max-width: 400px;
    margin: auto;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

button {
    background-color: #0d6efd;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    width: 100px;
}

button:hover {
    background-color: #45a049;
}
</style>
