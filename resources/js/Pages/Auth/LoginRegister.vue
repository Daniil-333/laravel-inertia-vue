<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-white">{{ title }}</h2>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form @submit.prevent="handleSubmit" action="#" method="POST" class="space-y-6">
                <div v-if="isRegister">
                    <label for="user_name" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Имя</label>
                    <div class="mt-2">
                        <input
                            id="user_name"
                            type="text"
                            name="user_name"
                            v-model="form.user_name"
                            required
                            autocomplete="user_name"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                    </div>
                    <div v-if="form.errors.user_name" class="text-red-500 text-sm mt-1">
                        {{ form.errors.user_name }}
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Email адрес</label>
                    <div class="mt-2">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            v-model="form.email"
                            required
                            autocomplete="email"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                    </div>
                    <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                        {{ form.errors.email }}
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Пароль</label>
                        <div v-if="!isRegister" class="text-sm">
                            <Link :href="route('password.request')" class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Забыли пароль?</Link>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                    </div>
                    <div v-if="form.errors.password" class="text-red-500 text-sm mt-1">
                        {{ form.errors.password }}
                    </div>
                </div>

                <div v-if="isRegister">
                    <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Повторите пароль</label>
                    <div class="mt-2">
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="password_confirmation"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" />
                    </div>
                    <div v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-1">
                        {{ form.errors.password_confirmation }}
                    </div>
                </div>

                <div v-if="form.errors.recaptcha_token" class="text-red-500 text-sm mt-1">
                    {{ form.errors.recaptcha_token }}
                </div>

                <div v-if="!isRegister" class="flex justify-end gap-2 txt-color">
                    <p>Нет аккаунта?</p>
                    <Link :href="route('register')" class="text-blue-500">Зарегистрироваться</Link>
                </div>

                <div v-else class="flex justify-end gap-2 txt-color">
                    <p>Есть аккаунт?</p>
                    <Link :href="route('login')" class="text-blue-500">Войти</Link>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500">
                        {{ isRegister ? 'Зарегистрироваться' : 'Войти'}}
                    </button>
                </div>

                <div class="flex justify-end gap-3">
                    <div class="flex h-6 shrink-0 items-center">
                        <div class="group grid size-4 grid-cols-1">
                            <input id="remember" type="checkbox" name="remember" checked aria-describedby="remember-me" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:checked:bg-white/10 forced-colors:appearance-auto" />
                            <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                                <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                            </svg>
                        </div>
                    </div>

                    <div class="text-sm/6 text-right">
                        <label for="remember" class="font-medium text-gray-900 dark:text-white">Запомнить меня</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, onMounted } from "@vue/runtime-core";
import { Link } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import { useFormWithCsrf } from "@/composables/useFormWithCsrf";

declare global {
    interface Window {
        grecaptcha: {
            ready: (callback: () => void) => void;
            execute: (siteKey: string, options: { action: string }) => Promise<string>;
        };
    }
}

interface AuthFormData {
    email: string;
    password: string;
    user_name?: string;
    password_confirmation?: string;
    remember?: boolean;
    recaptcha_token?: string;
}

export default defineComponent({
    components: { Link },

    props: {
        title: String,
        isRegister: Boolean,
        recaptchaSiteKey: {
            type: String as () => string | null,
            required: false,
            default: null
        }
    },

    setup(props) {
        const form = useFormWithCsrf<AuthFormData>({
            email: '',
            password: '',
            user_name: '',
            password_confirmation: '',
            remember: true,
            recaptcha_token: ''
        })

        const handleSubmit = async () => {
            if (props.isRegister) {
                try {
                    await executeRecaptcha();
                } catch (error) {
                    console.error('reCAPTCHA error:', error);
                    // alert('Ошибка проверки reCAPTCHA. Попробуйте еще раз.');
                    return;
                }
            }

            const data = props.isRegister
                ? {
                    user_name: form.user_name,
                    email: form.email,
                    password: form.password,
                    password_confirmation: form.password_confirmation,
                    recaptcha_token: form.recaptcha_token
                }
                : {
                    email: form.email,
                    password: form.password
                };

            form.transform(() => data).post(
                route(props.isRegister ? 'register' : 'login')
            );
        };

        const executeRecaptcha = async (): Promise<void> => {
            if (!props.isRegister || !props.recaptchaSiteKey) {
                return Promise.resolve();
            }

            if (!window.grecaptcha) {
                throw new Error('reCAPTCHA not loaded');
            }

            return new Promise((resolve, reject) => {
                window.grecaptcha.ready(async () => {
                    try {
                        form.recaptcha_token = await window.grecaptcha.execute(
                            props.recaptchaSiteKey,
                            {action: 'register'}
                        );
                        resolve();
                    } catch (error) {
                        reject(error);
                    }
                });
            });
        };

        const loadRecaptchaScript = () => {
            if (!props.recaptchaSiteKey) return;

            const script = document.createElement('script');
            script.src = `https://www.google.com/recaptcha/api.js?render=${props.recaptchaSiteKey}`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        };

        onMounted(() => {
            if (props.isRegister && props.recaptchaSiteKey) {
                const script = document.createElement('script');
                script.src = `https://www.google.com/recaptcha/api.js?render=${props.recaptchaSiteKey}`;
                script.async = true;
                script.defer = true;
                document.head.appendChild(script);
            }
        });

        return { route,
            handleSubmit,
            form,
            loadRecaptchaScript
        }
    },
})
</script>

<style scoped></style>
