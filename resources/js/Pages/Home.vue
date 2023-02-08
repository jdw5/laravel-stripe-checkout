<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    products: Object,
})
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <Link :href="route('products.show', product)"
                        v-for="product in products.data"
                        :key="product.id"
                        class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg"
                    >
                        <h1 class="mb-2 text-lg font-semibold">
                            {{ product.title }}
                        </h1>
                        <div class="">
                            {{ product.price }}
                        </div>
                        <p>
                            {{ product.description }}
                        </p>
                    </Link>
                    
                </div>
                <!-- <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Products
                    </div>
                </div> -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>
