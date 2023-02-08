<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Cart
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        
                    <template v-if="$page.props.cart.data.count">
                        <div>
                            <div class="pb-4 mb-4 border-b"
                               v-for="product in $page.props.cart.data.products"
                               :key="product.slug"
                            >
                                <div class="font-semibold">
                                    {{ product.title }}
                                </div>
                                <div>
                                    {{ product.price }}
                                </div>
                                <form @submit.prevent="router.delete(route('cart.products.destroy', product.slug))">
                                    <button type="submit" class="text-indigo-500">
                                        Remove
                                    </button>
                                </form>
                            </div>
                            <div class="mt-4">
                                <div class="mb-2">
                                    Cart total: {{ $page.props.cart.data.total }}
                                </div>
                                <PrimaryButton type="button">
                                    Checkout
                                </PrimaryButton>

                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <p>
                            Your cart is empty.
                        </p>
                    </template>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
