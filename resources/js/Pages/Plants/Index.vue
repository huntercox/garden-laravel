<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Plant from '@/Components/Plant.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['plants'], { message: String });
</script>

<template>
	<Head title="Plants" />
	<div v-if="message" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
		role="alert">
		<div class="flex">
			<div>
				<p class="text-sm">{{ message }}</p>
			</div>
		</div>
	</div>
	<AuthenticatedLayout>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<h2>Plants</h2>
			<div class="mt-6 shadow-sm rounded-lg divide-y">
				<Plant v-for="plant in plants" :key="plant.id" :plant="plant" />
			</div>
		</div>
	</AuthenticatedLayout>
</template>