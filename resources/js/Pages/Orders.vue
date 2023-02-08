<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    orders: Array
    
})


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Orders
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <template v-if="orders">
                    <div class="p-6 mb-4 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="mb-2 font-semibold">
                            Order #{{ order.id }}
                        </div>
                        <div class="mb-2">
                            <div v-for="product in order.products"
                                :key="product.slug"
                            >
                                <div>
                                    {{ product.title }}
                                </div>
                                <div class="text-indigo-500">
                                    Download

                                </div>
                            </div>

                        </div>
                        <div>
                            Total:
                        </div>
                    </div>
                </template>
                <template v-else>
                    <p>
                        You have no orders.
                    </p>
                </template>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
