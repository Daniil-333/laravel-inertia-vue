import { route } from 'momentum-trail';
import { computed, watch, ref } from '@vue/runtime-core';
import {usePage} from "@inertiajs/vue3";

interface MenuItem {
    label: string;
    routeName: string;
    icon?: string;
    params?: Record<string, any>;
}

export function useMenu() {
    const routeAny = route as any;
    const page = usePage();

    const menuItems: MenuItem[] = [
        {
            label: 'Главная',
            routeName: 'home.index',
            // icon: '📊'
        },
        {
            label: 'Видео',
            routeName: 'home.video',
            // icon: '🎥'
        },
    ];

    // Реактивный текущий маршрут
    const currentRoute = ref(routeAny().current());

    // Обновляем при изменении URL
    watch(() => page.url, () => {
        currentRoute.value = routeAny().current();
    });

    // Проверка активности
    const isActive = (routeName: string) => {
        return currentRoute.value === routeName;
    };

    const activeClass = computed(() =>
        'bg-gray-900 text-white dark:bg-gray-950/50'
    );

    return {
        menuItems,
        isActive,
        activeClass
    };
}
