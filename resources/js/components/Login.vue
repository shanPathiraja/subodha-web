<template>
    <form @submit.prevent="login" class="mt-6" method="POST">
        <div class="mb-4">
            <label class="block">
                <span class="text-gray-700 text-sm font-semibold">Email</span>

                <input type="email" name="email" id="email" v-model="email" class="form-input mt-1 block w-full " placeholder="john.doe@example.com" required value="">
            </label>

            <div v-if="errors.email" class="mt-2" role="alert">
                <span class="text-xs text-red-500 font-semibold" v-text="errors.email[0]"></span>
            </div>
        </div>

        <div class="mb-4">
            <label class="block">
                <span class="text-gray-700 text-sm font-semibold">Password</span>

                <div class="relative">
                    <input type="password" name="password" id="password" v-model="password" class="form-input mt-1 pr-16 block w-full" autocomplete="new-password" placeholder="doyourememberme" required>

                    <a href="/password/reset" class="absolute right-0 top-0 bottom-0 mr-3 flex flex-col items-center justify-center text-sm focus:outline-none transition ease-in-out duration-150">
                        <span>Forgot?</span>
                    </a>
                </div>
            </label>

            <div v-if="errors.password" class="mt-2" role="alert">
                <span class="text-xs text-red-500 font-semibold" v-text="errors.password[0]"></span>
            </div>
        </div>

        <div class="mt-4 flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" v-model="remember" checked type="checkbox" class="form-checkbox h-4 w-4 transition duration-150 ease-in-out" />

                <label for="remember" class="ml-2 block text-sm leading-5 text-gray-900">
                    Stay signed in
                </label>
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" class="btn btn-primary inline-flex items-center" :class="loading ? 'opacity-75 cursor-not-allowed' : ''" :disabled="loading === true">
                <div v-if="loading" class="spinner-border spinner-border-sm text-gray-200 mr-2" role="status">
                    <span class="sr-only">Signing in...</span>
                </div>

                <span v-if="loading">Signing in...</span>

                <span v-else>Sign in <span class="ml-1">&rarr;</span></span>
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                email: null,
                password: null,
                remember: true,
                emailPattern: /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i,
                errors: [],
            }
        },

        methods: {
            login() {
                this.loading = true;

                if (this.validateEmail() && this.password) {
                    axios.post(location.pathname, {
                            email: this.email,
                            password: this.password,
                            remember: this.remember
                        })
                        .then((response) => {
                            if (response.status === 204) {
                                return location.replace('/home');
                            }
                        })
                        .catch((error) => {
                            this.errors = error.response.data.errors;
                        });

                    this.loading = false;
                }
            },

            validateEmail() {
                return this.emailPattern.test(String(this.email).toLowerCase());
            }
        }
    }
</script>
